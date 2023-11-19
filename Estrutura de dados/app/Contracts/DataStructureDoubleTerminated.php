<?php

namespace App\Contracts;

interface DataStructureDoubleTerminated
{
	public function addEnd(string $descriptionItem): void;
	public function addBeginning(string $descriptionItem): void;
	public function show(): void;
	public function dropEnd(): void;
	public function dropBeginning(): void;
	public function getLength(): int;
}

