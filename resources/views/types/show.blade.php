@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">{{ $tipi->nome }}</h2>
            <p class="card-text">{{ $tipi->description }}</p>
            <i class="{{ $tipi->icon }}"></i>
            <div class="mt-4">
                <a href="{{ route('admin.types.index', $tipi) }}" class="btn btn-second-gradient">Torna ai Type</a>
            </div>
        </div>
    </div>

    <div class="mt-4">
        <h3>Progetti associati:</h3>
        @if($tipi->projects->isEmpty())
            <p>Nessun progetto associato a questo tipo.</p>
        @else
            <ul class="list-group">
                @foreach($tipi->projects as $project)
                    <li class="list-group-item">{{ $project->name }} - {{ $project->description }}</li>
                @endforeach
            </ul>
        @endif
    </div>

    <div class="mt-4">
        <a href="{{ route('admin.types.edit', $tipi) }}" class="btn btn-gradient">Modifica</a>
    </div>
</div>
@endsection