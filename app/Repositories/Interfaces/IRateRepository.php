<?php

namespace App\Repositories\Interfaces;

use App\Dto\Repositories\Rate\InputCreateRate;
use App\Dto\Repositories\Rate\InputUpdateRate;
use App\Dto\Repositories\Rate\OutputCreateRate;
use App\Dto\Repositories\Rate\OutputUpdateRate;

interface IRateRepository
{
    public function create(
        InputCreateRate $input
    ): OutputCreateRate;

    public function update(
        InputUpdateRate $input
    ): OutputUpdateRate;

}
