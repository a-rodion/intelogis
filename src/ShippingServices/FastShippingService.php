<?php
declare(strict_types=1);

namespace app\ShippingServices;

use app\ShippingCalculateResult;
use app\ShippingService;
use app\ShippingServices\Response\FirstShippingServiceResponse;
use DateTime;
use DateTimeImmutable;

class FastShippingService implements ShippingService
{
    public function calculate(string $source, string $target, float $weight): ShippingCalculateResult
    {
        $response = $this->request($source, $target, $weight);
        $date = ($response->days !== null)
            ? date_modify(new DateTime(), "+$response->days day")->format('Y-m-d')
            : null;

        return new ShippingCalculateResult($response->error, $response->price, $date);
    }

    protected function request(string $source, string $target, float $weight): FirstShippingServiceResponse
    {
        $now = new DateTimeImmutable();
        $hour = (int) $now->format('H');

        $response = new FirstShippingServiceResponse();
        if ($hour >= 18) {
            $response->error = 'Заявки не принимаются';

            return $response;
        }
        $response->price = random_int(1000, 1500);
        $response->days = random_int(1, 3);
        $response->error = '';

        return $response;
    }
}
