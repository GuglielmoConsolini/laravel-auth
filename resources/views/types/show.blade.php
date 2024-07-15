{{-- @extends("layouts.admin")

@section("content")



<h2>{{ $tipi->nome }}</h2>
<p>{{ $tipi->description }}</p>
<i class="{{$tipi->icon}}"></i>
<p>Type: {{$tipi->type_id}}</p>


@endsection --}}

@extends("layouts.admin")

@section("content")
<h2>{{ $tipi->nome }}</h2>
<p>{{ $tipi->description }}</p>
<i class="{{$tipi->icon}}"></i>

<h3>Progetti associati:</h3>
@if($tipi->projects->isEmpty())
    <p>Nessun progetto associato a questo tipo.</p>
@else
    <ul>
        @foreach($tipi->projects as $project)
            <li>{{ $project->name }} - {{ $project->description }}</li>
        @endforeach
    </ul>
@endif
@endsection