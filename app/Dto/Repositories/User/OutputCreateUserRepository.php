<?php

namespace App\Dto\Repositories\User;

use App\Models\User;

class OutputCreateUserRepository
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
     * @return OutputCreateUserRepository
     */
    public function setUser(?User $user): OutputCreateUserRepository
    {
        $this->user = $user;
        return $this;
    }

}
