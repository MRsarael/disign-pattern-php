<?php

namespace App\Contracts;

/**
 * Define como os componentes recebem as notificações de eventos.
 */
interface Observer
{
    public function update(string $event, object $emitter, $data = null);
}


