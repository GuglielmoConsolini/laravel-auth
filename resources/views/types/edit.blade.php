@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Modifica Tipo</h1>

    <form action="{{ route('admin.types.update', $type) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome', $type->nome) }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea class="form-control" id="description" name="description" rows="4" required>{{ old('description', $type->description) }}</textarea>
        </div>
        <div class="mb-3">
            <label for="icon" class="form-label">Icona</label>
            <input type="text" class="form-control" id="icon" name="icon" value="{{ old('icon', $type->icon) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Salva modifiche</button>
    </form>
</div>
@endsection