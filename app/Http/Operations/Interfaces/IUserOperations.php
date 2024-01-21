<?php

namespace App\Http\Operations\Interfaces;

use App\Dto\Operations\User\InputAuthUserOperation;
use App\Dto\Operations\User\InputCreateUserOperation;
use App\Dto\Operations\User\OutputAuthUserOperation;
use App\Dto\Operations\User\OutputCreateUserOperation;

interface IUserOperations
{
    public function createUser(InputCreateUserOperation $input): OutputCreateUserOperation;

    public function authorizeUser(InputAuthUserOperation $input): OutputAuthUserOperation;
}
