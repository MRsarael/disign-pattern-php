<?php

use Contracts\InputFormat;

/**
 * Classe decoradora, implementa o mesmo comportamento da classe decorada graças à InputFormat.
 * Tamém pode ser entendida como uma classe auxiliar que serve para usar o "construct" e fazer a agregação.
 */
class TextFormat implements InputFormat
{
    /**
     * @var InputFormat
     */
    protected $inputFormat;

    /**
     * O contrutor do decaorado recebe o objeto concreto para agregação.
     */
    public function __construct(InputFormat $inputFormat)
    {
        $this->inputFormat = $inputFormat;
    }

    /**
     * Método decorado.
     */
    public function formatText(string $text): string
    {
        return $this->inputFormat->formatText($text);
    }
}

