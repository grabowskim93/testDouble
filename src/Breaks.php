<?php

namespace App;

interface Breaks
{
    public function control(PressureSensor $pressureSensor, BreakPipe $breakPipe): void;
}