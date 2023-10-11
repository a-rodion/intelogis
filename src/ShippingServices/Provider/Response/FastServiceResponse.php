<?php
declare(strict_types=1);

namespace app\ShippingServices\Provider\Response;

use app\Core\AbstractDto;

/**
 * @property-read $price
 * @property-read $days
 * @property-read $error
 */
class FastServiceResponse extends AbstractDto
{
    protected ?float $price;
    protected ?int $days;
    protected string $error;

    public function __construct(string $error, ?float $price, ?int $days)
    {
        $this->price = $price;
        $this->days = $days;
        $this->error = $error;
    }
}