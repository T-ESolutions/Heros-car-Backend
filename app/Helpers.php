<?php

use App\Models\TripRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

if (!function_exists('driver_id')) {
    function driver_id()
    {
        return auth()->user()->id;
    }
}

if (!function_exists('pagination_number')) {
    function pagination_number()
    {
        return 6;
    }
}
// send fcm notification
function send_notification($title, $body, $details, $image, $data, $token)
{

    $message = $body;
    $path_to_fcm = 'https://fcm.googleapis.com/fcm/send';
    $server_key = "AAAA31ep5NE:APA91bFGi2zgaq3HwWcMz6Q77Me3CnFcxKms93YaC4GKoPQMwNWnwt3vV-58SXlg1HWKH800Li2FLoqhD9RLJvOeVCu-J93aC4T-MTtg6X30f6KVYIZt7sqmxGxjuXboFLc61HF6qjho";

    $headers = array(
        'Authorization:key=' . $server_key,
        'Content-Type:application/json'
    );

    $fields = array('registration_ids' => $token,
        'notification' => array('title' => $title, 'body' => strip_tags($message), 'details' => $details, 'image' => $image),
        'data' => array('title' => $title, 'body' => strip_tags($message), 'details' => $details, 'image' => $image));

    $payload = json_encode($fields);
    $curl_session = curl_init();
    curl_setopt($curl_session, CURLOPT_URL, $path_to_fcm);
    curl_setopt($curl_session, CURLOPT_POST, true);
    curl_setopt($curl_session, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl_session, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl_session, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl_session, CURLOPT_IPRESOLVE, CURLOPT_IPRESOLVE);
    curl_setopt($curl_session, CURLOPT_POSTFIELDS, $payload);
    $result = curl_exec($curl_session);
    curl_close($curl_session);
    return $result;
}

if (!function_exists('settings')) {
    function settings($key)
    {
        $result = App\Models\Setting::select('id', 'key', 'value')->where('key', $key)->first();
        return $result['value'];
    }
}

if (!function_exists('format_coordiantes')) {
    function format_coordiantes($coordinates)
    {
        $data = [];
        foreach ($coordinates as $coord) {
            $data[] = (object)['lat' => $coord->getlat(), 'lng' => $coord->getlng()];
        }
        return $data;
    }
}


if (!function_exists('sendResponse')) {
    function sendResponse($status = null, $msg = null, $data = null)
    {
        return response(
            [
                'status' => $status,
                'msg' => $msg,
                'data' => $data
            ]
        );
    }
}
if (!function_exists('validationErrorsToString')) {
    function validationErrorsToString($errArray)
    {
        $valArr = array();
        foreach ($errArray->toArray() as $key => $value) {
            $errStr = $value[0];
            array_push($valArr, $errStr);
        }
        return $valArr;
    }
}
if (!function_exists('makeValidate')) {
    function makeValidate($inputs, $rules)
    {
        $validator = Validator::make($inputs, $rules);
        if ($validator->fails()) {
            return validationErrorsToString($validator->messages());
        } else {
            return true;
        }
    }
}


function checkLang()
{
    if (!isset(getallheaders()['lang'])) {
        return response()->json(['status' => 401, 'msg' => 'The language is Required']);
    }
}


function check_api_token($api_token)
{
    if ($api_token != null && $api_token != "") {

        return \App\Models\User::where("api_token", $api_token)->first();
    } else {
        return null;
    }
}


function msgdata($status, $key, $data)
{
    $msg['status'] = $status;
    $msg['msg'] = $key;
    $msg['data'] = $data;
    return $msg;
}


function msg($status, $key)
{
    $msg['status'] = $status;
    $msg['msg'] = $key;
    return $msg;
}

function send($tokens, $title = "رسالة جديدة", $msg = "رسالة جديدة فى البريد", $type = 'mail', $chat = null)
{
    $key = 'AAAA31ep5NE:APA91bFGi2zgaq3HwWcMz6Q77Me3CnFcxKms93YaC4GKoPQMwNWnwt3vV-58SXlg1HWKH800Li2FLoqhD9RLJvOeVCu-J93aC4T-MTtg6X30f6KVYIZt7sqmxGxjuXboFLc61HF6qjho';

    $fields = array
    (
        "registration_ids" => (array)$tokens,  //array of user token whom notification sent to
        "priority" => 10,
        'data' => [
            'title' => $title,
            'body' => strip_tags($msg),
            'id' => $chat,
            'type' => $type,
            'icon' => 'myIcon',
            'sound' => 'mySound',
        ],
        'notification' => [
            'title' => $title,
            'body' => strip_tags($msg),
            'id' => $chat,
            'type' => $type,
            'icon' => 'myIcon',
            'sound' => 'mySound',
        ],
        'vibrate' => 1,
        'sound' => 1
    );

    $headers = array
    (
        'accept: application/json',
        'Content-Type: application/json',
        'Authorization: key=' . $key
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
    $result = curl_exec($ch);


    if ($result === FALSE) {
        die('Curl failed: ' . curl_error($ch));
    }


    curl_close($ch);
    return $result;
}

function currents()
{
    return 'current';
}

function finished()
{
    return 'finished';
}

function canceled()
{
    return 'canceled';
}

function arrived()
{
    return 'arrived';
}

function success()
{
    return 200;
}

function failed()
{
    return 401;
}

function not_authoize()
{
    return 403;
}

function not_acceptable()
{
    return 406;
}

function not_found()
{
    return 404;
}

function not_active()
{
    return 405;
}

function suspend()
{
    return 407;
}


function upload($file, $dir)
{
    $image = time() . uniqid() . '.' . $file->getClientOriginalExtension();
    $file->move('uploads' . '/' . $dir, $image);
    return $image;
}

function upload_multiple($file, $dir)
{
    $image = time() . uniqid() . '.' . $file->getClientOriginalExtension();
    $destinationPath = $dir;
    $file->storeAs($destinationPath, $image, 'my_upload');
    return $image;
}


if (!function_exists('HttpPost')) {
    function HttpPost($url_path, $data = [])
    {
        $apiURL = 'https://accept.paymob.com/api/' . $url_path;
        // Create curl resource
        $ch = curl_init($apiURL);
        // Request headers
        $headers = array();
        $headers[] = 'Content-Type: application/json';
        // Return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        // $output contains the output string
        $output = curl_exec($ch);

        // Close curl resource to free up system resources
        curl_close($ch);
        return json_decode($output);
    }

    if (!function_exists('deleteHangedOrders')) {

        function deleteHangedOrders()
        {
            $now = Carbon::now();
            $hangedOrders = TripRequest::orderBy('id', 'desc')
                ->whereNull('accept_at')
                ->whereNull('started_at')
                ->whereNull('finished_at')
                ->whereNull('reject_at')
                ->whereNull('user_cancel_at')
                ->whereNull('user_cancel_reason')
                ->get();
            foreach ($hangedOrders as $hangedOrder) {
                $hangedOrderCreated_at = Carbon::parse($hangedOrder->created_at);
                if ($hangedOrderCreated_at->diff($now)->h > 24 ||
                    $hangedOrderCreated_at->diff($now)->d > 0
                ) {
                    TripRequest::whereId($hangedOrder->id)
                        ->update([
                            'user_cancel_at' => Carbon::now(),
                            'user_cancel_reason' => 'order waits too long & no response - الطلب انتظر طويلا بدون استجابة',
                        ]);
                }
            }
        }
    }

}
