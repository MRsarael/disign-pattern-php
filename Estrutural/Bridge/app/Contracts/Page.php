<?php

namespace Contracts;

/**
 * Abstração.
 */
abstract class Page
{
    /**
     * @var Renderer
     */
    protected $renderer;

    /**
     * A Abstração geralmente é inicializada com um dos objetos de Implementação.
     */
    public function __construct(Renderer $renderer)
    {
        $this->renderer = $renderer;
    }

    /**
     * O padrão Bridge permite substituir o objeto Implementação anexado dinamicamente.
     */
    public function changeRenderer(Renderer $renderer): void
    {
        $this->renderer = $renderer;
    }

    /**
     * O comportamento "view" permanece abstrato, pois só pode ser fornecido por classes concretas (Concrete Abstraction).
     */
    abstract public function view(): string;
}


