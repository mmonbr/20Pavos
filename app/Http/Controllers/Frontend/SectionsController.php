<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Requests\Frontend\ContactRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class SectionsController extends Controller
{
    public function contact()
    {
        return view('frontend.contact.index');
    }

    public function postContact(ContactRequest $request)
    {
        $data = [
            'name'    => $request->get('name'),
            'email'   => $request->get('email'),
            'subject' => $request->get('subject'),
            'content' => $request->get('content'),
        ];

        Mail::send('frontend.contact.emails.contact', $data, function ($message) use ($request) {
            $message->from($request->get('email'), $request->get('name'));

            $message->to(config('settings.emails.contact'))->subject($request->get('subject'));
        });

        alert()->success('¡Gracias por ponerte en contacto con nosotros!', '¡Enviado!');

        return redirect(route('home'));
    }
}
