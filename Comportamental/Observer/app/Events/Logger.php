<?php

namespace App\Events;

/**
 * Concrete Observer
 */
class Logger implements \SplObserver
{
    private $filename;

    public function __construct($filename)
    {
        $this->filename = $filename;
        if (file_exists($this->filename)) {
            unlink($this->filename);
        }
    }

    public function update(\SplSubject $repository, string $event = null, $data = null): void
    {
        $entry = date("Y-m-d H:i:s") . ": '$event' dados -> '" . json_encode($data) . "'\n";

        $fileLog = fopen($this->filename, 'a+');
        fwrite($fileLog, "\n".$entry);
        fclose($fileLog);
        
        echo "Logger: Escrevendo evento '$event' no log.\n";
    }
}


