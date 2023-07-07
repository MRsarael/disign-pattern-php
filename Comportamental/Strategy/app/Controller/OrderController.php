<?php

namespace App\Controller;

use App\Order;
use App\PaymentFactory;
use App\Contracts\PaymentMethod;

/**
 * Roteador / Controller
 */
class OrderController
{
    /**
     * POST requests.
     *
     * @param $url
     * @param $data
     * @throws \Exception
     */
    public function post(string $url, array $data)
    {
        echo "Controller: Requisição POST de $url com o body: " . json_encode($data) . "\n";

        $path = parse_url($url, PHP_URL_PATH);

        // Selecionando rota
        if (preg_match('#^/orders?$#', $path, $matches)) {
            $this->postNewOrder($data);
        } else {
            echo "Controller: 404 página não encontrada\n";
        }
    }

    /**
     * GET requests.
     *
     * @param $url
     * @throws \Exception
     */
    public function get(string $url): void
    {
        echo "Controller: Requisição GET de $url\n";

        $path = parse_url($url, PHP_URL_PATH);
        $query = parse_url($url, PHP_URL_QUERY);
        parse_str($query, $data);

        // Selecionando rota
        if (preg_match('#^/orders?$#', $path, $matches)) {
            // Listando todas as ordens
            $this->getAllOrders();
        } elseif (preg_match('#^/order/([0-9]+?)/payment/([a-z]+?)(/return)?$#', $path, $matches)) {
            // Filtrando identificador do pedido pela url/rota
            $order = Order::get($matches[1]);

            // Estratégia de pagamento (selecionada pela factory)
            $paymentMethod = PaymentFactory::getPaymentMethod($matches[2]);

            if (!isset($matches[3])) {
                $this->getPayment($paymentMethod, $order);
            } else {
                $this->getPaymentReturn($paymentMethod, $order, $data);
            }
        } else {
            echo "Controller: 404 página não encontrada\n";
        }
    }
    
    /**
     * Rota POST request /order {data}
     */
    public function postNewOrder(array $data): void
    {
        $order = new Order($data);
        echo "Controller: Pedido criado: #{$order->id}.\n";
    }

    /**
     * Rota GET /order
     */
    public function getAllOrders(): void
    {
        echo "Controller: Lista de pedidos:\n";
        foreach (Order::get() as $order) {
            echo json_encode($order, JSON_PRETTY_PRINT) . "\n";
        }
    }
    
    /**
     * Rota GET /order/123/payment/XX
     */
    public function getPayment(PaymentMethod $method, Order $order): void
    {
        // Ação delegada à classe do tipo "PaymentMethod"
        $form = $method->getPaymentForm($order);
        echo "Controller: Formulário de pagamento: \n$form \n";
    }

    /**
     * Rota GET /order/123/payment/XXX/return?key=AJHKSJHJ3423&success=true
     */
    public function getPaymentReturn(PaymentMethod $method, Order $order, array $data): void
    {
        try {
            // Realizando pagamento pela estratégia solicitada
            if ($method->validateReturn($order, $data)) {
                echo "Controller: Agradecemos pela compra!\n";
                $order->complete();
            }
        } catch (\Exception $e) {
            echo "Controller: aconteceu um erro (" . $e->getMessage() . ")\n";
        }
    }
}