<?php
declare(strict_types=1);

namespace app\ShippingServices\Provider;

use app\Core\AbstractDto;
use app\ShippingServices\Provider\Request\AbstractRequest;

interface ServiceProvider
{
    public function request(AbstractRequest $request): AbstractDto;
}