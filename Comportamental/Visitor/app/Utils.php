<?php

namespace App;

class Utils
{
    public static function formatMoney(string $format, float $money): string
    {
        return 'R$ ' . floatval($money);
    }
}
