<?php

/**
 * O Adaptee é uma classe útil, incompatível com a interface Target. Você
 * não pode simplesmente entrar e mudar o código da classe para seguir o Target
 * interface, pois o código pode ser fornecido por uma biblioteca de terceiros.
 */
class SlackApi
{
    private $login;
    private $apiKey;

    public function __construct(string $login, string $apiKey)
    {
        $this->login = $login;
        $this->apiKey = $apiKey;
    }

    public function logIn(): void
    {
        // Envia a solicitação de autenticação para o serviço da web do Slack.
        echo "Logged in to a slack account '{$this->login}'.\n";
    }

    public function sendMessage(string $chatId, string $message): void
    {
        // Envia a solicitação de postagem de mensagem para o serviço da web Slack.
        echo "Posted following message into the '$chatId' chat: '$message'.\n";
    }
}

