<?php

namespace App\Dto\Repositories\User;

class InputGetUserByLoginAndPasswordRepository
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
     * @return InputGetUserByLoginAndPasswordRepository
     */
    public function setLogin(string $login): InputGetUserByLoginAndPasswordRepository
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
     * @return InputGetUserByLoginAndPasswordRepository
     */
    public function setPassword(string $password): InputGetUserByLoginAndPasswordRepository
    {
        $this->password = $password;
        return $this;
    }

}
