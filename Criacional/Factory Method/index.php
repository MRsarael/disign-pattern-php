<?php

use Network\Facebook\FacebookPoster;
use Network\LinkedIn\LinkedInPoster;

require_once 'autoload.php';

echo "Teste criado do Facebook:\n";
SocialFactory::create(new FacebookPoster("login_usuario", 'senhaLogin_123'));
echo "\n\n";

echo "Teste criado do Linkedin:\n";
SocialFactory::create(new LinkedInPoster("email.usuário@bol.com.br", "senhaEmail_321"));

