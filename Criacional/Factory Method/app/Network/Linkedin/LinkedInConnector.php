<?php

namespace Network\LinkedIn;

use Network\SocialNetworkConnector;

class LinkedInConnector implements SocialNetworkConnector
{
    private $email, $password;

    public function __construct(string $email, string $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    public function logIn(): void
    {
        echo "Realizando login do usuário Linkedin $this->email e senha $this->password\n";
    }

    public function logOut(): void
    {
        echo "Realizando logout do usuário Linkedin $this->email\n";
    }

    public function createPost($content): void
    {
        echo "Criando um novo post na página do Linkedin.\n";
    }
}
