<?php

namespace App;

use App\Contracts\DataStructureDoubleTerminated;

class Deque implements DataStructureDoubleTerminated
{
	private array $deque;
	private int $length;

	public function __construct()
	{
		$this->deque = [];
		$this->length = 0;
	}

	public function addEnd(string $descriptionItem): void
	{
		$this->deque[] = $descriptionItem;
		$this->length++;
	}

	public function addBeginning(string $descriptionItem): void
	{
		array_unshift($this->deque, $descriptionItem);
		$this->length++;
	}

	public function show(): void
	{
		foreach($this->deque as $item)
			print_r("Descrição ítem {$item}\n");
	}

	public function dropEnd(): void
	{
		array_pop($this->deque);
		$this->length--;
	}

	public function dropBeginning(): void
	{
		array_shift($this->deque);
		$this->length--;
	}

	public function getLength(): int
	{
		return $this->length;
	}
}


