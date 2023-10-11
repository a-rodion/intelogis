<?php
declare(strict_types=1);

namespace app\ShippingServices\Provider\Response;

use app\Core\AbstractDto;

/**
 * @property-read $coefficient
 * @property-read $date
 * @property-read $error
 */
class CheapServiceResponse extends AbstractDto
{
    protected float $coefficient;
    protected string $date;
    protected string $error;

    public function __construct(float $coefficient, string $date, string $error)
    {
        $this->coefficient = $coefficient;
        $this->date = $date;
        $this->error = $error;
    }
}