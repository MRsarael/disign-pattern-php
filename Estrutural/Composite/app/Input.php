<?php

use Contracts\FormElement;

/**
 * Este é um componente Folha. Como todas as Folhas, não pode ter filhos.
 */
class Input extends FormElement
{
    private $type;

    public function __construct(string $name, string $title, string $type)
    {
        parent::__construct($name, $title);
        $this->type = $type;
    }

    /**
     * Como os componentes Leaf não têm filhos que possam lidar com a maior parte
     * o trabalho para eles, geralmente são as Folhas que fazem a maior parte do trabalho pesado
     * dentro do padrão Composto.
     */
    public function render(): string
    {
        return "
            <label for=\"{$this->name}\">{$this->title}</label>\n" .
            "<input name=\"{$this->name}\" type=\"{$this->type}\" value=\"{$this->data}\">\n
        ";
    }
}

