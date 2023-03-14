<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class SmsService
{
    public function send(string $phoneNumber, string $name, string $code): bool
    {
        $url = config('sms.sms_url');

        $phoneNumber = substr($phoneNumber,1);
        $phoneNumber = "+966$phoneNumber";
        $data = [
            'api_id' => config('sms.api_id'),
            'api_password' => config('sms.api_password'),
            'sms_type' => config('sms.sms_type'),
            'encoding' => config('sms.encoding'),
            'phonenumber' => $phoneNumber,
            'templateid' => config('sms.templateid'),
            'V1' => $name,
            'V2' => $code
        ];
        $response = Http::get($url,$data);
        dd($response);
    }
}



// api_id:API63006360631
// api_password:green@100
// sms_type:T
// encoding:T
// sender_id:Atlobs
// phonenumber:+966549350972
// templateid:1028
// V1:test
// V2:1125
