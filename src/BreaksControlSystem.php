<?php

declare(strict_types=1);

namespace App;

final class BreaksControlSystem implements Breaks
{
    const MAX_PRESSURE = 5; //bar

    public function __construct(private Pressure $expectedPressure) {}

    public function control(PressureSensor $pressureSensor, BreakPipe $breakPipe) : void
    {
        if (
            $pressureSensor->current() !== 0 &&
            $this->expectedPressure->getPressure() === Pressure::EMERGENCY_BREAKING
        ) {
            throw new \RuntimeException('Cannot reduce to 0 bar. Danger to passengers\' lives.');
        }

        if ($pressureSensor->current() < $this->expectedPressure->getPressure() && $pressureSensor->current() < self::MAX_PRESSURE) {
            $breakPipe->pressureUp();
        }

        if ($pressureSensor->current() > $this->expectedPressure->getPressure()) {
            $breakPipe->pressureDown();
        }
    }
}