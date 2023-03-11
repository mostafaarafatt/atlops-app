<?php

namespace Modules\Categories\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Categories\Entities\Category;

class CategoriesDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'السيارات' => 'sedan.png',
            'العقارات' => 'office-building.png',
            'معدات ثقيلة' => 'pliers.png',
            'قطع الغيار' => 'Maintenance tools.png',
            'ملابس' => 'clothes-hanger.png',
            'أحذية' => 'running-shoe.png',
            'قوارب' => 'ship.png',
            'ملابس' => 'shirt.png',
            'أشخاص متخصصين' => 'business-card.png',
            'خدمات' => 'digital-services.png',
            'ألعاب واقعية' => 'game-controller.png',
            'المستلزمات الصحية' => 'health-check.png',
            'أجهزة إلكترونية' => 'responsive.png',
            'دراجات' => 'mountain-bike.png',
            'حيوانات' => 'whale.png',
            'البلاستيك' => 'plastic.png',
        ];

        foreach ($categories as $key => $value) {
            $category = Category::create([
                'name' => $key,
            ]);

            $category->addMedia(__DIR__ . '/categories/'. $value)
                ->preservingOriginal()
                ->toMediaCollection('images');
        }
    }
}
