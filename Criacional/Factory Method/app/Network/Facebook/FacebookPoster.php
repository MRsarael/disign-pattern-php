<?php

namespace Network\Facebook;

use Network\SocialNetworkConnector;
use Network\SocialNetworkPoster;
use Network\Facebook\FacebookConnector;

class FacebookPoster extends SocialNetworkPoster
{
    private $login, $password;

    public function __construct(string $login, string $password)
    {
        $this->login = $login;
        $this->password = $password;
    }

    // Construtor real. Esta subclasses retorna o conector FacebookConnector do tipo SocialNetworkConnector
    public function getSocialNetwork(): SocialNetworkConnector
    {
        return new FacebookConnector($this->login, $this->password);
    }
}

