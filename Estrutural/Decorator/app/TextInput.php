<?php

use Contracts\InputFormat;

/**
 * Esta pode ser a classe concreta que será decorada, implementando InputFormat
 */
class TextInput implements InputFormat
{
    public function formatText(string $text): string
    {
        return $text;
    }
}


