<?php
declare(strict_types=1);

namespace app;

interface ShippingService
{
    public function calculate(string $source, string $target, float $weight): ShippingCalculateResult;
}
