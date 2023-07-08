<?php

namespace App\Contracts;

/**
 * Contrato para exeção de um comando
 */
interface Command
{
    public function execute(): void;
}



