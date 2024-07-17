@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h2>{{ $project->name }}</h2>
        </div>
        <div class="card-body">

            @if (Str::startsWith($project->cover_image, 'http'))
                        <img src="{{ $project->cover_image }}" class="card-img-top" alt="{{ $project->name }}">
                    @else
                        <img src="{{ asset('storage/' . $project->cover_image) }}" class="card-img-top" alt="{{ $project->name }}">
            @endif

            <p class="card-text">{{ $project->description }}</p>
            <p class="text-muted">Creato il: {{ $project->created_at->format('d-m-Y H:i') }}</p>
            @if($project->type)
                <p class="text-muted">ID Tipo: {{ $project->type_id }}</p>
                <p class="text-muted">Nome Tipo: {{ $project->type->nome }}</p>
            @endif
        </div>
        <div class="card-footer d-flex justify-content-between">
            <a href="{{ route('admin.projects.index') }}" class="btn btn-primary">Torna alla lista progetti</a>
            <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-gradient">Modifica Progetto</a>
        </div>
    </div>
</div>
@endsection

<style>
    
</style>
