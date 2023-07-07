<?php

namespace App;

use App\Contracts\PaymentMethod;
use App\Strategy\CreditCardPayment;
use App\Strategy\PayPalPayment;

/**
 * Fábrica de strategy
 */
class PaymentFactory
{
    /**
     * Instaciando a estratégia pelo identificador
     *
     * @param $id
     * @return PaymentMethod
     * @throws \Exception
     */
    public static function getPaymentMethod(string $id): PaymentMethod
    {
        switch ($id) {
            case "cc":
                // Cartão de crédito
                return new CreditCardPayment();
            case "paypal":
                // Pagamento via PayPal
                return new PayPalPayment();
            default:
                throw new \Exception("Método de pagamento não encontrado!");
        }
    }
}

