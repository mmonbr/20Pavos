<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->asPopup()->redirect();
    }

    public function handleFacebookCallback()
    {
        $user = Socialite::driver('facebook')->user();

        $authUser = $this->findOrCreateUser($user, 'Facebook');

        auth()->login($authUser, true);

        return view('auth.close');
    }

    private function findOrCreateUser($socialUser, $provider)
    {
        if ($authUser = User::where('provider_id', '=', $socialUser->id)->first()) {
            return $authUser;
        }

        alert()->success('¡Ya estás logeado! Te hemos asignado un nombre aleatorio pero, por favor, no te quedes con ese. Cámbialo por uno que te pegue más y escoge una contraseña para tu cuenta.', '¡Bienvenido!')->persistent('OK');

        return User::create([
            'username'    => 'usuario_' . str_random(5),
            'email'       => $socialUser->email,
            'provider'    => $provider,
            'provider_id' => $socialUser->id
        ]);
    }
}
