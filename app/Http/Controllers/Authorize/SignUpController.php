<?php

namespace App\Http\Controllers\Authorize;

use App\Dto\Operations\User\InputCreateUserOperation;
use App\Http\Controllers\Controller;
use App\Http\Operations\Interfaces\IUserOperations;
use App\Http\Requests\SignUpRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class SignUpController extends Controller
{
    public function page(): View
    {
        return view('pages.sign-up');
    }

    public function __invoke(SignUpRequest $request, IUserOperations $operations)
    {
        $request_data = $request->validationData();
        $operation_input = (new InputCreateUserOperation())
            ->setLogin($request_data['login'])
            ->setNickname($request_data['nickname'])
            ->setAvatar($request->file('avatar'))
            ->setPassword($request_data['password']);

        $response = $operations->createUser($operation_input);
        if ($response->getErrorMessage() != null) {
            return view('pages.sign-up', ['error' => $response->getErrorMessage()]);
        }

        return view('pages.sign-up', ['message' => __('Вы успешно зарегистрировались!')]);
    }
}
