<?php
declare(strict_types=1);

namespace app;

use app\ShippingServices\BadShippingService;
use app\ShippingServices\FastShippingService;
use app\ShippingServices\CheapShippingService;

class Config
{
    /**
     * @return \string[][]
     */
    public static function getConfig(): array
    {
        return [
            'services' => [
                FastShippingService::class,
                CheapShippingService::class,
                BadShippingService::class,
            ],
            'serviceLocator' => [
                FastShippingService::class => new FastShippingService(),
                CheapShippingService::class => new CheapShippingService(150),
                BadShippingService::class => new BadShippingService(20),
            ],
//            'tarifs' => [
//                FastShippingService::class => [
//                    // source, target, minWeight, maxWeight, price
//                    ['Москва', 'Санкт-Петербург', 0, 3, 700],
//                    ['Москва', 'Владивосток', 0, 3, 2300],
//                    ['Москва', 'Новокузнецк', 0, 3, 1500],
//
//                    ['Москва', 'Санкт-Петербург', 3, 7, 1400],
//                    ['Москва', 'Владивосток', 3, 7, 3200],
//                    ['Москва', 'Новокузнецк', 3, 7, 1900],
//
//                    ['Москва', 'Санкт-Петербург', 7, 21, 700],
//                    ['Москва', 'Владивосток', 7, 21, 2300],
//                    ['Москва', 'Новокузнецк', 7, 21, 1500],
//                ],
//
//            ]
        ];
    }
}
