<?php

use Contracts\Notification;

/**
 * O Adapter é uma classe que liga a interface Target e a classe Adaptee.
 * Neste caso, permite que o aplicativo envie notificações usando o Slack API.
 */
class SlackNotification implements Notification
{
    private $slack;
    private $chatId;

    public function __construct(SlackApi $slack, string $chatId)
    {
        $this->slack = $slack;
        $this->chatId = $chatId;
    }

    /**
     * Um adaptador não é apenas capaz de adaptar interfaces, mas também
     * converter os dados recebidos para o formato exigido pelo Adaptee.
     */
    public function send(string $title, string $message): void
    {
        $slackMessage = "#" . $title . "# " . strip_tags($message);
        $this->slack->logIn();
        $this->slack->sendMessage($this->chatId, $slackMessage);
    }
}

