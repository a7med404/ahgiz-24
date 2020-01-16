<?php

namespace Modules\Payment\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Payment\Entities\Payment;

class ApiPaymentController extends Controller
{
    private $syberpayURL = 'https://syberpay.test.sybertechnology.com/syberpay/';
    private $applicationId = '0000000132';
    private $serviceId = '009001000106';
    private $salt = 'l3emxga9b';
    private $key = 'y5lgm6rxq';
    private function SyberPay($member, $amount)
    {
        return 1;
        $headers = array( 'Content-Type: application/json');

        $syberpayURL = $this->syberpayURL . 'getUrl';

        $applicationId = $this->applicationId;
        $serviceId = $this->serviceId;
        $key = $this->key;
        $salt= $this->salt;

        $currencyDesc = 'SDG';
        // $orderId = mt_rand(1,10000);
        $orderId = $member->id;

        // $totalAmount = mt_rand(1 , 500);
        $totalAmount = $amount;
  
        $customerName = $member->fullname_en;
        $HashedData =  hash('sha256', $key . '|' .$applicationId .'|' .$serviceId .'|' .$totalAmount .'|' .$currencyDesc .'|' .$orderId .'|' . $salt);

        //  Payment info here
        $paymentInfo = array('orderNo' => $orderId , 'customerName' => $customerName );

        // PHP Array contain all request body parameters
        $jsonDataArray = array(
            'applicationId' =>  $applicationId , 
            'serviceId' => $serviceId , 
            'customerRef' => $orderId , 
            'amount' => $totalAmount , 
            'currency' => $currencyDesc , 
            'paymentInfo' => $paymentInfo, 
            'hash' => $HashedData
        );

        // Convert PHP array into JSON object 
        $jsonData = json_encode( $jsonDataArray );

        // Using CURL to send post request 

        $ch = curl_init();

        // Set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $syberpayURL);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true );
 
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);

        // Execute post
        $result = curl_exec($ch);
        curl_close($ch);

        $result_array = json_decode($result, true);
        

        if ( !isset($result_array['paymentUrl']) ) {
            abort(404);
        }

        $paymentUrl = $result_array['paymentUrl'];
        // return $result_array;

        return redirect($paymentUrl);

    }
    public function notify(Request $request)
    {
        if ($request->transactionId) 
        {
            $transactionId = $request->transactionId;

            $headers = array( 'Content-Type: application/json');
            $hashData =  hash('sha256', $this->key . '|' . $this->applicationId . '|' . $transactionId .'|' . $this->salt);
            $jsonData = '{"applicationId":"' .$this->applicationId .'","transactionId":"' .$transactionId .'","hash":"' .$hashData .'"}';
            $ch = curl_init();

            // Set the url, number of POST vars, POST data
            curl_setopt($ch, CURLOPT_URL, $this->syberpayURL . 'payment_status');
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true );
     
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
    
           // Execute post
           $result = curl_exec($ch);
           curl_close($ch);
           $result_array = json_decode($result, true);

        //    return $result_array;

        //    $payment_status = $result_array['payment']['status'];
        //    $customerRef = $result_array['payment']['customerRef'];

           if (isset($result_array['payment']['status'])) { 

                $payment_status = $result_array['payment']['status'];
                $customerRef = $result_array['payment']['customerRef'];

                // PAID RESERVATION ..

                return 'Re';

           }else {
               // message goes here
           }

        } else {
            return 'Something Wrong with transactionId';
        }
    }
    
    public function return(Request $request)
    {
        return 'All GOOD';
    }
}
