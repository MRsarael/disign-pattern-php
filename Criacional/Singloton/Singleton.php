<?php

namespace Criacional\Singleton;

class Singleton
{
	// Podemos ter várias instâncias registradas simultaneamente
	private static $instances = [];

	protected function __construct() : void
	{
		//...
	}
	
	public static function getInstance() : Singleton
    {
    	// Classe real atual - instância da subclasse
        $subclass = static::class;

        if (!isset(self::$instances[$subclass])) {
        	// Caso já exista uma instância da subclasse registrada
            self::$instances[$subclass] = new static();
        }

        return self::$instances[$subclass];
    }
}

class Logger extends Singleton
{
	private $fileHandle;

	protected function __construct() : void
    {
        $this->fileHandle = fopen('./stdout.txt', 'w');
    }

    public function writeLog(string $message) : void
    {
        $date = date('Y-m-d');
        fwrite($this->fileHandle, "$date: $message\n");
    }

    public static function log(string $message) : void
    {
    	// Recuperando instância da classe Logger
        $logger = static::getInstance();
        $logger->writeLog($message);
    }
}

// Inserindo LOG
Logger::log("Started!");

$instance1 = Logger::getInstance();
$instance2 = Logger::getInstance();

$instance1::log("Instance 1 Working...");
$instance1::log("Instance 1 Working...");

$instance2::log("Instance 2 Working...");
$instance2::log("Instance 2 Working...");

if ($instance1 === $instance2) {
    Logger::log("Logger é uma única instância.");
} else {
    Logger::log("Temos diferentes instâncias de Logger.");
}

