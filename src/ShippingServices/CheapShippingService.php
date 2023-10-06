<?php
declare(strict_types=1);

namespace app\ShippingServices;

use app\ShiipingCalculateResult;
use app\ShippingService;

class CheapShippingService implements ShippingService
{
    public function __construct(float $basePrice)
    {
        $this->basePrice = $basePrice;
    }

    public function calculate(string $source, string $target, float $weight): ShiipingCalculateResult
    {
        $response = $this->request($source, $target, $weight);
        $result = new ShiipingCalculateResult();
        $result->price = $this->basePrice * $response['coefficient'];
        $result->date = $response['date'];
        $result->error = $response['error'];

        return $result;
    }

    public function request(string $source, string $target, float $weight): array
    {
        $shippingDays = random_int(1, 5);
        $response = [
            'coefficient' => random_int(1, 2) + random_int(0, 9) / 10,
            'date' => date_modify(new \DateTime(), "+$shippingDays day")->format('Y-m-d'),
            'error' => '',
        ];

        return $response;
    }
}
