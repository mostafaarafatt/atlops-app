<?php

namespace Modules\Sliders\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Sliders\Entities\Slider;

class SlidersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sliders = [
            'slider1.jpg' => [
                'title:en' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam',
                'title:ar' => 'بدأ الكثير من قصص النجاح من هنا',
            ],
            'slider2.jfif' => [
                'title:en' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam',
                'title:ar' => 'بدأ الكثير من قصص النجاح من هنا',
            ],
            'slider3.jpg' => [
                'title:en' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam',
                'title:ar' => 'بدأ الكثير من قصص النجاح من هنا',
            ],
            'slider4.jfif' => [
                'title:en' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam',
                'title:ar' => 'بدأ الكثير من قصص النجاح من هنا',
            ],
            'slider5.jfif' => [
                'title:en' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam',
                'title:ar' => 'بدأ الكثير من قصص النجاح من هنا',
            ],
        ];


        foreach ($sliders as $image => $data) {
            $slider = Slider::create([
                'title:en' => $data['title:en'],
                'title:ar' => $data['title:ar'],
            ]);

             // add image
             $slider->addMedia(__DIR__ . '/sliders/' . $image)
             ->preservingOriginal()
             ->toMediaCollection('sliders');
        }

    }
}
