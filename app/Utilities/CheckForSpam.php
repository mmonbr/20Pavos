<?php namespace App\Utilities;

class CheckForSpam
{
    public function reCAPTCHA($request)
    {
        $curl = new Curl();
        $response = $curl->post('https://www.google.com/recaptcha/api/siteverify',  [
            'secret'   => config('services.recaptcha.secret'),
            'response' => $request->input('g-recaptcha-response'),
            'remoteip' => $request->ip(),
        ]);

        return json_decode($response);
    }
}