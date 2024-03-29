<?php

namespace App\Http\Controllers\Authorize;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function __invoke(): RedirectResponse
    {
        Auth::logout();
        return redirect(route('index'));
    }
}
