<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\MetaTag;

class MetaTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $metatags = array(
            array(
                'id' => 1,
                'page' => 'Home',
                'title' => 'Georgia Construction | Home',
                'description' => '',
                'keywords' => ''
            ),
            array(
                'id' => 2,
                'page' => 'About',
                'title' => 'Georgia Construction | About',
                'description' => '',
                'keywords' => ''
            ),
            array(
                'id' => 3,
                'page' => 'Projects',
                'title' => 'Georgia Construction | Projects',
                'description' => '',
                'keywords' => ''
            ),
            array(
                'id' => 4,
                'page' => 'Services',
                'title' => 'Georgia Construction | Services',
                'description' => '',
                'keywords' => ''
            ),
            array(
                'id' => 5,
                'page' => 'Contact',
                'title' => 'Georgia Construction | Contact',
                'description' => '',
                'keywords' => ''
            )
        );

        if(count($metatags) > 0) {
            foreach($metatags as $meta) {
                MetaTag::updateOrCreate([
                    'page' => $meta['page']
                ],[
                    'id' => $meta['id'],
                    'title' => $meta['title'],
                    'description' => $meta['description'],
                    'keywords' => $meta['keywords']
                ]);
            }
        }
    }
}
