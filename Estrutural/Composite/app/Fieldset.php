<?php

use Contracts\FieldComposite;

/**
 * O elemento fieldset é um Concrete Composite.
 */
class Fieldset extends FieldComposite
{
    public function render(): string
    {
        // Observe como o resultado da renderização combinada dos filhos é incorporado
        // na tag fieldset.
        $output = parent::render();
        return "<fieldset><legend>{$this->title}</legend>\n$output</fieldset>\n";
    }
}

