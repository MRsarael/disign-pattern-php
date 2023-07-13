<?php

// O PHP possui a interface "Iterator" que permite criar objetos para iteração dinâmicamente.
// Basta implementar esta interface e os métodos.

require_once 'autoload.php';

use App\CsvIterator;

$csv = new CsvIterator(__DIR__ . '/gatos.csv', ';');

foreach ($csv as $key => $row) {
    var_dump($row);
}

