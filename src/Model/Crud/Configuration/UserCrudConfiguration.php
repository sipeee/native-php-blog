<?php

namespace App\Model\Crud\Configuration;

use App\Model\BcryptEncoder;
use App\Model\Crud\Field\FormField;
use App\Model\Crud\Field\ListField;
use App\Utility\BoolUtility;
use Symfony\Component\Validator\Constraints as Assert;

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

    public function modifyInitialEditFormData(array $formData): array
    {
        if (isset($formData['password']) && 0 < mb_strlen($formData['password'])) {
            $formData['password'] = null;
        }

        $formData['is_active'] = $formData['is_active'] ?? 0;
        $formData['is_active'] = BoolUtility::isTrueRequestParameter($formData['is_active']) ? 1 : 0;

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
        $formData['is_active'] = BoolUtility::isTrueRequestParameter($formData['is_active']) ? 1 : 0;

        return $formData;
    }

    private function getEditOrCreateFields(bool $isCreate): array
    {
        $passwordConstraints = [
            new Assert\Length(min: 6),
        ];
        if ($isCreate) {
            $passwordConstraints[] = new Assert\NotBlank();
        }

        return [
            new FormField(
                name: 'email',
                label: 'Email',
                type: 'email',
                parameters: [
                    'required' => true,
                ],
                constraints: [
                    new Assert\NotBlank(),
                    new Assert\Email(),
                ],
            ),
            new FormField(
                name: 'is_active',
                label: 'Is active?',
                type: 'bool',
                constraints: [
                    new Assert\Choice(BoolUtility::trueRequestParameters()),
                ],
            ),
            new FormField(
                name: 'password',
                label: 'Password',
                type: 'password',
                parameters: [
                    'required' => $isCreate,
                ],
                constraints: $passwordConstraints,
            ),
        ];
    }
}