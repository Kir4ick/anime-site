<?php

namespace App\Dto\Operations\User;

class InputAuthUserOperation
{
    private string $login;

    private string $password;

    /**
     * @return string
     */
    public function getLogin(): string
    {
        return $this->login;
    }

    /**
     * @param string $login
     * @return InputAuthUserOperation
     */
    public function setLogin(string $login): InputAuthUserOperation
    {
        $this->login = $login;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return InputAuthUserOperation
     */
    public function setPassword(string $password): InputAuthUserOperation
    {
        $this->password = $password;
        return $this;
    }

}
