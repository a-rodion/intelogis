<?php
declare(strict_types=1);

namespace app\ShippingServices;

use app\ShiipingCalculateResult;
use app\ShippingService;

class BadShippingService implements ShippingService
{
    public function __construct(float $maxWeight)
    {
        $this->maxWeight = $maxWeight;
    }

    public function calculate(string $source, string $target, float $weight): ShiipingCalculateResult
    {
        $result = new ShiipingCalculateResult();
        if ($weight > $this->maxWeight) {
            $result->error = "Превышен максимальный вес {$this->maxWeight} кг";
        }

        return $result;
    }
}
