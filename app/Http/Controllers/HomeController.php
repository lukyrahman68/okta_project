<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SMSGateway;
use SMSGatewayMe\Client\ApiClient;
use SMSGatewayMe\Client\Configuration;
use SMSGatewayMe\Client\Api\DeviceApi;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    public function tes(){
        $msg = 'Hai Nenes';
        $number='08563534390';
        $deviceid = '109133';
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://smsgateway.me/api/v4/message/send",
          CURLOPT_SSL_VERIFYPEER=>false,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => "[{\"phone_number\": \"$number\", \"message\": \"$msg\", \"device_id\": $deviceid}]",
          CURLOPT_HTTPHEADER => array(
            "Cache-Control: no-cache",
            "Postman-Token: 0dfb5acc-f0ae-415b-a5d3-ca12a2dfdfd3",
            "authorization: eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJhZG1pbiIsImlhdCI6MTU0OTE5NTQ2NCwiZXhwIjo0MTAyNDQ0ODAwLCJ1aWQiOjY3Njg2LCJyb2xlcyI6WyJST0xFX1VTRVIiXX0.inoC3TujoLUGMHMuqo_zwEhNDm38i-5m_DGoXA4tB_A"
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
          echo "cURL Error #:" . $err;
        } else {
          echo $response;
        }
    }
}
