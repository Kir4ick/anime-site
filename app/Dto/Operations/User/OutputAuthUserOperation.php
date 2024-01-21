<?php

namespace App\Dto\Operations\User;

use App\Models\User;

class OutputAuthUserOperation
{
    private ?User $user;

    private ?string $error_message;

    /**
     * @return User|null
     */
    public function getUser(): ?User
    {
        return $this->user;
    }

    /**
     * @param User|null $user
     * @return OutputAuthUserOperation
     */
    public function setUser(?User $user): OutputAuthUserOperation
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getErrorMessage(): ?string
    {
        return $this->error_message;
    }

    /**
     * @param string|null $error_message
     * @return OutputAuthUserOperation
     */
    public function setErrorMessage(?string $error_message): OutputAuthUserOperation
    {
        $this->error_message = $error_message;
        return $this;
    }

}
