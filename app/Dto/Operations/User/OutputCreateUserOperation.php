<?php

namespace App\Dto\Operations\User;

use App\Models\User;

class OutputCreateUserOperation
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
     * @return OutputCreateUserOperation
     */
    public function setUser(?User $user): OutputCreateUserOperation
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
     * @return OutputCreateUserOperation
     */
    public function setErrorMessage(?string $error_message): OutputCreateUserOperation
    {
        $this->error_message = $error_message;
        return $this;
    }

}
