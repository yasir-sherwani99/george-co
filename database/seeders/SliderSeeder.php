<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sliders = array(
            array(
                'id' => 1,
                'heading' => 'First Slide Label',
                'sub_heading' => "Some representative placeholder content for the first slide.",
                'image' => "images/upload/sliders/banner-1.png",
                'is_active' => 1
            ),
            array(
                'id' => 2,
                'heading' => 'Second Slide Label',
                'sub_heading' => "Some representative placeholder content for the second slide.",
                'image' => "images/upload/sliders/banner-2.png",
                'is_active' => 1
            ),
            array(
                'id' => 3,
                'heading' => 'Third Slide Label',
                'sub_heading' => "Some representative placeholder content for the third slide.",
                'image' => "images/upload/sliders/banner-3.png",
                'is_active' => 1
            ),
            array(
                'id' => 4,
                'heading' => 'Fourth Slide Label',
                'sub_heading' => "Some representative placeholder content for the fourth slide.",
                'image' => "images/upload/sliders/banner-4.png",
                'is_active' => 1
            )
        );

        if(count($sliders) > 0) {
            foreach($sliders as $slider) {
                Slider::updateOrCreate([
                    'heading' => $slider['heading']
                ],[
                    'id' => $slider['id'],
                    'sub_heading' => $slider['sub_heading'],
                    'image' => $slider['image'],
                    'is_active' => $slider['is_active']
                ]);
            }
        }
    }
}
