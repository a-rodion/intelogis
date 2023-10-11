<?php
declare(strict_types=1);

namespace app\ShippingServices\Provider;

use app\ShippingServices\Provider\Request\AbstractRequest;
use app\ShippingServices\Provider\Response\CheapServiceResponse;
use DateTime;

class CheapServiceProvider implements ServiceProvider
{
    public function request(AbstractRequest $request): CheapServiceResponse
    {
        $shippingDays = random_int(1, 5);
        $date = date_modify(new DateTime(), "+$shippingDays day")
            ->format('Y-m- d');
        $coefficient = random_int(1, 2) + random_int(0, 9) / 10;

        return new CheapServiceResponse(
            $coefficient,
            $date,
            ''
        );
    }
}