<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Spatie\Newsletter\MailChimp\Newsletter;
use App\Http\Requests\Frontend\SubscribeRequest;
use Spatie\Newsletter\Exceptions\AlreadySubscribed;

class SubscriptionsController extends Controller
{
    public function subscribe(SubscribeRequest $request, Newsletter $newsletter)
    {
        try {
            $newsletter->subscribe($request->get('subscriber_email'));
            alert()->success('Gracias por suscribirte. Cada semana recibirás los productos más molones en tu email.', 'Sí, sí, sí!')->persistent('Cerrar');
        } catch (AlreadySubscribed $exception) {
            alert()->warning('Tu email ya se encontraba en nuestra base de datos. ¡Te gradecemos el interés!', '¡Oops!')->persistent('Cerrar');
        }

        return redirect()->back();
    }
}
