<?php
declare(strict_types=1);

namespace app\ShippingServices\Response;

class BadShippingServiceResponse
{
    public float $price;
    public string $date;
    public string $error;
}