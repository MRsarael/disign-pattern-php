<?php

namespace Network;

use Network\SocialNetworkConnector;

abstract class SocialNetworkPoster
{
	// Construtor real. As subclasses retornarão quaisquer conectores concretos.
    abstract public function getSocialNetwork(): SocialNetworkConnector;

    // Prototype
    public function post($content): void
    {
        $network = $this->getSocialNetwork();
        $network->logIn();
        $network->createPost($content);
        $network->logout();
    }
}

