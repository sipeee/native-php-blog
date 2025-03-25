<?php

namespace App\Model\Crud\Configuration;

abstract class AbstractCrudConfiguration implements CrudConfigurationInterface
{
    public function getTitle(): string
    {
        return ucfirst(preg_replace(['/\\_/', '/e?s$/'], [' ', ''], $this->getTableName()));
    }

    public function getListQuery(): string
    {
        return sprintf('SELECT * FROM `%s`', $this->getTableName());
    }

    public function getEditFields(): array
    {
        return [];
    }

    public function getCreateFields(): array
    {
        return $this->getEditFields();
    }

    public function modifyInitialEditFormData(array $formData): array
    {
        return $formData;
    }

    public function modifySubmittedUpdateFormData(array $formData): array
    {
        return $this->modifyInitialEditFormData($formData);
    }

    public function modifyInitialNewFormData(array $formData): array
    {
        return $this->modifyInitialEditFormData($formData);
    }

    public function modifySubmittedCreateFormData(array $formData): array
    {
        return $this->modifySubmittedUpdateFormData($formData);
    }
}