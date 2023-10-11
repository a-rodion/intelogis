<?php
declare(strict_types=1);

namespace app\ShippingServices;

use app\ShippingCalculateResult;
use app\ShippingService;
use app\ShippingServices\Response\CheapShippingServiceResponse;
use DateTime;

class CheapShippingService implements ShippingService
{
    protected float $basePrice;

    public function __construct(float $basePrice)
    {
        $this->basePrice = $basePrice;
    }

    public function calculate(string $source, string $target, float $weight): ShippingCalculateResult
    {
        $response = $this->request($source, $target, $weight);
        $price = $this->basePrice * $response->coefficient;

        return new ShippingCalculateResult($response->error, $price, $response->date);
    }

    protected function request(string $source, string $target, float $weight): CheapShippingServiceResponse
    {
        $shippingDays = random_int(1, 5);

        $response = new CheapShippingServiceResponse();
        $response->coefficient = random_int(1, 2) + random_int(0, 9) / 10;
        $response->date = date_modify(new DateTime(), "+$shippingDays day")
            ->format('Y-m-d');
        $response->error = '';

        return $response;
    }
}
