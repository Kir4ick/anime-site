<?php

namespace App\Http\Operations;

use App\Http\Operations\Interfaces\IUserOperations;
use App\Models\User;
use App\Repositories\Interfaces\IUserRepository;
use Illuminate\Http\UploadedFile;

class UserOperations implements IUserOperations
{

    public function __construct(private readonly IUserRepository $repository)
    {}

    public function createUser(array $validation_data, UploadedFile $file): ?User
    {
        $path = $file->store('avatars');
        $validation_data['avatar'] = $path;
        $validation_data['password'] = md5($validation_data['password']);
        return $this->repository->createUser($validation_data);
    }
}
