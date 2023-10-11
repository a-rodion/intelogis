<?php
declare(strict_types=1);

namespace app\ShippingServices\Response;

class FirstShippingServiceResponse
{
    public ?float $price = null;
    public ?int $days = null;
    public string $error;
}