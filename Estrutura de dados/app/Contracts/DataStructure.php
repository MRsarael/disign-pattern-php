<?php

namespace App\Contracts;

interface DataStructure
{
	public function add(string $descriptionItem): void;
	public function show(): void;
	public function drop(): void;
	public function getLength(): int;
}

