<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use Faker\Generator as Faker;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i = 0; $i < 5; $i++) {
            $newProject = new Project();
            $newProject->name = $faker->sentence(3); 
            $newProject->description = $faker->paragraph(); 
            $newProject->type_id = $faker->numberBetween(1 , 4);
            $newProject->save();
        }
    }
}
