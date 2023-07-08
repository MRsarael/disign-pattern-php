<?php

namespace App\Contracts;

/**
 * Fornece uma maneira de recuperar os metadados do memento
 */
interface Memento
{
    public function getName(): string;
    public function getDate(): string;
    public function getState(): string;
}



