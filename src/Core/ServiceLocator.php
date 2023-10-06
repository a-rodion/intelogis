<?php
declare(strict_types=1);

namespace app\Core;

class ServiceLocator
{
    protected array $objects;
    protected array $config;

    public function __construct(array $config)
    {
        $this->config = $config;
        $this->objects = [];
    }

    public function get(string $class): object
    {
        if (!isset($this->objects[$class])) {
            $this->objects[$class] = $this->config[$class];
        }

        return $this->objects[$class];
    }
}
