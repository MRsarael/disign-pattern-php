<?php

namespace App;

use App\Node;

class LinkedList
{
    private ?Node $first;
    private ?Node $last;
    private int $length;

    public function __construct()
    {
        $this->length = 0;
        $this->last = null;
        $this->first = null;
    }

    public function show(): void
    {
        $node = $this->first;

        while ($node !== null) {
            print_r($node->getName() . "\n");
            $node = $node->getNext();
        }
    }

    public function addEnd(string $nameNode): void
    {
        if ($this->length == 0) {
            $this->addBeginning($nameNode);
            return;
        }

        $newNode = new Node($nameNode);
        $this->last->setNext($newNode);
        $this->last = $newNode;
        $this->length++;
    }

    public function addPosition(string $nameNode, int $index): void
    {
        $newNode = new Node($nameNode);
        $currentNode = $this->first;
        $nextNode = $this->first->getNext();

        for ($i = 1; $i <= $this->length; $i++) {
            if ($i == $index) {
                $newNode->setNext($nextNode);
                $currentNode->setNext($newNode);
                return;
            }

            $currentNode = $nextNode;
            $nextNode = $nextNode->getNext();
        }
    }

    public function addBeginning(string $nameNode): void
    {
        $newNode = new Node($nameNode);
        $newNode->setNext($this->first);

        if ($this->length == 0) {
            $this->last = $newNode;
        }
        $this->first = $newNode;
        $this->length++;
    }

    public function dropPosition(int $index): void
    {
        if ($this->length == 0) {
            return;
        }

        if ($this->length == 1) {
            $this->dropBeginning();
        }

        $currentNode = $this->first;
        $nextNode = $this->first->getNext();
        for ($i = 1; $i <= $this->length; $i++) {
            if ($i == $index) {
                $currentNode->setNext($nextNode->getNext());
                $nextNode->setNext(null);
                return;
            }

            $currentNode = $nextNode;
            $nextNode = $nextNode->getNext();
        }
    }

    public function dropBeginning(): void
    {
        if ($this->length == 0) return;
        $this->first = $this->first->getNext();
        $this->length--;
    }

    public function numberNodes(): int
    {
        return $this->length;
    }
}
