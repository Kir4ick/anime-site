<?php

namespace App\Http\Controllers\Authorize;

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
        $user = $operations->createUser($request->validationData(), $request->file('avatar'));
        if (!$user) {
            return view('pages.sign-up', ['error' => __('При регистрации произошла ошибка.')]);
        }

        Auth::login($user);
        return view('pages.sign-up', ['message' => __('Вы успешно зарегистрировались!')]);
    }
}
