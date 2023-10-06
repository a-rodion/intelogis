<?php
declare(strict_types=1);

namespace app\ShippingServices;

use app\ShiipingCalculateResult;
use app\ShippingService;
use DateTime;
use DateTimeImmutable;

class FastShippingService implements ShippingService
{
    public function calculate(string $source, string $target, float $weight): ShiipingCalculateResult
    {
        $result = new ShiipingCalculateResult();

        $result->price = random_int(1000, 1500);
        $days = random_int(1, 3);
        $result->date = date_modify(new DateTime(), "+$days day")->format('Y-m-d');
        $result->error = '';

        return $result;
    }

    public function request()
    {
        $now = new DateTimeImmutable();
        $hour = (int) $now->format('H');
        if ($hour >= 18) {
            $result->error = 'Заявки не принимаются';

            return $result;
        }
    }
}
