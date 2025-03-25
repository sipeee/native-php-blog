<?php

namespace App\Model\Crud\Field;

class FormField
{
    public function __construct(
        private string $name,
        private string $label,
        private string $type = 'text',
        private array  $parameters = [],
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

    public function getParameters(): array
    {
        return $this->parameters;
    }
}