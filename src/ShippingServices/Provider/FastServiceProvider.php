<?php
declare(strict_types=1);

namespace app\ShippingServices\Provider;

use app\ShippingServices\Provider\Request\AbstractRequest;
use app\ShippingServices\Provider\Response\FastServiceResponse;
use DateTimeImmutable;

class FastServiceProvider implements ServiceProvider
{
    protected int $lateHour;

    public function __construct(int $lateHour)
    {
        $this->lateHour = $lateHour;
    }

    public function request(AbstractRequest $request): FastServiceResponse
    {
        $now = new DateTimeImmutable();
        $hour = (int) $now->format('H');

        if ($hour >= $this->lateHour) {
            return new FastServiceResponse('Заявки не принимаются', null, null);
        }

        return new FastServiceResponse(
            '',
            random_int(1000, 1500),
            random_int(1, 3)
        );
    }
}