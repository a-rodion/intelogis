<?php
declare(strict_types=1);

namespace app\ShippingServices\Calculator;

use app\ShippingCalculateResult;

interface ServiceCalculator
{
    public function calculate(string $source, string $target, float $weight): ShippingCalculateResult;
}
