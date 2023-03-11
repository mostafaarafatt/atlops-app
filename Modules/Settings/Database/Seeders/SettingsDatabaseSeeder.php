<?php

namespace Modules\Settings\Database\Seeders;

use Illuminate\Database\Seeder;
use Laraeast\LaravelSettings\Facades\Settings;

class SettingsDatabaseSeeder extends Seeder
{
    /**
     * The list of the files keys.
     *
     * @var array
     */
    protected $files = [
        'logo',
        'favicon',
        'loginLogo',
        'loginBackground',
        'cover',
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $titles = [
            'theme' => 'dark',
            'email' => 'info@ape-eg.com',
            'phone' => '01005062221',
            'mobile' => '01097099010',
            'whats_app' => '01005062221',
            'fax' => '(+202) 23417149',
            'name:en' => 'Donation System',
            'name:ar' => 'نظام التبرعات',
            'description:en' => 'Donation System',
            'description:ar' => 'نظام التبرعات',
            'meta_description:en' => 'Donation System',
            'meta_description:ar' => 'نظام التبرعات',
            'facebook' => 'https://www.facebook.com/ShadyGaberAgency',
            'twitter' => 'https://www.twitter.com/ShadyGaberAgency',
            'instagram' => 'https://www.instagram.com/shadygaberagency.eg',
            'youtube' => 'https://www.youtube.com/channel/UCf_AG88Ta8AU8AHE_Mj_fdg',
            'linkedin' => 'https://www.linkedin.com/ShadyGaberAgency',
            'phone' => '01005062221',
            'mobile' => '01097099010',

        ];

        foreach ($titles as $key => $value) {
            Settings::set($key, $value);
        }



        // images
        foreach ($this->files as $file) {
            Settings::set($file)->addMedia(__DIR__ . '/images/' . $file . '.png')
                ->preservingOriginal()
                ->toMediaCollection($file);
        }
    }
}
