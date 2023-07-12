<?php

namespace App\Model;

/**
 * Model
 */
class User
{
    public $attributes = [];

    public function __construct()
    {
        //...
    }
    
    public function update($data): void
    {
        $this->attributes = array_merge($this->attributes, $data);
    }
}


