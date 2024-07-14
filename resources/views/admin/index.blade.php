@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Projects</h1>
    <div class="row">
        @foreach ($progetti as $progetto)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $progetto->name }}</h5>
                        <p class="card-text">{{ $progetto->description }}</p>
                        <p class="card-text"><small class="text-muted">Created at: {{ $progetto->created_at }}</small></p>
                        <p class="card-text"><small class="text-muted">Updated at: {{ $progetto->updated_at }}</small></p>
                        <a href="{{ route('admin.projects.edit', $progetto->id) }}" class="btn btn-warning">Modifica</a>
                        <a href="{{ route('admin.projects.show', $progetto->id) }}" class="btn btn-primary">Dettaglio</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection