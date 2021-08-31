<?php

declare(strict_types=1);

namespace AppTests\Unit;

use App\BreakPipe;

final class BreakPipeSpy implements BreakPipe
{
    public function __construct(public bool $pressureRose = false, public bool $pressureReduced = false) {}

    public function pressureUp()
    {
        $this->pressureRose = true;
    }

    public function pressureDown()
    {
        $this->pressureReduced = true;
    }
}