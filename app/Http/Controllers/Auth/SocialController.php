<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;


class SocialController extends Controller
{
    public function redirectToGoogleProvider()
    {
        return Socialite::driver('google')->redirect();
   
    }

    public function handleGoogleCallback()

    {
        $userSocial = Socialite::driver('google')->user();

        $user = User::where('email', $userSocial->email)->first();

        if (!$user) {
            $user = User::create([
                'name' => $userSocial->name,
                'email' => $userSocial->email,
                'password' => $userSocial->password
            ]);
        }

        Auth::login($user);
        return redirect()->to('/find');

    }
}
