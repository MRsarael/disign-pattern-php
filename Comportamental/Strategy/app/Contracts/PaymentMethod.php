<?php

namespace App\Contracts;

use App\Order;

/**
 * Interface das estratégias de pagamento. Descreve o comportamento das estratégias.
 */
interface PaymentMethod
{
    public function getPaymentForm(Order $order): string;
    public function validateReturn(Order $order, array $data): bool;
}


