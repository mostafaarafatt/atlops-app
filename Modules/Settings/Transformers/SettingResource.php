<?php

namespace Modules\Settings\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Settings\Entities\Setting;

class SettingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name' => Setting::get('name:' . app()->getLocale()),
            'email' => Setting::get('email'),
            'phone' => Setting::get('phone'),
            'facebook' => Setting::get('facebook'),
            'instagram' => Setting::get('instagram'),
            'youtube' => Setting::get('youtube'),
            'twitter' => Setting::get('twitter'),
            'android_app_id' => Setting::get('android_app_id'),
            'ios_app_id' => Setting::get('ios_app_id'),
            'current_android_version' => Setting::get('current_android_version'),
            'current_ios_version' => Setting::get('current_ios_version'),
            'android_force_update' => (boolean)Setting::get('android_force_update'),
            'ios_force_update' => (boolean)Setting::get('ios_force_update'),
            'WhatsApp_number' => Setting::get('whats_app'),
            'order_minimum' => Setting::get('minimum_fees'),
            'delivery_fees' => Setting::get('delivery_fees'),
        ];
    }
}
