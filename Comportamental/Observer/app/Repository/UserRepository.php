<?php

namespace App\Repository;

use App\Model\User;

/**
 * Observable
 */
class UserRepository implements \SplSubject
{
    /**
     * @var array Lista de usuários.
     */
    private $users = [];

    /**
     * @var array
     */
    private $observers = [];

    public function __construct()
    {
        // * Observers que escutam todas as chamadas
        $this->observers["*"] = [];
    }

    private function initEventGroup(string $event = "*"): void
    {
        if (!isset($this->observers[$event])) {
            $this->observers[$event] = [];
        }
    }

    private function getEventObservers(string $event = "*"): array
    {
        $this->initEventGroup($event);
        $group = $this->observers[$event];
        $all = $this->observers["*"];
        return array_merge($group, $all);
    }

    /**
     * Setando observadores e informando os eventos que ele irá escutar
     */
    public function attach(\SplObserver $observer, string $event = "*"): void
    {
        $this->initEventGroup($event);
        $this->observers[$event][] = $observer;
    }

    public function detach(\SplObserver $observer, string $event = "*"): void
    {
        foreach ($this->getEventObservers($event) as $key => $s) {
            if ($s === $observer) {
                unset($this->observers[$event][$key]);
            }
        }
    }

    public function notify(string $event = "*", $data = null): void
    {
        echo "UserRepository: Notificando evento '$event'.\n";
        foreach ($this->getEventObservers($event) as $observer) {
            $observer->update($this, $event, $data);
        }
    }

    // Métodos da lógica de negócio

    public function initialize($filename): void
    {
        echo "UserRepository: Baixando usuários do arquivo $filename. \n";
        sleep(2);

        // Notificando evento "users:init"
        $this->notify("users:init", $filename);
    }

    public function createUser(array $data): User
    {
        echo "UserRepository: Criando um novo usuário.\n";
        sleep(2);

        $user = new User();
        $user->update($data);

        $id = bin2hex(openssl_random_pseudo_bytes(16));
        $user->update(["id" => $id]);
        $this->users[$id] = $user;

        // Notificando evento "users:created"
        $this->notify("users:created", $user);
        return $user;
    }

    public function updateUser(User $user, array $data): User
    {
        $id = $user->attributes["id"];
        echo "UserRepository: Editando um usuário.\n";
        sleep(2);

        if (!isset($this->users[$id])) return null;

        $user = $this->users[$id];
        $user->update($data);

        // Notificando evento "users:updated"
        $this->notify("users:updated", $user);
        return $user;
    }

    public function deleteUser(User $user): void
    {
        echo "UserRepository: Removendo usuário.\n";
        sleep(2);

        $id = $user->attributes["id"];
        if (!isset($this->users[$id])) return;

        unset($this->users[$id]);

        // Notificando evento "users:deleted"
        $this->notify("users:deleted", $user);
    }
}


