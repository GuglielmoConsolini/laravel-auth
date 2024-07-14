@extends("layouts.app")

@section("content")
<h2>{{ $project->name }}</h2>
<p>{{ $project->description }}</p>
<p>{{ $project->created_at }}</p>

@endsection
