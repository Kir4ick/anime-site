<?php

namespace App\Http\Operations;

use App\Dto\Operations\User\InputAuthUserOperation;
use App\Dto\Operations\User\InputCreateUserOperation;
use App\Dto\Operations\User\OutputAuthUserOperation;
use App\Dto\Operations\User\OutputCreateUserOperation;
use App\Dto\Repositories\User\InputCreateUserRepository;
use App\Dto\Repositories\User\InputGetUserByLoginAndPasswordRepository;
use App\Http\Operations\Interfaces\IUserOperations;
use App\Repositories\Interfaces\IUserRepository;
use Illuminate\Support\Facades\Auth;

class UserOperations implements IUserOperations
{

    public function __construct(private readonly IUserRepository $repository)
    {}

    public function createUser(InputCreateUserOperation $input): OutputCreateUserOperation
    {
        $user = null;
        $error_message = null;

        try {
            $avatar_path = $input->getAvatar()->store('avatars');

            $repository_dto = new InputCreateUserRepository();
            $repository_dto->setAvatar($avatar_path)
                ->setLogin($input->getLogin())
                ->setPassword(md5($input->getPassword()))
                ->setNickname($input->getNickname());

            $repository_response = $this->repository->createUser($repository_dto);

            $user = $repository_response->getUser();
            if ($user == null) {
                $error_message = __('Произошла ошибка при регистрации');
            } else { # Никак не хотел писать else, но здесь без него никак
                Auth::login($user);
            }

        } catch (\Throwable $exception) {
            $error_message = __('Произошла ошибка при регистрации');
            logs()->error(sprintf('[sign-up] %s %s', $exception->getMessage(), $exception->getTraceAsString()));
        }

        return (new OutputCreateUserOperation())->setUser($user)->setErrorMessage($error_message);
    }

    public function authorizeUser(InputAuthUserOperation $input): OutputAuthUserOperation
    {
        $user = null;
        $error_message = null;

        try {
            $password_hash = md5($input->getPassword());

            $repository_dto = new InputGetUserByLoginAndPasswordRepository();
            $repository_dto->setLogin($input->getLogin())
                ->setPassword($password_hash);

            $repository_response = $this->repository->getUserByPasswordAndLogin($repository_dto);

            $user = $repository_response->getUser();
            if ($user == null) {
                $error_message = __('Такого пользователя не существует');
            } else { # Никак не хотел писать else, но здесь без него никак
                Auth::login($user);
            }

        } catch (\Throwable $exception) {
            logs()->error(sprintf('[sign-in] %s %s', $exception->getMessage(), $exception->getTraceAsString()));
            $error_message = __('Не удалось получить пользователя');
        }

        return (new OutputAuthUserOperation())->setUser($user)->setErrorMessage($error_message);
    }
}
