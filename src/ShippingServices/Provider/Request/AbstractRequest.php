<?php
declare(strict_types=1);

namespace app\ShippingServices\Provider\Request;

use app\Core\AbstractDto;

/**
 * @property-read $source
 * @property-read $target
 * @property-read $weight
 */
abstract class AbstractRequest extends AbstractDto
{
    protected string $source;
    protected string $target;
    protected float $weight;

    public function __construct(string $source, string $target, float $weight)
    {
        $this->source = $source;
        $this->target = $target;
        $this->weight = $weight;
    }
}