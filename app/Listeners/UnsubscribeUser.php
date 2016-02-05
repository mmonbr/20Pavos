<?php

namespace App\Listeners;

use App\Events\UserUnsubscribed;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mailchimp_List_NotSubscribed;
use Spatie\Newsletter\MailChimp\Newsletter;

class UnsubscribeUser
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
     * @param UserUnsubscribed $event
     */
    public function handle(UserUnsubscribed $event)
    {
        try {
            $this->newsletter->unsubscribe($event->user->email);
        } catch(Mailchimp_List_NotSubscribed $exception){
            //
        }
    }
}
