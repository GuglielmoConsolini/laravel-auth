@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Types</h1>
    <div class="row">
        @foreach ($tipi as $tipo)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $tipo->nome }}</h5>
                        <p class="card-text">{{ $tipo->description }}</p>
                        <p><i class="{{$tipo->icon}}"></i></p>
                        <a href="{{ route('admin.types.show', $tipo->id) }}" class="btn btn-primary">Dettaglio</a>
                
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<div class="text-center mt-4">
    <a href="{{ route('admin.types.create') }}" class="btn btn-cyberpunk">Aggiungi un nuovo Type</a>
</div>
@endsection

