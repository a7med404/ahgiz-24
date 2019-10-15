<?php

namespace Modules\Customer\Listeners;

use Modules\Customer\Events\CustomerRegisteredOrLoginEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SentOTPToCustomerListener implements ShouldQueue
{
    use InteractsWithQueue;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  CustomerRegisteredOrLoginEvent  $event
     * @return void
     */
    public function handle(CustomerRegisteredOrLoginEvent $event)
    {
        dd($event);
        //Sent TOP

    }

    
}
