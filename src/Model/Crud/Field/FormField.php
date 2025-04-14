<?php

namespace App\Model\Crud\Field;

use Symfony\Component\Validator\Constraint;

class FormField
{
    public function __construct(
        private string $name,
        private string $label,
        private string $type = 'text',
        private array  $parameters = [],
        private array  $constraints = [],
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

    /**
     * @return array<Constraint>
     */
    public function getConstraints(): array
    {
        return $this->constraints;
    }
}