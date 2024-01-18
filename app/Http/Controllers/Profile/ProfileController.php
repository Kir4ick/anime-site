<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function page(): View
    {
        /** @var User $user */
        $user = \Illuminate\Support\Facades\Auth::user();
        $avatar_url = \Illuminate\Support\Facades\Storage::disk('local')
            ->url($user->avatar);
        $nickname = $user->nickname;
        return view('pages.profile', compact('avatar_url', 'nickname'));
    }
}
