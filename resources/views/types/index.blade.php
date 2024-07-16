 @extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Types</h1>
    <div class="row">
        @foreach ($tipi as $tipo)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $tipo->nome }}</h5>
                        <p class="card-text">{{ $tipo->description }}</p>
                        <p><i class="{{$tipo->icon}}"></i></p>
                        <a href="{{ route('admin.types.show', $tipo->id) }}" class="btn btn-primary">Dettaglio</a>
                        <form action="{{ route('admin.types.destroy', $tipo->id) }}" method="POST" class="ml-auto">
                            @csrf
                            @method("DELETE")
                            <button class="btn-delete">
                                <div class="sign">
                                    <svg viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M135.168 400c0 8.837-7.163 16-16 16s-16-7.163-16-16V176c0-8.837 7.163-16 16-16s16 7.163 16 16v224zm96-224c-8.837 0-16 7.163-16 16v224c0 8.837 7.163 16 16 16s16-7.163 16-16V192c0-8.837-7.163-16-16-16zm112 224V176c0-8.837 7.163-16 16-16s16 7.163 16 16v224c0 8.837-7.163 16-16 16s-16-7.163-16-16zm32-288h-64l-25.6-32H166.4L140.8 112H64v32h320V112zm32-32H20.8c-8.836 0-16 7.164-16 16v32c0 8.836 7.164 16 16 16h30.4l20.8 267.6c.6 8.6 7.7 15.4 16.4 15.4h256c8.7 0 15.8-6.8 16.4-15.4L396.8 144h30.4c8.836 0 16-7.164 16-16v-32c0-8.836-7.164-16-16-16zM48 448c0 35.3 28.7 64 64 64h224c35.3 0 64-28.7 64-64V144H48v304z"/>
                                    </svg>                                       
                                </div>
                                <div class="text">Elimina</div>
                            </button>
                        </form>
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
