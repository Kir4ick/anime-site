<?php

namespace App\Http\Controllers\Authorize;

use App\Http\Controllers\Controller;
use App\Http\Requests\SignInRequest;
use App\Repositories\Interfaces\IUserRepository;
use Illuminate\Contracts\Hashing\Hasher;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class SignInController extends Controller
{

    public function page(): View
    {
        return view('pages.sign-in');
    }

    /**
     * Логика авторизации
     *
     * @param SignInRequest $request
     * @param IUserRepository $repository
     * @return View|RedirectResponse
     */
    public function __invoke(SignInRequest $request, IUserRepository $repository): View|RedirectResponse
    {
        $password = $request->password;
        $password_hash = md5($password);
        $user = $repository->getUserByPasswordAndLogin($request->login, $password_hash);

        if (!$user)
            return view('pages.sign-in', ['error' => 'Такого пользователя не существует!']);

        Auth::login($user);
        return redirect(route('index'));
    }
}

