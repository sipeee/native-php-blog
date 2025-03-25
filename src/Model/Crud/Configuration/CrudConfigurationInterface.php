<?php

namespace App\Model\Crud\Configuration;

use App\Model\Crud\Field\FormField;
use App\Model\Crud\Field\ListField;

interface CrudConfigurationInterface
{
    public function getTitle(): string;

    public function getTableName(): string;

    public function getListQuery(): string;

    /**
     * @return array<int, ListField>
     */
    public function getListFields(): array;

    /**
     * @return array<int, FormField>
     */
    public function getEditFields(): array;

    /**
     * @return array<int, FormField>
     */
    public function getCreateFields(): array;

    public function modifyInitialEditFormData(array $formData): array;

    public function modifySubmittedUpdateFormData(array $formData): array;

    public function modifyInitialNewFormData(array $formData): array;

    public function modifySubmittedCreateFormData(array $formData): array;
}