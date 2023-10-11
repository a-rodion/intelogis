<?php
declare(strict_types=1);

namespace app\ShippingServices\Calculator;

use app\ShippingCalculateResult;
use app\ShippingServices\Provider\FastServiceProvider;
use app\ShippingServices\Provider\Request\FastServiceRequest;
use DateTime;

class FastServiceCalculator extends AbstractServiceCalculator implements ServiceCalculator
{
    public function __construct(FastServiceProvider $serviceProvider)
    {
        $this->serviceProvider = $serviceProvider;
    }

    public function calculate(string $source, string $target, float $weight): ShippingCalculateResult
    {
        $request = new FastServiceRequest($source, $target, $weight);
        $response = $this->serviceProvider->request($request);

        $date = ($response->days !== null)
            ? date_modify(new DateTime(), "+$response->days day")->format('Y-m-d')
            : null;

        return new ShippingCalculateResult($response->error, $response->price, $date);
    }
}
