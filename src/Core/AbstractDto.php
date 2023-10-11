<?php
declare(strict_types=1);

namespace app\Core;

use RuntimeException;

abstract class AbstractDto
{
    public function __get($name)
    {
        if (property_exists($this, $name)) {
            return $this->$name;
        }

        throw new RuntimeException('Invalid attribute');
    }
}