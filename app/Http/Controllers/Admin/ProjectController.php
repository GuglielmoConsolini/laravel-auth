<?php

namespace App\Http\Controllers\Admin;
use App\Models\Type;
use App\Models\Project;
use App\Models\Technology;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use illuminate\Http\Request;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $progetti = Project::with('type', 'technologies')->get();

        return view('admin.index', compact('progetti'));
 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.create', compact('types','technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {

        $data = $request->validate([
            "name" => "required",
            "description" => "required",
            "cover_image" => "nullable|image|max:2048",
            "type_id" => "required|exists:types,id",
            "technologies" => "array|exists:technologies,id", // Aggiungi la validazione per le tecnologie
        ]);


        // Verifica se è stata caricata un'immagine
        if ($request->hasFile('cover_image')) {
        // Salva l'immagine nella directory 'uploads' e ottieni il percorso
           $image_path = Storage::put('uploads', $request->file('cover_image'));
        // Aggiungi il percorso dell'immagine ai dati da salvare
           $data['cover_image'] = $image_path;
        }
        

           // Crea un nuovo progetto con i dati dal form
        $project = new Project();
        $project->fill( $data );

        // Salva il progetto nel database
        $project->save();

        if ($request->has('technologies')) {
            $project->technologies()->attach($request->technologies);
        }

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

        $technologies = Technology::all();

        return view("admin.edit" , $data, compact('technologies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
{
    // Validazione dei dati, inclusa la cover_image
    $data = $request->validate([
        "name" => "required",
        "description" => "required",
        "cover_image" => "nullable|image|max:2048",
        "technologies" => "array|exists:technologies,id", // Aggiungi la validazione per le tecnologie

        
    ]);

    // Verifica se è stata caricata un'immagine
    if ($request->hasFile('cover_image')) {
        // Salva l'immagine nella directory 'uploads' e ottieni il percorso
        $image_path = Storage::put('uploads', $request->file('cover_image'));
        // Aggiungi il percorso dell'immagine ai dati da salvare
        $data['cover_image'] = $image_path;

        // Elimina l'immagine precedente se esiste
        if ($project->cover_image && Storage::exists($project->cover_image)) {
            Storage::delete($project->cover_image);
        }
    }

    // Aggiorna il progetto con i nuovi dati
    $project->update($data);

    if ($request->has('technologies')) {
        $project->technologies()->sync($request->technologies);
    } else {
        $project->technologies()->detach(); // Rimuove tutte le tecnologie se nessuna è selezionata
    }

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
