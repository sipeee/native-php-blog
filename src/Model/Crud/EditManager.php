<?php

namespace App\Model\Crud;

use App\Model\ConnectionProvider;
use App\Model\Crud\Configuration\CrudConfigurationInterface;
use App\Model\RequestStack;
use App\Model\SmartyRenderer;
use App\Utility\ResponseUtility;

class EditManager
{
    public const string ACTION = 'edit';

    public function __construct(
        private CrudConfigurationInterface $configuration,
    )
    {
    }

    public function renderEdit(): void
    {
        $configuration = $this->configuration;
        $request = RequestStack::getInstance()->getRequest();

        $id = $request->query->get('id');
        if (empty($id) || !is_string($id) || !ctype_digit($id)) {
            $this->redirectToListAndExit();
        }

        $formData = $this->queryRow($id);

        if (null === $formData) {
            $this->redirectToListAndExit();
        }

        $formData = $configuration->modifyInitialEditFormData($formData);
        if ($request->isMethod('post') && $request->request->has('form')) {
            $formData = $request->request->all('form');
            $formData = $configuration->modifySubmittedUpdateFormData($formData);
            $this->saveUpdatableRow($id, $formData);

            ResponseUtility::redirectToAndExit($request->getBaseUrl().'?'.http_build_query([
                'action' => ListManager::ACTION,
            ]));
        }

        SmartyRenderer::getInstance()->render('crud/edit.tpl', [
            'configuration' => $this->configuration,
            'fields' => $this->configuration->getEditFields(),
            'id' => $id,
            'row' => $formData,
            'request' => $request,
        ]);
    }

    private function queryRow(int $id): ?array
    {
        $connection = ConnectionProvider::getInstance()->getConnection();
        $statement = $connection->prepare(sprintf('SELECT %s FROM %s WHERE id = :id',
            implode(', ', $this->getEditFieldNames()), $this->configuration->getTableName()
        ));
        $statement->bindValue('id', $id);
        $statement->execute();

        $rows = $statement->fetchAll(\PDO::FETCH_ASSOC);

        return !empty($rows)
            ? reset($rows)
            : null;
    }

    private function saveUpdatableRow(mixed $id, array $formData)
    {
        $connection = ConnectionProvider::getInstance()->getConnection();
        $statement = $connection->prepare(sprintf('UPDATE %s SET %s WHERE id = ?',
            $this->configuration->getTableName(), implode(', ', $this->convertToSqlFieldParts($formData))
        ));

        $counter = 1;
        foreach ($formData as $value) {
            $statement->bindValue($counter++, $value);
        }

        $statement->bindValue($counter++, $id);

        $statement->execute();
    }

    private function convertToSqlFieldParts(array $formData): array
    {
        $parts = [];
        foreach ($formData as $field => $value) {
            $parts[] = sprintf('%s = ?', $field);
        }

        return $parts;
    }

    private function getEditFieldNames()
    {
        $names = [];
        foreach ($this->configuration->getEditFields() as $field) {
            $names[] = $field->getName();
        }

        return $names;
    }

    private function redirectToListAndExit(): void
    {
        $request = RequestStack::getInstance()->getRequest();

        ResponseUtility::redirectToAndExit($request->getBaseUrl().'?'.http_build_query([
            'action' => ListManager::ACTION,
        ]));
    }
}