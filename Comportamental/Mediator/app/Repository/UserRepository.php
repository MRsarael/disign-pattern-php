<?php

namespace App\Repository;

use App\Contracts\Observer;
use App\Model\User;

/**
 * UserRepository lógica e negócio.
 * Atua como um componente regular que não possui nenhum evento especial relacionado.
 * Depende do EventDispatcher para transmitir seus eventos e ouvir os outros.
 */
class UserRepository implements Observer
{
    /**
     * @var array Lista de usuários.
     */
    private $users = [];

    /**
     * Os componentes podem assinar eventos sozinhos ou por código de cliente.
     */
    public function __construct()
    {
        \App\Helper\Event::events()->attach($this, "users:deleted");
    }

    /**
     * Os componentes podem decidir se desejam processar um evento usando seu
     * nome, emissor ou qualquer dado contextual passado junto com o evento.
     */
    public function update(string $event, object $emitter, $data = null): void
    {
        switch ($event) {
            case "users:deleted":
                if ($emitter === $this) {
                    return;
                }
                
                $this->deleteUser($data, true);
                break;
        }
    }

    public function initialize(string $filename): void
    {
        echo "UserRepository: Carregando usuários do arquivo $filename.\n";
        sleep(2);
        \App\Helper\Event::events()->trigger("users:init", $this, $filename);
    }

    public function createUser(array $data, bool $silent = false): User
    {
        echo "UserRepository: Criando novo usuário.\n";

        $user = new User();
        $user->update($data);

        $id = bin2hex(openssl_random_pseudo_bytes(16));
        $user->update(["id" => $id]);
        $this->users[$id] = $user;

        if (!$silent) {
            \App\Helper\Event::events()->trigger("users:created", $this, $user);
        }

        return $user;
    }

    public function updateUser(User $user, array $data, bool $silent = false): ?User
    {
        $id = $user->attributes["id"];

        echo "UserRepository: Atualizando usuário.\n";
        sleep(2);

        if (!isset($this->users[$id])) return null;

        $user = $this->users[$id];
        $user->update($data);

        if (!$silent) {
            \App\Helper\Event::events()->trigger("users:updated", $this, $user);
        }

        return $user;
    }

    public function deleteUser(User $user, bool $silent = false): void
    {
        $id = $user->attributes["id"];
        echo "UserRepository: Deletando usuário.\n";
        sleep(2);

        if (!isset($this->users[$id])) return;

        unset($this->users[$id]);

        if (!$silent) {
            \App\Helper\Event::events()->trigger("users:deleted", $this, $user);
        }
    }
}


