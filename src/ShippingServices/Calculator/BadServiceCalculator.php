<?php
declare(strict_types=1);

namespace app\ShippingServices\Calculator;

use app\ShippingCalculateResult;
use app\ShippingServices\Provider\BadServiceProvider;
use app\ShippingServices\Provider\Request\BadServiceRequest;

class BadServiceCalculator extends AbstractServiceCalculator implements ServiceCalculator
{
    public function __construct(BadServiceProvider $serviceProvider)
    {
        $this->serviceProvider = $serviceProvider;
    }

    public function calculate(string $source, string $target, float $weight): ShippingCalculateResult
    {
        $request = new BadServiceRequest($source, $target, $weight);
        $response = $this->serviceProvider->request($request);

        return new ShippingCalculateResult($response->error, $response->price, $response->date);
    }
}
