<?php

declare(strict_types=1);

namespace AppTests\Unit;

use App\PressureSensor;

class PressureSensorFake implements PressureSensor
{
    public function current(): int
    {
        return rand(0, 5);
    }
}