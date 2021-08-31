<?php

declare(strict_types=1);

namespace AppTests\Unit;

use App\BreaksControlSystem;
use App\Pressure;
use PHPUnit\Framework\TestCase;

/** @covers \App\BreaksControlSystem */
class BreakControlSystemTest extends TestCase
{
    public function testRisePressureWhenSensorSaysTheCurrentPressureIsTooLow()
    {
        $sut = new BreaksControlSystem(new Pressure(3));

        $breakPipeSpy = new BreakPipeSpy();
        $sut->control(new PressureSensorStub(2), $breakPipeSpy);

        self::assertTrue($breakPipeSpy->pressureRose);
        self::assertFalse($breakPipeSpy->pressureReduced);
    }
}