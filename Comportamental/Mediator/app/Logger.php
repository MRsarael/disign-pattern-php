<?php

namespace App;

use App\Contracts\Observer;

/**
 * Componente Concreto - registra todos os eventos nos quais está inscrito.
 */
class Logger implements Observer
{
    private $filename;

    public function __construct($filename)
    {
        $this->filename = $filename;
        if (file_exists($this->filename)) {
            unlink($this->filename);
        }
    }

    public function update(string $event, object $emitter, $data = null)
    {
        $entry = date("Y-m-d H:i:s") . ": '$event' com os dados '" . json_encode($data) . "'\n";
        file_put_contents($this->filename, $entry, FILE_APPEND);
        sleep(2);
        echo "Logger: escrevendo evento '$event' no log.\n";
    }
}


