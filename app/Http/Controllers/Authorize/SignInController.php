<?php

namespace App\Http\Controllers\Authorize;

use App\Dto\Operations\User\InputAuthUserOperation;
use App\Http\Controllers\Controller;
use App\Http\Operations\Interfaces\IUserOperations;
use App\Http\Requests\SignInRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class SignInController extends Controller
{

    public function page(): View
    {
        return view('pages.sign-in');
    }

    public function __invoke(SignInRequest $request, IUserOperations $operations): View|RedirectResponse
    {
        $response = $operations->authorizeUser(
            (new InputAuthUserOperation())->setLogin($request->login)->setPassword($request->password)
        );
        if ($response->getErrorMessage() != null) {
            return view('pages.sign-in', ['error' => $response->getErrorMessage()]);
        }

        $message = sprintf('Вы успешно авторизовались! %s', Auth::user()->nickname);
        return view('pages.sign-in', ['message' => __($message)]);
    }
}

