<?php

declare(strict_types=1);

namespace App;

interface BreakPipe
{
    public function pressureUp();

    public function pressureDown();
}
