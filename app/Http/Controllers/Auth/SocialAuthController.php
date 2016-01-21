<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
        $user = Socialite::driver('facebook')->user();

        $authUser = $this->findOrCreateUser($user, 'Facebook');

        auth()->login($authUser, true);

        return redirect(route('home'));
    }

    private function findOrCreateUser($socialUser, $provider)
    {
        if ($authUser = User::where('provider_id', '=', $socialUser->id)->first()) {
            return $authUser;
        }

        return User::create([
            'username'    => 'usuario_' . str_random(5),
            'email'       => $socialUser->email,
            'provider'    => $provider,
            'provider_id' => $socialUser->id
        ]);
    }
}
