<?php

namespace Contracts;

use Contracts\FormElement;

/**
 * A classe Composite base implementa a infraestrutura para gerenciar filhos
 * objetos, reutilizados por todos os Concrete Composites.
 */
abstract class FieldComposite extends FormElement
{
    /**
     * @var FormElement[]
     */
    protected $fields = [];

    /**
     * Os métodos para adicionar/remover subobjetos.
     */
    public function add(FormElement $field): void
    {
        $name = $field->getName();
        $this->fields[$name] = $field;
    }

    public function remove(FormElement $component): void
    {
        $this->fields = array_filter($this->fields, function ($child) use ($component) {
            return $child != $component;
        });
    }

    /**
     * Enquanto o método Leaf apenas faz o trabalho, o método Composite quase
     * sempre tem que levar em consideração seus sub-objetos.
     * Nesse caso, o composto pode aceitar dados estruturados.
     *
     * @param array $data
     */
    public function setData($data): void
    {
        foreach ($this->fields as $name => $field) {
            if (isset($data[$name])) {
                $field->setData($data[$name]);
            }
        }
    }

    /**
     * A mesma lógica se aplica ao getter. Ele retorna os dados estruturados de
     * o próprio composto (se houver) e todos os dados filhos.
     */
    public function getData(): array
    {
        $data = [];
        
        foreach ($this->fields as $name => $field) {
            $data[$name] = $field->getData();
        }
        
        return $data;
    }

    /**
     * A implementação básica da renderização do Composite simplesmente combina
     * resultados de todas as crianças. Concrete Composites será capaz de reutilizar este
     * implementação em suas implementações de renderização real.
     */
    public function render(): string
    {
        $output = "";
        
        foreach ($this->fields as $name => $field) {
            $output .= $field->render();
        }
        
        return $output;
    }
}

