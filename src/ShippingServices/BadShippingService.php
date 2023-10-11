<?php
declare(strict_types=1);

namespace app\ShippingServices;

use app\ShippingCalculateResult;
use app\ShippingService;
use app\ShippingServices\Response\BadShippingServiceResponse;
use DateTime;

class BadShippingService implements ShippingService
{
    protected float $maxWeight;

    public function __construct(float $maxWeight)
    {
        $this->maxWeight = $maxWeight;
    }

    public function calculate(string $source, string $target, float $weight): ShippingCalculateResult
    {
        $response = $this->request($source, $target, $weight);

        return new ShippingCalculateResult($response->error, $response->price, $response->date);
    }

    protected function request(string $source, string $target, float $weight): BadShippingServiceResponse
    {
        $shippingDays = random_int(1, 5);

        $response = new BadShippingServiceResponse();
        if ($weight > $this->maxWeight) {
            $response->error = "Превышен максимальный вес {$this->maxWeight} кг";
            // Эмуляция ответа сервиса (price, date с некорректными значениями)
            $response->price = 0;
            $response->date = '0000-00-00';

            return $response;
        }
        $response->price = random_int(500, 1000);
        $response->date = date_modify(new DateTime(), "+$shippingDays day")
            ->format('Y-m-d');;
        $response->error = '';

        return $response;
    }
}
