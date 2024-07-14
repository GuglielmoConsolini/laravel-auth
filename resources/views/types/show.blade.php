@extends("layouts.app")

@section("content")

{{ dd($tipi) }}

<h2>{{ $tipi->nome }}</h2>
<p>{{ $tipi->description }}</p>
<i class="{{$tipi->icon}}"></i>
<p>Type: {{$tipi->type_id}}</p>


@endsection
