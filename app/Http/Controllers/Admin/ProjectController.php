<?php

namespace App\Http\Controllers\Admin;
use App\Models\Type;
use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Controllers\Controller;
use illuminate\Http\Request;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listaProgetti = Project::all();
        $data = [
            "progetti" => $listaProgetti
        ];

        return view("admin.index" , $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        return view('admin.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {

        $data = $request->validate([
            "name" => "required",
            "description" => "required",
            "type_id" => "required|exists:types,id",
        ]);
           // Crea un nuovo progetto con i dati dal form
        $project = new Project();
        $project->fill( $data );

        // Salva il progetto nel database
        $project->save();

        // Reindirizza l'utente alla vista del progetto appena creato
        return redirect()->route('admin.projects.show', $project);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        
        $data = [
            "project" => $project
        ];

        return view("admin.show",$data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $data = [
            "project" => $project
        ];

        return view("admin.edit" , $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
         // Aggiorna il progetto con i dati dal form
         $project->name = $request->input('name');
         $project->description = $request->input('description');
 
         // Salva le modifiche nel database
         $project->save();
 
         // Reindirizza l'utente alla vista del progetto aggiornato
         return redirect()->route('admin.projects.show', $project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index');
    }
}
