<?php

declare(strict_types=1);

namespace AppTests\Unit;

use App\BreakPipe;

class BreakPipeDummy implements BreakPipe
{
    public function pressureUp()
    {
    }

    public function pressureDown()
    {
    }
}