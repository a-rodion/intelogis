<?php
declare(strict_types=1);

namespace app\ShippingServices\Calculator;

use app\ShippingServices\Provider\ServiceProvider;

abstract class AbstractServiceCalculator
{
    protected ServiceProvider $serviceProvider;

//    public function __construct(ServiceProvider $serviceProvider)
//    {
//        $this->serviceProvider = $serviceProvider;
//    }
}