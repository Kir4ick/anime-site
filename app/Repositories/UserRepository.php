<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\IUserRepository;

class UserRepository implements IUserRepository
{

    public function getUserByPasswordAndLogin(string $login, string $password_hash): User|null
    {
        /** @var User|null $user */
        $user = User::query()
            ->where(function ($query) use ($login) {
                return $query->where('login', '=', $login)
                    ->orWhere('nickname', '=', $login);
            })
            ->where('password', '=', $password_hash)
            ->first();

        return $user;
    }

    public function createUser(array $data): User|null
    {
        try {
            /** @var User $user */
            $user = User::query()->create($data);
            return $user;
        } catch (\Throwable $exception) {
            dd($exception->getMessage(), $exception->getTraceAsString());
            return null;
        }
    }
}
