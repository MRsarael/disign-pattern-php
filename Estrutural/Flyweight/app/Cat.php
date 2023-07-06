<?php

namespace App;

/**
 * O contexto armazena os dados exclusivos de cada gato.
 *
 * Uma classe designada para armazenar contexto é opcional e nem sempre viável. O
 * o contexto pode ser armazenado dentro de uma enorme estrutura de dados dentro do código do cliente
 * e passado para os métodos flyweight quando necessário.
 */
class Cat
{
    /**
     * O chamado estado "extrínseco".
     */
    public $name;
    public $age;
    public $owner;

    /**
     * @var CatVariation
     */
    private $variation;

    public function __construct(string $name, string $age, string $owner, CatVariation $variation)
    {
        $this->name = $name;
        $this->age = $age;
        $this->owner = $owner;
        $this->variation = $variation;
    }

    /**
     * Uma vez que os objetos Context não possuem todo o seu estado, às vezes, por
     * por conveniência, você pode precisar implementar alguns métodos auxiliares
     * (por exemplo, para comparar vários objetos Context.)
     */
    public function matches(array $query): bool
    {
        foreach ($query as $key => $value) {
            if (property_exists($this, $key)) {
                if ($this->$key != $value) {
                    return false;
                }
            } elseif (property_exists($this->variation, $key)) {
                if ($this->variation->$key != $value) {
                    return false;
                }
            } else {
                return false;
            }
        }

        return true;
    }

    /**
     * O Context também pode definir vários métodos de atalho, que delegam
     * execução para o objeto Flyweight. Esses métodos podem ser remanescentes de
     * métodos reais, extraídos para a classe Flyweight durante uma massiva
     * refatoração para o padrão Flyweight.
     */
    public function render(): void
    {
        $this->variation->renderProfile($this->name, $this->age, $this->owner);
    }
}


