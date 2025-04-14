<?php

namespace App\Model\Crud\Configuration;

use App\Model\Crud\Field\FormField;
use App\Model\Crud\Field\ListField;
use App\Model\Repository;
use Symfony\Component\Validator\Constraints as Assert;

class PostCrudConfiguration extends AbstractCrudConfiguration
{
    private const string DATE_FORMAT = 'Y-m-d H:i:s';

    public function getTableName(): string
    {
        return 'posts';
    }

    public function getListFields(): array
    {
        return [
            new ListField('id', 'ID', 'id'),
            new ListField('email', 'User', 'email'),
            new ListField('title', 'Title'),
            new ListField('publish_at', 'Publish at', 'datetime'),
            new ListField('created_at', 'Created at', 'datetime'),
            new ListField('update_at', 'Updated at', 'datetime'),
        ];
    }

    public function getListQuery(): string
    {
        return 'SELECT p.id, u.email, p.title, p.created_at, p.update_at, p.publish_at FROM `posts` p LEFT JOIN `users` u ON p.user_id = u.id';
    }

    public function getEditFields(): array
    {
        return $this->getEditOrCreateFields();
    }

    public function getCreateFields(): array
    {
        return $this->getEditOrCreateFields();
    }

    public function modifySubmittedUpdateFormData(array $formData): array
    {
        $now = new \DateTime();
        $formData['update_at'] = $now->format(self::DATE_FORMAT);

        return $formData;
    }

    public function modifySubmittedCreateFormData(array $formData): array
    {
        $now = new \DateTime();
        $formData['created_at'] = $now->format(self::DATE_FORMAT);
        $formData['update_at'] = $now->format(self::DATE_FORMAT);

        return $formData;
    }

    private function getEditOrCreateFields(): array
    {
        $repo = new Repository();

        $userChoiceOptions = $repo->queryUserChoiceOptions();

        return [
            new FormField(
                name: 'user_id',
                label: 'User',
                type: 'choice',
                parameters: [
                    'required' => true,
                    'options' => $userChoiceOptions,
                ],
                constraints: [
                    new Assert\NotBlank(),
                    new Assert\Choice(
                        choices: array_map('strval', array_keys($userChoiceOptions)),
                    ),
                ],
            ),
            new FormField(
                name: 'title',
                label: 'Title',
                type: 'text',
                parameters: [
                    'required' => true,
                ],
                constraints: [
                    new Assert\NotBlank(),
                    new Assert\Length(['min' => 3]),
                ],
            ),
            new FormField(
                name: 'content',
                label: 'Content',
                type: 'richtext',
            ),
            new FormField(
                name: 'publish_at',
                label: 'Publish at',
                type: 'datetime',
                parameters: [
                    'required' => true,
                ],
                constraints: [
                    new Assert\NotBlank(),
                    new Assert\DateTime('Y-m-d\\TH:i'),
                ],
            ),
        ];
    }
}