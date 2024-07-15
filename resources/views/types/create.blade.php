@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Crea un nuovo Tipo</h1>

    <form action="{{ route('admin.types.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome') }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea class="form-control" id="description" name="description" rows="4" required>{{ old('description') }}</textarea>
        </div>
        <div class="mb-3">
            <label for="icon" class="form-label">Icona</label>
            <input type="text" class="form-control" id="icon" name="icon" value="{{ old('icon') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Crea Tipo</button>
    </form>
</div>
@endsection