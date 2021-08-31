<?php

namespace App;

interface Breaks
{
    public function control(PressureSensor $pressureSensor, BreakPipe $breakPipe): void;

//    public function loweringPressure(): void;
//
//    public function increasePressure(): void;
//
//    public function braking(): void;
//
//    public function release(): void;
//
//    public function emergencyBraking(): void;
}