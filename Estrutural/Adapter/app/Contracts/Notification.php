<?php

namespace Contracts;

/**
 * A interface Target representa a interface que as classes do seu aplicativo já seguem.
 */
interface Notification
{
    public function send(string $title, string $message);
}

