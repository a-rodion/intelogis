<?php
declare(strict_types=1);

namespace app\ShippingServices\Calculator;

use app\ShippingCalculateResult;
use app\ShippingServices\Provider\CheapServiceProvider;
use app\ShippingServices\Provider\Request\CheapServiceRequest;

class CheapServiceCalculator extends AbstractServiceCalculator implements ServiceCalculator
{
    protected float $basePrice;

    public function __construct(CheapServiceProvider $serviceProvider, float $basePrice)
    {
        $this->serviceProvider = $serviceProvider;
        $this->basePrice = $basePrice;
    }

    public function calculate(string $source, string $target, float $weight): ShippingCalculateResult
    {
        $request = new CheapServiceRequest($source, $target, $weight);
        $response = $this->serviceProvider->request($request);

        $price = $this->basePrice * $response->coefficient;

        return new ShippingCalculateResult($response->error, $price, $response->date);
    }
}
