<?php

namespace App\Model\Crud;

use App\Model\ConnectionProvider;
use App\Model\Crud\Configuration\CrudConfigurationInterface;
use App\Model\Crud\Form\FormValidator;
use App\Model\RequestStack;
use App\Model\SmartyRenderer;
use App\Utility\ResponseUtility;

class NewManager
{
    public const string ACTION = 'new';

    public function __construct(
        private CrudConfigurationInterface $configuration,
    )
    {
    }

    public function renderNew(): void
    {
        $configuration = $this->configuration;

        $formData = $configuration->modifyInitialNewFormData($this->createNewRow());

        $request = RequestStack::getInstance()->getRequest();
        $formErrors = [];
        if ($request->isMethod('post') && $request->request->has('form')) {
            $formData = $request->request->all('form');
            $formValidator = new FormValidator($this->configuration, false);
            $formErrors = $formValidator->getFormErrors($formData);

            if (empty($formErrors)) {
                $formData = $configuration->modifySubmittedCreateFormData($formData);

                $this->saveCreatableRow($formData);

                ResponseUtility::redirectToAndExit($request->getBaseUrl().'?'.http_build_query([
                    'action' => ListManager::ACTION,
                ]));
            }
        }

        SmartyRenderer::getInstance()->render('crud/new.tpl', [
            'configuration' => $this->configuration,
            'fields' => $this->configuration->getCreateFields(),
            'row' => $formData,
            'request' => $request,
            'formErrors' => $formErrors,
        ]);
    }

    private function createNewRow(): array
    {
        $row = [];
        foreach ($this->configuration->getCreateFields() as $field) {
            $row[$field->getName()] = null;
        }

        return $row;
    }

    private function saveCreatableRow(array $formData)
    {
        $columns = array_keys($formData);

        $connection = ConnectionProvider::getInstance()->getConnection();
        $statement = $connection->prepare(sprintf('INSERT %s (%s) VALUES (%s)',
            $this->configuration->getTableName(), implode(', ', $columns), implode(', ', array_fill(0, count($columns), '?'))
        ));

        $counter = 1;
        foreach ($formData as $value) {
            $statement->bindValue($counter++, $value);
        }

        $statement->execute();
    }
}