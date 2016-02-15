<?php

namespace App\Listeners;

use App\Events\UserSubscribed;
use Spatie\Newsletter\Exceptions\AlreadySubscribed;
use Spatie\Newsletter\MailChimp\Newsletter;

class SubscribeUser
{
    protected $newsletter;

    /**
     * Create the event listener.
     *
     * @param Newsletter $newsletter
     */
    public function __construct(Newsletter $newsletter)
    {
        $this->newsletter = $newsletter;
    }

    /**
     * Handle the event.
     *
     * @param  UserSubscribed  $event
     * @return void
     */
    public function handle(UserSubscribed $event)
    {
        try {
            $this->newsletter->subscribe($event->user->email);
        } catch (AlreadySubscribed $exception) {
            //
        }
    }
}
