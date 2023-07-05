<?php

namespace Network\LinkedIn;

use Network\SocialNetworkConnector;
use Network\SocialNetworkPoster;
use Network\LinkedIn\LinkedInConnector;

class LinkedInPoster extends SocialNetworkPoster
{
    private $email, $password;

    public function __construct(string $email, string $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    // Construtor real. Esta subclasses retorna o conector LinkedInConnector do tipo SocialNetworkConnector
    public function getSocialNetwork(): SocialNetworkConnector
    {
        return new LinkedInConnector($this->email, $this->password);
    }
}

