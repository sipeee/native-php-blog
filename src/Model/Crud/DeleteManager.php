<?php

namespace App\Model\Crud;

use App\Model\ConnectionProvider;
use App\Model\Crud\Configuration\CrudConfigurationInterface;
use App\Model\RequestStack;
use App\Model\SmartyRenderer;
use App\Utility\ResponseUtility;

class DeleteManager
{
    public const string ACTION = 'delete';

    public function __construct(
        private CrudConfigurationInterface $configuration,
    )
    {
    }

    public function deleteAndRedirect(): void
    {
        $request = RequestStack::getInstance()->getRequest();

        $id = $request->query->get('id');
        if (empty($id) || !is_string($id) || !ctype_digit($id)) {
            $this->redirectToListAndExit();
        }

        $this->deleteRowById($id);

        $this->redirectToListAndExit();
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

    private function deleteRowById(mixed $id)
    {
        $connection = ConnectionProvider::getInstance()->getConnection();
        $statement = $connection->prepare(sprintf('DELETE FROM %s WHERE id = :id',
            $this->configuration->getTableName()
        ));

        $statement->bindValue('id', $id);

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