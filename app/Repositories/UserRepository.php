<?php

namespace App\Repositories;

use App\Dto\Repositories\User\InputCreateUserRepository;
use App\Dto\Repositories\User\InputGetUserByLoginAndPasswordRepository;
use App\Dto\Repositories\User\OutputCreateUserRepository;
use App\Dto\Repositories\User\OutputGetUserByLoginAndPasswordRepository;
use App\Models\User;
use App\Repositories\Interfaces\IUserRepository;

class UserRepository implements IUserRepository
{

    public function getUserByPasswordAndLogin(
        InputGetUserByLoginAndPasswordRepository $input
    ): OutputGetUserByLoginAndPasswordRepository {
        /** @var User|null $user */
        $user = User::query()
            ->where(function ($query) use ($input) {
                return $query->where('login', '=', $input->getLogin())
                    ->orWhere('nickname', '=', $input->getLogin());
            })
            ->where('password', '=', $input->getPassword())
            ->first();

        return (new OutputGetUserByLoginAndPasswordRepository())->setUser($user);
    }

    public function createUser(InputCreateUserRepository $input): OutputCreateUserRepository
    {
        /** @var User $user */
        $user = User::query()->create([
            'nickname' => $input->getNickname(),
            'login' => $input->getLogin(),
            'password' => $input->getPassword(),
            'avatar' => $input->getAvatar(),
        ]);

        return (new OutputCreateUserRepository())->setUser($user);
    }
}
