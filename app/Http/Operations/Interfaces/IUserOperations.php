<?php

namespace App\Http\Operations\Interfaces;

use App\Models\User;
use Illuminate\Http\UploadedFile;

interface IUserOperations
{
    public function createUser(array $validation_data, UploadedFile $file): ?User;
}
