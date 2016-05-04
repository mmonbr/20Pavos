<?php

namespace App\Http\Controllers\Frontend;

use App\Traits\SEO;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\ContactRequest;

class SectionsController extends Controller
{
    use SEO;

    public function contact()
    {
        $this->addSEOTagsForContact();

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

    public function cookies()
    {
        $this->addSeoTagsForPrivacy();

        return view('frontend.static.cookies');
    }

    public function privacy()
    {
        $this->addSeoTagsForPrivacy();

        return view('frontend.static.privacy');
    }
}
