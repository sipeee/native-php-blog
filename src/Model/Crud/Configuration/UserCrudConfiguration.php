<?php

namespace App\Model\Crud\Configuration;

use App\Model\BcryptEncoder;
use App\Model\Crud\Field\FormField;
use App\Model\Crud\Field\ListField;

class UserCrudConfiguration extends AbstractCrudConfiguration
{
    public function getTableName(): string
    {
        return 'users';
    }

    public function getListFields(): array
    {
        return [
            new ListField('id', 'ID', 'id'),
            new ListField('email', 'Email', 'email'),
            new ListField('is_active', 'Is active?', 'bool'),
        ];
    }

    public function getEditFields(): array
    {
        return $this->getEditOrCreateFields(false);
    }

    public function getCreateFields(): array
    {
        return $this->getEditOrCreateFields(true);
    }

    public function getEditOrCreateFields(bool $isCreate): array
    {
        return [
            new FormField('email', 'Email', 'email', [
                'required' => true,
            ]),
            new FormField('is_active', 'Is active?', 'bool'),
            new FormField('password', 'Password', 'password', [
                'required' => $isCreate,
            ]),
        ];
    }

    public function modifyInitialEditFormData(array $formData): array
    {
        if (isset($formData['password']) && 0 < mb_strlen($formData['password'])) {
            $formData['password'] = null;
        }

        $formData['is_active'] = $formData['is_active'] ?? 0;
        $formData['is_active'] = in_array($formData['is_active'], [1, true, 'on', 'true', '1'], true) ? 1 : 0;

        return $formData;
    }

    public function modifySubmittedUpdateFormData(array $formData): array
    {
        if (isset($formData['password']) && 0 < mb_strlen($formData['password'])) {
            $bcryptEncoder = new BcryptEncoder();
            $formData['password'] = $bcryptEncoder->encodePassword($formData['password']);
        } else {
            unset($formData['password']);
        }

        $formData['is_active'] = $formData['is_active'] ?? 0;
        $formData['is_active'] = in_array($formData['is_active'], [1, true, 'on', 'true', '1'], true) ? 1 : 0;

        return $formData;
    }
}