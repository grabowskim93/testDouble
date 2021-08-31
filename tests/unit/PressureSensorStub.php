<?php

declare(strict_types=1);

namespace AppTests\Unit;

use App\PressureSensor;

final class PressureSensorStub implements PressureSensor
{
    public function __construct(private int $pressure) {}

    public function current(): int
    {
        return $this->pressure;
    }
}