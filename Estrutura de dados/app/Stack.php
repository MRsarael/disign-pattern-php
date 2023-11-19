<?php

namespace App;

use App\Contracts\DataStructure;

class Stack implements DataStructure
{
	private array $stack;
	private int $length;

	public function __construct()
	{
		$this->stack = [];
		$this->length = 0;
	}

	public function add(string $descriptionItem): void
	{
		array_unshift($this->stack, $descriptionItem);
		$this->length++;
	}

	public function show(): void
	{
		foreach($this->stack as $item)
			print_r("Descrição ítem {$item}\n");
	}

	public function drop(): void
	{
		array_shift($this->stack);
		$this->length--;
	}

	public function getLength(): int
	{
		return $this->length;
	}
}


