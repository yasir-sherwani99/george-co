<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\ServiceImage;

class ServiceImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $images = array(
            array(
                'id' => 1,
                'service_id' => 1,
                'name' => 's-1.png',
                'src' => 'images/upload/services/s-1.png',
                'width' => '0',
                'height' => '0',
                'size' => '0',
                'type' => 'images/png'
            ),
            array(
                'id' => 2,
                'service_id' => 2,
                'name' => 's-2.png',
                'src' => 'images/upload/services/s-2.png',
                'width' => '0',
                'height' => '0',
                'size' => '0',
                'type' => 'images/png'
            ),
            array(
                'id' => 3,
                'service_id' => 3,
                'name' => 's-3.png',
                'src' => 'images/upload/services/s-3.png',
                'width' => '0',
                'height' => '0',
                'size' => '0',
                'type' => 'images/png'
            ),
            array(
                'id' => 4,
                'service_id' => 4,
                'name' => 's-4.png',
                'src' => 'images/upload/services/s-4.png',
                'width' => '0',
                'height' => '0',
                'size' => '0',
                'type' => 'images/png'
            ),
            array(
                'id' => 5,
                'service_id' => 5,
                'name' => 's-5.png',
                'src' => 'images/upload/services/s-5.png',
                'width' => '0',
                'height' => '0',
                'size' => '0',
                'type' => 'images/png'
            ),
            array(
                'id' => 6,
                'service_id' => 6,
                'name' => 's-6.png',
                'src' => 'images/upload/services/s-6.png',
                'width' => '0',
                'height' => '0',
                'size' => '0',
                'type' => 'images/png'
            ),
            array(
                'id' => 7,
                'service_id' => 7,
                'name' => 's-7.png',
                'src' => 'images/upload/services/s-7.png',
                'width' => '0',
                'height' => '0',
                'size' => '0',
                'type' => 'images/png'
            ),
            array(
                'id' => 8,
                'service_id' => 8,
                'name' => 's-8.png',
                'src' => 'images/upload/services/s-8.png',
                'width' => '0',
                'height' => '0',
                'size' => '0',
                'type' => 'images/png'
            ),
            array(
                'id' => 9,
                'service_id' => 9,
                'name' => 's-9.png',
                'src' => 'images/upload/services/s-9.png',
                'width' => '0',
                'height' => '0',
                'size' => '0',
                'type' => 'images/png'
            ),
            array(
                'id' => 10,
                'service_id' => 10,
                'name' => 's-10.png',
                'src' => 'images/upload/services/s-10.png',
                'width' => '0',
                'height' => '0',
                'size' => '0',
                'type' => 'images/png'
            ),
            array(
                'id' => 11,
                'service_id' => 11,
                'name' => 's-11.png',
                'src' => 'images/upload/services/s-11.png',
                'width' => '0',
                'height' => '0',
                'size' => '0',
                'type' => 'images/png'
            ),
            array(
                'id' => 12,
                'service_id' => 12,
                'name' => 's-12.png',
                'src' => 'images/upload/services/s-12.png',
                'width' => '0',
                'height' => '0',
                'size' => '0',
                'type' => 'images/png'
            )
        );

        if(count($images) > 0) {
            foreach($images as $image) {
                ServiceImage::updateOrCreate([
                    'name' => $image['name']
                ],[
                    'id' => $image['id'],
                    'service_id' => $image['service_id'],
                    'src' => $image['src'],
                    'width' => $image['width'],
                    'height' => $image['height'],
                    'size' => $image['size'],
                    'type' => $image['type']
                ]);
            }
        }
    }
}
