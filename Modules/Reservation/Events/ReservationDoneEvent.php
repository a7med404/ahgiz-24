<?php

namespace Modules\Reservation\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Modules\Reservation\Entities\Reservation;

class ReservationDoneEvent implements ShouldQueue
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $reservation;
    public $contact;
    public $message;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Reservation $reservation, $contact)
    {
        $this->reservation = $reservation;
        $this->contact     = $contact;
        $this->message     = 
            __('app/messages.reservation_message') . " : " . $reservation->number. "%0a" .
            __('app/messages.customer_message') . " : " . $reservation->customer->c_name . "%0a" .
            __('app/messages.company_message') . " : " . $reservation->trip->company->name . "%0a" .
            __('app/messages.from_message') . " : " . $reservation->trip->fromStation->name . "%0a" .
            __('app/messages.to_message') . " : " . $reservation->trip->toStation->name . "%0a" .
            __('app/messages.date_message') . " : " . $reservation->trip->date . "%0a" .
            __('app/messages.departure_time_message') . " : " .$reservation->trip->departure_time . "%0a" .
            __('app/messages.passengers_number_message') . " : " . $reservation->passengers->count() . "%0a" .
            __('app/messages.departure_blance_message') . " : " . $reservation->passengers->count() * $reservation->trip->price. "%0a" .
            __('app/messages.hotline_message') . " : ". getSetting('hot_line') ."%0a %0a %0a".
            getSetting('side_name') . "%0a";
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
