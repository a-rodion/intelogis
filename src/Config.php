<?php
declare(strict_types=1);

namespace app;

use app\ShippingServices\Calculator\BadServiceCalculator;
use app\ShippingServices\Calculator\CheapServiceCalculator;
use app\ShippingServices\Calculator\FastServiceCalculator;
use app\ShippingServices\Provider\BadServiceProvider;
use app\ShippingServices\Provider\CheapServiceProvider;
use app\ShippingServices\Provider\FastServiceProvider;

class Config
{
    /**
     * @return \string[][]
     */
    public static function getConfig(): array
    {
        return [
            'services' => [
                FastServiceCalculator::class,
                CheapServiceCalculator::class,
                BadServiceCalculator::class,
            ],
            'serviceLocator' => [
                FastServiceCalculator::class => new FastServiceCalculator(
                    new FastServiceProvider(18)
                ),
                CheapServiceCalculator::class => new CheapServiceCalculator(
                    new CheapServiceProvider(),
                    150
                ),
                BadServiceCalculator::class => new BadServiceCalculator(
                    new BadServiceProvider(20)
                ),
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
