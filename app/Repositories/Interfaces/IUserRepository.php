<?php

namespace App\Repositories\Interfaces;

use App\Dto\Repositories\User\InputCreateUserRepository;
use App\Dto\Repositories\User\InputGetUserByLoginAndPasswordRepository;
use App\Dto\Repositories\User\OutputCreateUserRepository;
use App\Dto\Repositories\User\OutputGetUserByLoginAndPasswordRepository;
use App\Models\User;

interface IUserRepository
{
    public function getUserByPasswordAndLogin(
        InputGetUserByLoginAndPasswordRepository $input
    ): OutputGetUserByLoginAndPasswordRepository;

    public function createUser(InputCreateUserRepository $input): OutputCreateUserRepository;
}
