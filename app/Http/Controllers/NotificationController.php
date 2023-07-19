<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class NotificationController extends Controller
{
    public function send(Request $request)
    {
        return response()->json( $this->sendNotification($request->device_key, $request->message,$request->title));

    }
    public function sendNotification($device_key, $message,$title)
    {
        $SERVER_API_KEY = 'AAAA7mLqWeA:APA91bEYaY0sjmk3ZcR3cz-2w0WcmHIQjS_k7WfoBHguvr0Lmo9_H1gMFT0foiXNA8j9zckTAT3dv6bXFzBAFQ5O2rzFJfdhpZQfktW73LcZh48PgIhRaLg2OaO1Xt1je2unBK44kayv';
        $URL = 'https://fcm.googleapis.com/fcm/send';
        $post_data = '{
            "to" : "' . $device_key . '",
            "notification" : {
                 "body" : "' . $message . '",
                 "title" : "' . $title . '"
                },
          }';

        $crl = curl_init();

        $headr = array();
        $headr[] = 'Content-type: application/json';
        $headr[] = 'Authorization: key=' . $SERVER_API_KEY;
        curl_setopt($crl, CURLOPT_SSL_VERIFYPEER, false);

        curl_setopt($crl, CURLOPT_URL, $URL);
        curl_setopt($crl, CURLOPT_HTTPHEADER, $headr);

        curl_setopt($crl, CURLOPT_POST, true);
        curl_setopt($crl, CURLOPT_POSTFIELDS, $post_data);
        curl_setopt($crl, CURLOPT_RETURNTRANSFER, true);

        $ex=curl_exec($crl);
return $ex;


      }
}