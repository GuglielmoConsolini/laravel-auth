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
                
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection