<?php

namespace Modules\Customer\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Modules\Customer\Entities\Customer;

class CustomerRegisteredOrLoginEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    
    public $customer;
    public $otp;
    public $message;

    /**
     * Create a new event instance.
     *
     * @param \App\customer $customer
     */
    public function __construct(Customer $customer, $otp)
    {
        $this->customer = $customer;
        $this->message = '' . $this->otp . '';
    }
}
