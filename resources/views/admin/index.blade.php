@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Projects</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($progetti as $progetto)
                <tr>
                    <td>{{ $progetto->id }}</td>
                    <td>{{ $progetto->name }}</td>
                    <td>{{ $progetto->description }}</td>
                    <td>{{ $progetto->created_at }}</td>
                    <td>{{ $progetto->updated_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection