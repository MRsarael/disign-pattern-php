<?php

define('DS', DIRECTORY_SEPARATOR);
define('DIR_APP', __DIR__);

function autoload($classe) {
    $diretorioBase = DIR_APP . DS;
    $classe = $diretorioBase . str_replace("App", "app", $classe) . '.php';
    
    if(file_exists($classe) && !is_dir($classe))
        require_once $classe;
    else
        throw new Exception("Arquivo {$classe} não encontrado");
}

spl_autoload_register('autoload');


