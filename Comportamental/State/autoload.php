<?php

define('DS', DIRECTORY_SEPARATOR);
define('DIR_APP', __DIR__);

function autoload($classe)
{
    $classe = substr($classe, 3);
    $diretorioBase = DIR_APP . DS;
    $classe = $diretorioBase . 'app' . DS . $classe . '.php';
    
    if(file_exists($classe) && !is_dir($classe)) {
        require_once $classe;
    } else {
        throw new Exception("Arquivo {$classe} Não identificado");
    }
}

spl_autoload_register('autoload');



