<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tipoFront = new Type();
        $tipoFront-> nome = "Front-end";
        $tipoFront-> description = "Progetto inerente alla visualizzazione della pagina";
        $tipoFront-> icon ="fa-brands fa-html5";
        $tipoFront->save();

        $tipoBack = new Type();
        $tipoBack-> nome = "Back-end";
        $tipoBack-> description = "Progetto incentrato sul Back office dell'applicazione";
        $tipoBack-> icon ="fa-brand fa-php";
        $tipoBack->save();

        $tipoFull = new Type();
        $tipoFull-> nome = "Full-stack";
        $tipoFull-> description = "Progetto che racchiude elementi sia di front end che di back end";
        $tipoFull-> icon ="fa-solid fa-layer-group";
        $tipoFull->save();

        $tipoDesign = new Type();
        $tipoDesign-> nome = "Design";
        $tipoDesign-> description = "Progetto che si concentra sull'aspetto grafico dell'applicazione";
        $tipoDesign-> icon ="fa-solid fa-pen-fancy";
        $tipoDesign->save();
    }
}
