<?php

use Contracts\Notification;

/**
 * Aqui está um exemplo da classe existente que segue a interface Target.
 * 
 * A verdade é que muitos aplicativos reais podem não ter essa interface claramente definida.
 * Se você estiver nesse barco, sua melhor aposta seria estender o Adaptador de um
 * das classes existentes do seu aplicativo. Se isso for estranho (por exemplo,
 * SlackNotification não parece uma subclasse de EmailNotification), então
 * extrair uma interface deve ser seu primeiro passo.
 */
class EmailNotification implements Notification
{
    private $adminEmail;

    public function __construct(string $adminEmail)
    {
        $this->adminEmail = $adminEmail;
    }

    public function send(string $title, string $message): void
    {
        // mail($this->adminEmail, $title, $message);
        echo "Sent email with title '$title' to '{$this->adminEmail}' that says '$message'.";
    }
}


