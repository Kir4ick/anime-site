<?php

namespace App\Http\Operations\Interfaces;

use App\Dto\Operations\Rate\InputCreateRate;
use App\Dto\Operations\Rate\InputUpdateRate;
use App\Dto\Operations\Rate\OutputCreateRate;
use App\Dto\Operations\Rate\OutputUpdateRate;

interface IRateOperation
{
    public function create(
        InputCreateRate $input
    ): OutputCreateRate;

    public function update(
        InputUpdateRate $input
    ): OutputUpdateRate;
}
