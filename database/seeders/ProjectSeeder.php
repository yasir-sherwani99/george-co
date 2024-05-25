<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = array(
            array(
                'id' => 1,
                'category_id' => 1,
                'name' => 'Commercial Plaza',
                'unit' => '472 B',
                'town' => 'Phase 3 DHA',
                'city' => 'Lahore',
                'is_active' => 1
            ),
            array(
                'id' => 2,
                'category_id' => 1,
                'name' => 'Residential Building',
                'unit' => '72 F',
                'town' => 'Phase 3 DHA',
                'city' => 'Lahore',
                'is_active' => 1
            ),
            array(
                'id' => 3,
                'category_id' => 1,
                'name' => 'Prisma Town',
                'unit' => '243 J',
                'town' => 'Phase 3 DHA',
                'city' => 'Lahore',
                'is_active' => 1
            ),
            array(
                'id' => 4,
                'category_id' => 2,
                'name' => 'Community Hospital',
                'unit' => '912 K',
                'town' => 'Phase 3 DHA',
                'city' => 'Lahore',
                'is_active' => 1
            ),
            array(
                'id' => 5,
                'category_id' => 2,
                'name' => 'Hockey Stadium',
                'unit' => '923 B',
                'town' => 'Phase 3 DHA',
                'city' => 'Lahore',
                'is_active' => 1
            ),
            array(
                'id' => 6,
                'category_id' => 2,
                'name' => 'Cinema House',
                'unit' => '754 B',
                'town' => 'Phase 3 DHA',
                'city' => 'Lahore',
                'is_active' => 1
            )
        );

        if(count($projects) > 0) {
            foreach($projects as $project) {
                Project::updateOrCreate([
                    'name' => $project['name']
                ],[
                    'id' => $project['id'],
                    'category_id' => $project['category_id'],
                    'unit' => $project['unit'],
                    'town' => $project['town'],
                    'city' => $project['city'],
                    'is_active' => $project['is_active']
                ]);
            }
        }
    }
}
