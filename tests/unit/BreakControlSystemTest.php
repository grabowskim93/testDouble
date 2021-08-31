<?php

declare(strict_types=1);

namespace AppTests\Unit;

use App\BreakPipe;
use App\BreaksControlSystem;
use App\Pressure;
use PHPUnit\Framework\TestCase;
use RuntimeException;

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

    public function testReducePressureWhenSensorSaysTheCurrentPressureIsToHigh()
    {
        $sut = new BreaksControlSystem(new Pressure(2));

        $breakPipeSpy = new BreakPipeSpy();
        $sut->control(new PressureSensorStub(4), $breakPipeSpy);

        self::assertFalse($breakPipeSpy->pressureRose);
        self::assertTrue($breakPipeSpy->pressureReduced);
    }

    public function testNotChangingPressureWhenPressureIsFine()
    {
        $sut = new BreaksControlSystem(new Pressure(1));

        $breakPipeMock = $this->createMock(BreakPipe::class);

        $breakPipeMock->expects(self::never())
            ->method('pressureUp');

        $breakPipeMock->expects(self::never())
            ->method('pressureDown');

        $sut->control(new PressureSensorStub(1), $breakPipeMock);
    }

    public function testExceptionForEmergencyBreak()
    {
        $sut = new BreaksControlSystem(new Pressure(Pressure::EMERGENCY_BREAKING));

        self::throwException(new RuntimeException());
        $this->expectExceptionMessage('Cannot reduce to 0 bar. Danger to passengers\' lives.');

        $sut->control(new PressureSensorStub(3), new BreakPipeDummy());
    }
}