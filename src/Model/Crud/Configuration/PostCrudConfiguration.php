<?php

namespace App\Model\Crud\Configuration;

use App\Model\BcryptEncoder;
use App\Model\Crud\Field\FormField;
use App\Model\Crud\Field\ListField;
use App\Model\Repository;

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

    public function getEditOrCreateFields(): array
    {
        $repo = new Repository();

        return [
            new FormField('user_id', 'User', 'choice', [
                'required' => true,
                'options' => $repo->queryUserChoiceOptions(),
            ]),
            new FormField('title', 'Title', 'text', [
                'required' => true,
            ]),
            new FormField('content', 'Content', 'richtext'),
            new FormField('publish_at', 'Publish at', 'datetime',  [
                'required' => true,
            ]),
        ];
    }

    public function modifyInitialEditFormData(array $formData): array
    {
        return $formData;
    }

    public function modifySubmittedUpdateFormData(array $formData): array
    {
        $now = new \DateTime();
        $formData['update_at'] = $now->format(self::DATE_FORMAT);

        return $formData;
    }

    public function modifyInitialNewFormData(array $formData): array
    {
        return $formData;
    }

    public function modifySubmittedCreateFormData(array $formData): array
    {
        $now = new \DateTime();
        $formData['created_at'] = $now->format(self::DATE_FORMAT);
        $formData['update_at'] = $now->format(self::DATE_FORMAT);

        return $formData;
    }
}