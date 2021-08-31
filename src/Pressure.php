<?php

declare(strict_types=1);

namespace App;

class Pressure
{
    public const EMERGENCY_BREAKING = 0; //bar
    public const MAX_PRESSURE = 5; //bar

    public function __construct(private int $pressure) {}

    public function getPressure(): int
    {
        return $this->pressure;
    }
}