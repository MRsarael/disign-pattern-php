<?php

namespace App;

/**
 * Os objetos Flyweight representam os dados compartilhados por vários objetos Cat. Isso é
 * a combinação de raça, cor, textura, etc.
 */
class CatVariation
{
    public $breed;
    public $image;
    public $color;
    public $texture;
    public $fur;
    public $size;
    
    public function __construct(
        string $breed,
        string $image,
        string $color,
        string $texture,
        string $fur,
        string $size
    ) {
        $this->breed = $breed;
        $this->image = $image;
        $this->color = $color;
        $this->texture = $texture;
        $this->fur = $fur;
        $this->size = $size;
    }

    public function renderProfile(string $name, string  $age, string $owner)
    {
        echo "= $name =\n";
        echo "Age: $age\n";
        echo "Owner: $owner\n";
        echo "Breed: $this->breed\n";
        echo "Image: $this->image\n";
        echo "Color: $this->color\n";
        echo "Texture: $this->texture\n";
    }
}


