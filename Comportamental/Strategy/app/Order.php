<?php

namespace App;

class Order
{
    public $id;
    public $status;
    public $email;
    public $total;

    /**
     * Os pedidos criados são armazenados no array $orders.
     * OBS: Teremos apenas uma instância do array orders,
     * porém disponível apenas par a classe Order
     *
     * @var array
     */
    private static $orders = [];

    /**
     * Recupera ordem de compra
     *
     * @param int $orderId
     * @return mixed
     */
    public static function get(int $orderId = null)
    {
        if ($orderId === null) {
            return static::$orders;
        } else {
            return static::$orders[$orderId];
        }
    }

    /**
     * @param array $attributes
     */
    public function __construct(array $attributes)
    {
        // O identificador será sempre maior que o anterior, começando por 1
        $this->id = count(static::$orders) + 1;
        $this->status = "new";

        foreach ($attributes as $key => $value) {
            $this->{$key} = $value;
        }
        
        static::$orders[$this->id] = $this;
    }

    /**
     * Pedido finalizado
     */
    public function complete(): void
    {
        $this->status = "completed";
        echo "Ordem de compra: #{$this->id} status {$this->status}.";
    }
}

