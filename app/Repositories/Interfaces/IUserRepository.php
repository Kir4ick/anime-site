<?php

namespace App\Repositories\Interfaces;

use App\Models\User;

interface IUserRepository
{
    public function getUserByPasswordAndLogin(string $login, string $password_hash): User|null;

    public function createUser(array $data): User|null;
}
