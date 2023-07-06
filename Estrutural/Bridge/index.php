<?php

use Contracts\Page;

require_once 'autoload.php';

// O código cliente geralmente lida apenas com os objetos Abstraction.
function clientCode(Page $page)
{
    echo $page->view();
}

// O código do cliente pode ser executado com qualquer combinação pré-configurada de Abstraction + Implementation.
$HTMLRenderer = new HTMLRenderer();
$JSONRenderer = new JsonRenderer();

$page = new SimplePage($HTMLRenderer, "Home", "Welcome to our website!");
echo "HTML view of a simple content page:\n";
clientCode($page);
echo "\n\n";

// A Abstração pode alterar a Implementação vinculada em tempo de execução, se necessário.
$page->changeRenderer($JSONRenderer);
echo "JSON view of a simple content page, rendered with the same client code:\n";
clientCode($page);
echo "\n\n";

// Um objeto simples
$product = new Product(
    "123",
    "Star Wars, episode1",
    "A long time ago in a galaxy far, far away...",
    "/images/star-wars.jpeg",
    39.95
);

$page = new ProductPage($HTMLRenderer, $product);
echo "HTML view of a product page, same client code:\n";
clientCode($page);
echo "\n\n";

$page->changeRenderer($JSONRenderer);
echo "JSON view of a simple content page, with the same client code:\n";
clientCode($page);

