@extends('layouts.admin')

@section('content')
<div class="container night-mode">
    <div class="Type-card">
        <p class="heading">
            {{ $tipi->nome }}
        </p>
        <p>
            {{ $tipi->description }}
        </p>
        <i class="{{ $tipi->icon }}"></i>
        <a href="{{ route('admin.types.index', $tipi) }}" class="btn btn-second-gradient">Torna ai Type</a>
    </div>

    <div class="mt-4">
        <h3>Progetti associati:</h3>
        @if($tipi->projects->isEmpty())
            <p>Nessun progetto associato a questo tipo.</p>
        @else
            <ul class="list-group">
                @foreach($tipi->projects as $project)
                    <li class="list-group-item">{{ $project->name }} - {{ $project->description }}</li>
                @endforeach
            </ul>
        @endif
    </div>

    <div class="mt-4">
        <a href="{{ route('admin.types.edit', $tipi) }}" class="btn btn-gradient">Modifica</a>
    </div>
</div>
@endsection

<style>

    .Type-card {
    position: relative;
    width: 190px;
    height: 254px;
    background-color: #000;
    display: flex;
    flex-direction: column;
    justify-content: end;
    padding: 12px;
    gap: 12px;
    border-radius: 8px;
    cursor: pointer;
    color: white;
  }
  
  .Type-card::before {
    content: '';
    position: absolute;
    inset: 0;
    left: -5px;
    margin: auto;
    width: 200px;
    height: 264px;
    border-radius: 10px;
    background: linear-gradient(-45deg, #e81cff 0%, #40c9ff 100% );
    z-index: -10;
    pointer-events: none;
    transition: all 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
  }
  
  .Type-card::after {
    content: "";
    z-index: -1;
    position: absolute;
    inset: 0;
    background: linear-gradient(-45deg, #fc00ff 0%, #00dbde 100% );
    transform: translate3d(0, 0, 0) scale(0.95);
    filter: blur(20px);
  }
  
  .heading {
    font-size: 20px;
    text-transform: capitalize;
    font-weight: 700;
  }
  
  .Type-card p:not(.heading) {
    font-size: 14px;
  }
  
  .Type-card p:last-child {
    color: #e81cff;
    font-weight: 600;
  }
  
  .Type-card:hover::after {
    filter: blur(30px);
  }
  
  .Type-card:hover::before {
    transform: rotate(-90deg) scaleX(1.34) scaleY(0.77);
  }
</style>