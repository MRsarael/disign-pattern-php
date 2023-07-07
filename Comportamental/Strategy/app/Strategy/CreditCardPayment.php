<?php

namespace App\Strategy;

use App\Contracts\PaymentMethod;
use App\Order;

/**
 * Estratégia para pagamento com cartão de crédito
 */
class CreditCardPayment implements PaymentMethod
{
    static private $store_secret_key = "swordfish";

    public function getPaymentForm(Order $order): string
    {
        $returnURL = "https://our-website.com/order/{$order->id}/payment/cc/return";

        return '
            <form action="https://my-credit-card-processor.com/charge" method="POST">
                <input type="hidden" id="email" value="'.$order->email.'">
                <input type="hidden" id="total" value="'.$order->total.'">
                <input type="hidden" id="returnURL" value="'.$returnURL.'">
                <input type="text" id="cardholder-name">
                <input type="text" id="credit-card">
                <input type="text" id="expiration-date">
                <input type="text" id="ccv-number">
                <input type="submit" value="Pay">
            </form>
        ';
    }

    public function validateReturn(Order $order, array $data): bool
    {
        echo "Realizando pagamento com cartão de crédito...\n";

        sleep(2);
        
        if ($data['key'] != md5($order->id . static::$store_secret_key)) {
            throw new \Exception("Pedido não identificado.");
        }

        if (!isset($data['success']) || !$data['success'] || $data['success'] == 'false') {
            throw new \Exception("Falha no pagamento.");
        }

        if (floatval($data['total']) < $order->total) {
            throw new \Exception("Valor de pagamento errado.");
        }

        echo "pronto!\n";

        return true;
    }
}