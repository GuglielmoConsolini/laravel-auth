@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Modifica progetto</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Nome progetto</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $project->name) }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea class="form-control" id="description" name="description" rows="4" required>{{ old('description', $project->description) }}</textarea>
        </div>
        <div class="mb-3">
            <label for="cover_image" class="form-label">Choose file</label>
            <input type="file" class="form-control" name="cover_image" id="cover_image" placeholder="" aria-describedby="coverImageHelper" />
            <div id="coverImageHelper" class="form-text">Upload an image for the current project</div>
            @error('cover_image')
            <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="technologies" class="form-label">Technologie</label>
            <select class="form-control" id="technologies" name="technologies[]" multiple>
                @foreach($technologies as $technology)
                    <option value="{{ $technology->id }}" @if(in_array($technology->id, old('technologies', $project->technologies->pluck('id')->toArray() ?? []))) selected @endif>
                        {{ $technology->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Aggiorna</button>
    </form>
    
</div>
@endsection