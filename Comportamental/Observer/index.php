<?php

require_once 'autoload.php';

use App\Events\OnboardingNotification;
use App\Repository\UserRepository;
use App\Events\Logger;

$repository = new UserRepository();
$repository->attach(new Logger(__DIR__ . "/app/Log.txt"), "*");
$repository->attach(new OnboardingNotification("1@example.com"), "users:created");

$repository->initialize(__DIR__ . "/users.csv");

$user = $repository->createUser([
    "name"  => "Rafael Almeida",
    "email" => "rafael_email@bol.com",
]);

$repository->deleteUser($user);


