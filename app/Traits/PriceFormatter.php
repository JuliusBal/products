<?php

namespace App\Traits;

trait PriceFormatter
{
    public function formatPrice(float $price, string $currency = 'EUR'): string
    {
        return number_format($price, 2) . ' ' . $currency;
    }
}
