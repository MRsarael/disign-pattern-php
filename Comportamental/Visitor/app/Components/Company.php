<?php

namespace App\Components;

use App\Contracts\Visitor;
use App\Contracts\Entity;

/**
 * Concrete Component
 */
class Company implements Entity
{
    private $name;

    /**
     * @var Department[]
     */
    private $departments;

    public function __construct(string $name, array $departments)
    {
        $this->name = $name;
        $this->departments = $departments;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDepartments(): array
    {
        return $this->departments;
    }

    public function accept(Visitor $visitor): string
    {
        // Chamando método da lógica do visitor
        return $visitor->visitCompany($this);
    }
}


