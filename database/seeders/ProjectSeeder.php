<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use Faker\Generator as Faker;
use App\Functions\Helper;
use App\Models\Type;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for($i = 0; $i < 20; $i++){
            $new_project = new Project;
            $new_project->type_id = Type::inRandomOrder()->first()->id;
            $new_project->title = $faker->words(3, true);
            $new_project->start_date = $faker->dateTimeInInterval('now', '-3 months');
            $new_project->end_date = $faker->dateTimeInInterval($new_project->start_date, '+1 week');
            $new_project->description = $faker->paragraph();
            $new_project->slug = Helper::generateSlug($new_project->title, Project::class);
            $new_project->save();
        }
    }
}
