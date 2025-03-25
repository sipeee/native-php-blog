<?php

namespace App\Model\Crud\Field;

class ListField
{
    public function __construct(
        private string $name,
        private string $label,
        private string $type = 'text',
    )
    {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    public function getType(): string
    {
        return $this->type;
    }
}