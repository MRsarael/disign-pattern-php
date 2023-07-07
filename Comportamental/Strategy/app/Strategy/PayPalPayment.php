<?php

namespace App\Strategy;

use App\Contracts\PaymentMethod;
use App\Order;

/**
 * Estratégia para pagamento via PayPal
 */
class PayPalPayment implements PaymentMethod
{
    public function getPaymentForm(Order $order): string
    {
        $returnURL = "https://our-website.com/order/{$order->id}/payment/paypal/return";

        return '
            <form action="https://paypal.com/payment" method="POST">
                <input type="hidden" id="email" value="'.$order->email.'">
                <input type="hidden" id="total" value="'.$order->total.'">
                <input type="hidden" id="returnURL" value="'.$returnURL.'">
                <input type="submit" value="Pay on PayPal">
            </form>
        ';
    }

    public function validateReturn(Order $order, array $data): bool
    {
        echo "Realizando pagamento via PayPal...\n";
        sleep(2);
        echo "Pronto!\n";
        return true;
    }
}