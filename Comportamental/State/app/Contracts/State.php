<?php

namespace App\Contracts;

use App\Context;

/**
 * Contrato dos estados concretos.
 */
abstract class State
{
    /**
     * @var Context
     */
    protected $context;

    // O estado conhece o contexto
    public function setContext(Context $context)
    {
        $this->context = $context;
    }

    abstract public function handle1(): void;
    abstract public function handle2(): void;
}



