<?php

namespace Contracts;

/**
 * A interface Component declara um método de filtragem que deve ser implementado
 * por todos os componentes de concreto e decoradores.
 */
interface InputFormat
{
    public function formatText(string $text): string;
}

