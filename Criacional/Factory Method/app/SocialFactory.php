<?php

use Network\SocialNetworkPoster;

class SocialFactory
{
	public static function create(SocialNetworkPoster $socialNetwork)
	{
		$socialNetwork->post("Olá rede!");
    	$socialNetwork->post("Realizando um novo post!");
	}
}

