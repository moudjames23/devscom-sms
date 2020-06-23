<?php

namespace App\Http\Controllers;

use App\Helpers\Sms;
use Illuminate\Http\Request;

class MessageController extends Controller
{


    public function create()
    {
        $title = 'Nouveau message';

        return view('backend.messages.create', compact(['title']));
    }

    public function send(Request $request)
    {
        $this->validate($request, [
            'phone' => 'required|numeric',
            'message' => 'required|max:255',
        ]);

        $this->sendSMS($request['phone'], $request['message']);

        return redirect(route('message.create'));
    }

    public function sendSMS($phone, $message)
    {
        $config = array(
            'clientId' => config('app.clientId'),
            'clientSecret' =>  config('app.clientSecret'),
        );

        $osms = new Sms($config);

        $data = $osms->getTokenFromConsumerKey();
        $token = array(
            'token' => $data['access_token']
        );


        $response = $osms->sendSms(
        // sender
            'tel:+224620000000',
            // receiver
            'tel:+224' . $phone,
            // message
            $message,
            'Bankhi'
        );
    }
}
