<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = array(
            array(
                'id' => 1,
                'name' => 'Pre Engineered',
                'slug' => 'pre-engineered',
                'is_active' => 1
            ),
            array(
                'id' => 2,
                'name' => 'Production Units',
                'slug' => 'production-units',
                'is_active' => 1
            ),
        );

        if(count($categories) > 0) {
            foreach($categories as $category) {
                Category::updateOrCreate([
                    'name' => $category['name']
                ],[
                    'id' => $category['id'],
                    'slug' => $category['slug'],
                    'is_active' => $category['is_active']
                ]);
            }
        }
    }
}
