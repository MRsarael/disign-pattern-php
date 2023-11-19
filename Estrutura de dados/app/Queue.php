<?php

namespace App;

use App\Contracts\DataStructure;

class Queue implements DataStructure
{
	private array $queue;
	private int $length;

	public function __construct()
	{
		$this->queue = [];
		$this->length = 0;
	}

	public function add(string $descriptionItem): void
	{
		$this->queue[] = $descriptionItem;
		$this->length++;
	}

	public function show(): void
	{
		foreach($this->queue as $item)
			print_r("Descrição ítem {$item}\n");
	}

	public function drop(): void
	{
		array_shift($this->queue);
		$this->length--;
	}

	public function getLength(): int
	{
		return $this->length;
	}
}


