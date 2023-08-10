<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_ar',
        'title_en',
        'body_ar',
        'body_en',
        'trip_id',
        'trip_request_id',
        'image',
        'is_seen',
        'from_type',
        'from_id',
        'to_type',
        'to_id',
    ];

    protected $appends = ['title', 'body'];

    public function getTitleAttribute()
    {
        if ($locale = \app()->getLocale() == "ar") {
            return $this->title_ar;
        } else {
            return $this->title_en;
        }
    }

    public function getBodyAttribute()
    {
        if (\app()->getLocale() == "ar") {
            return $this->body_ar;
        } else {
            return $this->body_en;
        }
    }

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public static function send($tokens, $title="hello", $msg="helo msg", $type="Other",$data=null){
        $key = 'AAAAmGuyxwo:APA91bHRjnM8ymKsGbrBk48PXCxM3fZwz-i5JHWQy1RnUw_y9NDy_KdsSO8h0WR3jzGCSC8ergky5Hej7UNrUdUG4LZut7YBURiBhnqY7pZQGXgHjDP_TFTNixZVgYDb8fvzCYM2PjrV';

        $fields = array
        (
//            "registration_ids" => (array)$tokens,
            "registration_ids" => (array)$tokens,
            //"registration_ids" => (array)'diLndYfZRFyxw8nOjU5yt0:APA91bGYE5TyP2VjgUHHEuCP5-dMEoY8K4AgEl_JuWYjcFyJxS1MamBtJhmp4y-q-lhYWF6AXvy9OpgOJJsJyJ5qSNCHFvSR3iWODWVb84NkbnpZYcuNL0mkforreA89wcwrHuntJdaG',
            "priority" => 10,
            'data' => [
                'title' => $title,
                'body' => $msg,
                'type' => $type,
                'model_id' => isset($data->model_id) ? $data->model_id : "",
//                'not' => $not,
                'icon' => 'myIcon',
                'sound' => 'mySound',
            ],
            'notification' => [
                'title' => $title,
                'body' => $msg,
                'type' => $type,
                'model_id' => isset($data->model_id) ? $data->model_id : "",
//                'not' => $not,
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
//        dd($result);
        //  var_dump($result);
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }
        curl_close($ch);

        return $result;
    }

}
