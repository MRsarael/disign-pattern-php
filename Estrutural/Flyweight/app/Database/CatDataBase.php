<?php

namespace App\Database;

use App\Cat;
use App\CatVariation;

/**
 * A Flyweight Factory armazena os objetos Context e Flyweight,
 * escondendo efetivamente qualquer noção do padrão Flyweight do cliente.
 */
class CatDataBase
{
    /**
     * Lista de objetos Cat
     */
    private $cats = [];

    /**
     * A lista de variações de gatos (Flyweights).
     */
    private $variations = [];

    /**
     * Ao adicionar um gato ao banco de dados, primeiro procuramos uma variação de gato existente.
     */
    public function addCat(
        string $name,
        string $age,
        string $owner,
        string $breed,
        string $image,
        string $color,
        string $texture,
        string $fur,
        string $size
    ) {
        $variation = $this->getVariation($breed, $image, $color, $texture, $fur, $size);
        $this->cats[] = new Cat($name, $age, $owner, $variation);
        echo "CatDataBase: Adicionando um gato ($name, $breed).\n";
    }

    /**
     * Retorne uma variação existente (Flyweight) por dados fornecidos ou crie uma nova, se ainda não existir.
     */
    public function getVariation(string $breed, string $image,  $color, string $texture, string $fur, string $size): CatVariation
    {
        $key = $this->getKey(get_defined_vars());

        if (!isset($this->variations[$key])) {
            $this->variations[$key] = new CatVariation($breed, $image, $color, $texture, $fur, $size);
        }

        return $this->variations[$key];
    }

    /**
     * Essa função ajuda a gerar chaves de matriz exclusivas.
     */
    private function getKey(array $data): string
    {
        return md5(implode("_", $data));
    }

    /**
     * Procure um gato no banco de dados usando os parâmetros de consulta fornecidos.
     */
    public function findCat(array $query)
    {
        foreach ($this->cats as $cat) {
            if ($cat->matches($query)) {
                return $cat;
            }
        }

        echo "CatDataBase: nenhum gato foi encontrado na base de dados.";
    }
}