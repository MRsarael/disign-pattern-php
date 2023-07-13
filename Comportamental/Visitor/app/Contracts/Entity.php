<?php

namespace App\Contracts;

/**
 * Interface dos Components
 */
interface Entity
{
    public function accept(Visitor $visitor): string;
}


