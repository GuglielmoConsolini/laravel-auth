@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Dettagli Tecnologia</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $tecnologie->name }}</h5>
            <p class="card-text"><strong>Icona:</strong> <i class="{{ $tecnologie->icon }} fa-2x"></i></p>

            <!-- Aggiungi altre informazioni della tecnologia qui -->
            
            <div class="mt-4">
                <a href="{{ route('admin.technologies.edit', $tecnologie->id) }}" class="btn btn-warning">Modifica</a>
                <form action="{{ route('admin.technologies.destroy', $tecnologie->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Elimina</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

