@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Tecnologie</h1>

    <div class="row">
        @foreach ($tecnologie as $tecnologia)
            <div class="col-md-3 mb-4">
                <div class="card">
                    <div class="card-body text-center">
                        <i class="{{ $tecnologia->icon }} fa-2x mb-3"></i>
                        <h5 class="card-title">{{ $tecnologia->name }}</h5>
                        <div class="d-flex justify-content-center">
                            <a href="{{ route('admin.technologies.edit', $tecnologia->id) }}" class="btn btn-warning btn-sm mx-1">Modifica</a>
                            <form action="{{ route('admin.technologies.destroy', $tecnologia->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm mx-1">Elimina</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <a href="{{ route('admin.technologies.create') }}" class="btn btn-primary">Aggiungi nuova tecnologia</a>
</div>
@endsection
