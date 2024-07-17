<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $TechLaravel = new Technology();
        $TechLaravel-> name = "Laravel";
        $TechLaravel-> icon ="fa-brands fa-laravel";
        $TechLaravel->save();

        $TechVue = new Technology();
        $TechVue-> name = "Vue JS";
        $TechVue-> icon ="fa-brands fa-vuejs";
        $TechVue->save();

        $TechBootstrap = new Technology();
        $TechBootstrap-> name = "Bootstrap";
        $TechBootstrap-> icon ="fa-brands fa-bootstrap";
        $TechBootstrap->save();

        $TechJS = new Technology();
        $TechJS-> name = "JavaScript";
        $TechJS-> icon ="fa-brands fa-js";
        $TechJS->save();
    }
}
