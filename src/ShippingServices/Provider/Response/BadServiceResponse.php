<?php
declare(strict_types=1);

namespace app\ShippingServices\Provider\Response;

use app\Core\AbstractDto;

/**
 * @property-read $price
 * @property-read $date
 * @property-read $error
 */
class BadServiceResponse extends AbstractDto
{
    protected float $price;
    protected string $date;
    protected string $error;

    public function __construct($price, $date, $error)
    {
        $this->price = $price;
        $this->date = $date;
        $this->error = $error;
    }
}