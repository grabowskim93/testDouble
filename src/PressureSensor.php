<?php

declare(strict_types=1);

namespace App;

interface PressureSensor
{
    public function current(): int;
}