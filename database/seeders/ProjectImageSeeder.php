<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\ProjectImage;

class ProjectImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $images = array(
            array(
                'id' => 1,
                'project_id' => 1,
                'name' => 'p-banner-1.png',
                'src' => 'images/upload/projects/p-banner-1.png',
                'width' => '0',
                'height' => '0',
                'size' => '0',
                'type' => 'images/png'
            ),
            array(
                'id' => 2,
                'project_id' => 2,
                'name' => 'p-banner-2.png',
                'src' => 'images/upload/projects/p-banner-2.png',
                'width' => '0',
                'height' => '0',
                'size' => '0',
                'type' => 'images/png'
            ),
            array(
                'id' => 3,
                'project_id' => 3,
                'name' => 'p-banner-3.png',
                'src' => 'images/upload/projects/p-banner-3.png',
                'width' => '0',
                'height' => '0',
                'size' => '0',
                'type' => 'images/png'
            ),
            array(
                'id' => 4,
                'project_id' => 4,
                'name' => 'p-banner-4.png',
                'src' => 'images/upload/projects/p-banner-4.png',
                'width' => '0',
                'height' => '0',
                'size' => '0',
                'type' => 'images/png'
            ),
            array(
                'id' => 5,
                'project_id' => 5,
                'name' => 'p-banner-5.png',
                'src' => 'images/upload/projects/p-banner-5.png',
                'width' => '0',
                'height' => '0',
                'size' => '0',
                'type' => 'images/png'
            ),
            array(
                'id' => 6,
                'project_id' => 6,
                'name' => 'p-banner-6.png',
                'src' => 'images/upload/projects/p-banner-6.png',
                'width' => '0',
                'height' => '0',
                'size' => '0',
                'type' => 'images/png'
            )
        );

        if(count($images) > 0) {
            foreach($images as $image) {
                ProjectImage::updateOrCreate([
                    'name' => $image['name']
                ],[
                    'id' => $image['id'],
                    'project_id' => $image['project_id'],
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
