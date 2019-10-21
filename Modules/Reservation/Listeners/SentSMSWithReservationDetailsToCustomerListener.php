<?php

namespace Modules\Reservation\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;
use Modules\Reservation\Events\ReservationDoneEvent;

class SentSMSWithReservationDetailsToCustomerListener implements ShouldQueue
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
     * @param  ReservationDoneEvent  $event
     * @return void
     */
    public function handle(ReservationDoneEvent $event)
    {
        /**
         * Sent Reservation Details To Customer
         * ! TODO::check if it there any type of URL to sent sms
        */
        $url = "https://mazinhost.com/smsv1/sms/api?action=send-sms&api_key=YWhqZXoyNDpRfnZrR2VZTHt2NWh7SE44&to=" . $event->contact . "&from=ahjez-24&sms=" . $event->message;

        $client = new \GuzzleHttp\Client();
        // $response = $client->request('GET', $url);

        // dd($response->getStatusCode(), $response->getHeaderLine('content-type'));
        // echo $response->getStatusCode(); # 200
        // echo $response->getHeaderLine('content-type'); # 'application/json; charset=utf8'
        // echo $response->getBody(); # '{"id": 1420053, "name": "guzzle", ...}'

        # Send an asynchronous request.
        $request = new \GuzzleHttp\Psr7\Request('GET', $url);
        $promise = $client->sendAsync($request)->then(function ($response) use ($event) {
            if ($response->getStatusCode() == 200) {
                return $response->getBody();
            } else {
                return $event->reservation;
            }
        });
        $promise->wait();
        return $url;
        // Log::info($event->reservation);
        return $event->reservation;

    }
}
