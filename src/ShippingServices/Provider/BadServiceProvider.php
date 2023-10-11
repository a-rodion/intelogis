<?php
declare(strict_types=1);

namespace app\ShippingServices\Provider;

use app\ShippingServices\Provider\Request\AbstractRequest;
use app\ShippingServices\Provider\Response\BadServiceResponse;
use DateTime;

class BadServiceProvider implements ServiceProvider
{
    protected float $maxWeight;

    public function __construct(float $maxWeight)
    {
        $this->maxWeight = $maxWeight;
    }

    public function request(AbstractRequest $request): BadServiceResponse
    {
        $shippingDays = random_int(1, 5);

        if ($request->weight > $this->maxWeight) {
            $error = "Превышен максимальный вес {$this->maxWeight} кг";
            // Эмуляция ответа сервиса (price, date с некорректными значениями)
            $price = 0;
            $date = '0000-00-00';
        } else {
            $price = random_int(500, 1000);
            $date = date_modify(new DateTime(), "+$shippingDays day")
                ->format('Y-m-d');;
            $error = '';
        }

        return new BadServiceResponse($price, $date, $error);
    }
}