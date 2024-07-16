<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $types = Type::all();

        $data = [
            "tipi" => $types
        ];

        return view("types.index" , $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nome' => 'required',
            'description' => 'required',
            'icon' => 'required',
        ]);
    
        $type = Type::create($validatedData);
    
        return redirect()->route('admin.types.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Type $type)
    {   

        $type->load('projects');

        $data = [
            "tipi" => $type
        ];

        return view("types.show" , $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Type $type)
    {
        return view('types.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Type $type)
    {
        $validatedData = $request->validate([
            'nome' => 'required',
            'description' => 'required',
            'icon' => 'required',
        ]);
    
        $type->update($validatedData);
    
        return redirect()->route('admin.types.show', $type);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        $type->delete();
        return redirect()->route('admin.types.index');
    }
}
