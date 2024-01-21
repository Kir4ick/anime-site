<?php

namespace App\Dto\Repositories\User;

use App\Models\User;

class OutputGetUserByLoginAndPasswordRepository
{
    private ?User $user;

    /**
     * @return User|null
     */
    public function getUser(): ?User
    {
        return $this->user;
    }

    /**
     * @param User|null $user
     * @return OutputGetUserByLoginAndPasswordRepository
     */
    public function setUser(?User $user): OutputGetUserByLoginAndPasswordRepository
    {
        $this->user = $user;
        return $this;
    }

}
