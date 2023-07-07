<?php

require_once 'autoload.php';

use App\Controller\OrderController;

$controller = new OrderController();

echo "Cliente: Realizando pedidos \n";

$controller->post("/orders", [
    "email"   => "me@example.com",
    "product" => "Produto que nao existe 1",
    "total"   => 9.95
]);

$controller->post("/orders", [
    "email"   => "me@example.com",
    "product" => "Produto de teste 2",
    "total"   => 19.95,
]);

echo "\nCliente: Listando pedidos \n";

$controller->get("/orders");

echo "\nCliente: Exibindo formas de pagamento \n";

// Recuperando formulário de pagamento pelo paypal
$controller->get("/order/1/payment/paypal");

// Recuperando formulário de pagamento por cartão de crédito
$controller->get("/order/2/payment/cc");

echo "\n\n\nCliente: Realizando pagamento no PayPal \n";
$controller->get("/order/1/payment/paypal/return?key=XXXX&success=true&total=19.95");

echo "\n\n\nCliente: Realizando pagamento com cartão de crédito \n";
$controller->get("/order/2/payment/cc/return?"
    ."key=b0e14c4b4355fde06b6950ecd5c09ce8&success=true&total=19.95");

// OBS: O valor de KEY está errado
echo "\n\n\nCliente: Realizando pagamento com cartão de crédito com erro! \n";
$controller->get("/order/2/payment/cc/return?".
    "key=XXX&success=true&total=19.95");


