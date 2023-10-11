<?php
declare(strict_types=1);

use app\Config;
use app\Core\ServiceLocator;

require_once __DIR__ . '/../vendor/autoload.php';

$config = Config::getConfig();
$serviceLocator = new ServiceLocator(
    $config['serviceLocator']
);


$i = 0;
while ($i < 3) {
    $source = 'source';
    $target = 'target';
    $weight = random_int(1, 30);

    echo "Вес: $weight" . PHP_EOL;

    foreach ($config['services'] as $serviceClass) {
        /** @var \app\ShippingServices\Calculator\ServiceCalculator $service */
        $service = $serviceLocator->get($serviceClass);
        $calculateResult = $service->calculate($source, $target, $weight);
        echo get_class($service) . ' | ' .json_encode($calculateResult, JSON_UNESCAPED_UNICODE) . PHP_EOL;
    }
    echo '------------------------------------------' . PHP_EOL;

    $i++;
}
