<?php

use App\Stack;
use App\Queue;
use App\Deque;
use App\LinkedList;

use App\Contracts\DataStructure;

require_once 'autoload.php';

function processaEstrutura(DataStructure $estruturaDeDados): void
{
	$estruturaDeDados->add("1 - God Of War");
	$estruturaDeDados->add("2 - PES");
	$estruturaDeDados->add("3 - FIFA");
	$estruturaDeDados->add("4 - GTA V");

	$estruturaDeDados->show();

	echo $estruturaDeDados->getLength();

	echo "\n";

	$estruturaDeDados->drop();
	$estruturaDeDados->drop();

	$estruturaDeDados->show();

	echo $estruturaDeDados->getLength();
}

function processaEstruturaDuplamenteTerminada(Deque $deque): void
{
	$deque->addBeginning("São Paulo");
	$deque->addEnd("Belo Horizonte");
	$deque->addBeginning("Petrolina");
	$deque->addEnd("Maceió");
	$deque->addEnd("Fortaleza");
	$deque->addBeginning("Uberlandia");

	echo $deque->getLength();

	echo "\n";

	$deque->show();

	$deque->dropBeginning();
	$deque->dropBeginning();

	echo $deque->getLength();

	echo "\n";

	$deque->show();

	$deque->dropEnd();
	$deque->dropEnd();

	echo "\n";

	$deque->show();
	
	echo $deque->getLength();
}

function processaListaLigada(LinkedList $lista): void
{
	$lista->addBeginning("Honda Civic");
	$lista->addEnd("Fiat Marea");
	$lista->addBeginning("Fiat Uno");

	$lista->show();

	echo "\n";

	$lista->addPosition("Ford Fiesta", 2);
	
	$lista->show();

	echo "\n";

	$lista->dropBeginning();
	$lista->dropPosition(1);

	$lista->addEnd("Volkswagen Gol");

	$lista->show();

	echo "\n";
}

echo "\n-------------- Pilha --------------\n";

processaEstrutura((new Stack()));

echo "\n-------------- Fila --------------\n";

processaEstrutura((new Queue()));

echo "\n-------------- Fila Duplamente Terminada --------------\n";

processaEstruturaDuplamenteTerminada((new Deque()));

echo "\n-------------- Lista ligada --------------\n";

processaListaLigada((new LinkedList()));


