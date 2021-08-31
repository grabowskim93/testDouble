<?php

declare(strict_types=1);

namespace App;

class Pressure
{
    public const EMERGENCY_BREAKING = 0;

    public function __construct(private int $pressure) {}

    public function getPressure(): int
    {
        return $this->pressure;
    }
}