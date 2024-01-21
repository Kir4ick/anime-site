<?php

namespace App\Dto\Operations\User;

use Illuminate\Http\UploadedFile;

class InputCreateUserOperation
{
    private string $nickname;

    private string $login;

    private string $password;

    private UploadedFile $avatar;

    /**
     * @return string
     */
    public function getNickname(): string
    {
        return $this->nickname;
    }

    /**
     * @param string $nickname
     * @return InputCreateUserOperation
     */
    public function setNickname(string $nickname): InputCreateUserOperation
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
     * @return InputCreateUserOperation
     */
    public function setLogin(string $login): InputCreateUserOperation
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
     * @return InputCreateUserOperation
     */
    public function setPassword(string $password): InputCreateUserOperation
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return UploadedFile
     */
    public function getAvatar(): UploadedFile
    {
        return $this->avatar;
    }

    /**
     * @param UploadedFile $avatar
     * @return InputCreateUserOperation
     */
    public function setAvatar(UploadedFile $avatar): InputCreateUserOperation
    {
        $this->avatar = $avatar;
        return $this;
    }

}
