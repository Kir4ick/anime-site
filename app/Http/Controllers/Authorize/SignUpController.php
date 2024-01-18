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
        $message = 'При регистрации произошла ошибка.';
        if (!$user) return view('pages.sign-up', ['message' => $message]);

        Auth::login($user);
        return redirect(route('index'));
    }
}
