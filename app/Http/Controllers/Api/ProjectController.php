<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        return response()->json([
            'success'=> true,
            'projects'=> Project::with(['technologies','type'])->orderByDesc('id')->paginate
            ()
        ]);
    }

    public function show($id)
    {
    $project = Project::with('technologies', 'type')->findOrFail($id);
    return response()->json(['project' => $project]);
    }

}
