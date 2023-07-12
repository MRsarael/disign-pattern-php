<?php

namespace App\Contracts;

/**
 * Template
 */
abstract class SocialNetwork
{
    protected $username;
    protected $password;

    public function __construct(string $username, string $password)
    {
        $this->username = $username;
        $this->password = $password;
    }
    
    public function post(string $message): bool
    {
        // Realizando autenticação na rede social.
        echo "\nTemplate: Autenticando usuário " . $this->username . "\n";
        sleep(2);

        if($this->logIn($this->username, $this->password)) {
            echo "\nTemplate: Enviando post.\n";
            sleep(2);

            $result = $this->sendData($message);
            $this->logOut();
            return $result;
        }

        return false;
    }
    
    abstract public function logIn(string $userName, string $password): bool;
    abstract public function sendData(string $message): bool;
    abstract public function logOut(): void;
}


