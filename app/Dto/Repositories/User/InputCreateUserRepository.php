<?php

namespace App\Dto\Repositories\User;

/**
 * @property string $nickname
 * @property string $login
 * @property string $password
 * @property string $avatar
 */
class InputCreateUserRepository
{

    private string $nickname;

    private string $login;

    private string $password;

    private string $avatar;

    /**
     * @return string
     */
    public function getNickname(): string
    {
        return $this->nickname;
    }

    /**
     * @param string $nickname
     * @return InputCreateUserRepository
     */
    public function setNickname(string $nickname): InputCreateUserRepository
    {
        $this->nickname = $nickname;
        return $this;
    }

    /**
     * @return string
     */
    public function getLogin(): string
    {
        return $this->login;
    }

    /**
     * @param string $login
     * @return InputCreateUserRepository
     */
    public function setLogin(string $login): InputCreateUserRepository
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
     * @return InputCreateUserRepository
     */
    public function setPassword(string $password): InputCreateUserRepository
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return string
     */
    public function getAvatar(): string
    {
        return $this->avatar;
    }

    /**
     * @param string $avatar
     * @return InputCreateUserRepository
     */
    public function setAvatar(string $avatar): InputCreateUserRepository
    {
        $this->avatar = $avatar;
        return $this;
    }

}
