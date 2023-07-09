<?php

namespace App\Model;

/**
 * Model simples
 */
class User
{
    public $attributes = [];

    public function update($data): void
    {
        $this->attributes = array_merge($this->attributes, $data);
    }

    /**
     * Disparando evento.
     */
    public function delete(): void
    {
        echo "\nUser: Deletando um usuário pelo model User.\n";
        sleep(2);
        echo "\nUser: Disparando evento users:deleted.\n";
        sleep(2);
        \App\Helper\Event::events()->trigger("users:deleted", $this, $this);
    }
}


