@extends('layouts.admin')

@section('content')
    <div class="container-fluid mt-4">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header text-center">
                        <h2>{{ __('Dashboard') }}</h2>
                    </div>

                    <div class="card-body text-center">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <h4>{{ __('You are logged in!') }}</h4>
                        <div class="mt-4">
                            <a href="{{ route('admin.projects.index') }}"><button class="btn">View Projects</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<style>

    .btn {
    --border-color: linear-gradient(-45deg, #ffae00, #7e03aa, #00fffb);
    --border-width: 0.125em;
    --curve-size: 0.5em;
    --blur: 30px;
    --bg: #F5FFFA	;
    --color: #afffff;
    color: var(--color);
    cursor: pointer;
    position: relative;
    isolation: isolate;
    display: inline-grid;
    place-content: center;
    padding: 0.5em 1.5em;
    font-size: 17px;
    border: 0;
    text-transform: uppercase;
    box-shadow: 10px 10px 20px rgba(0, 0, 0, 0.6);
    clip-path: polygon(
        0% var(--curve-size),
        var(--curve-size) 0,
        100% 0,
        100% calc(100% - var(--curve-size)),
        calc(100% - var(--curve-size)) 100%,
        0 100%
    );
    transition: color 250ms;
}

.btn::after,
.btn::before {
    content: "";
    position: absolute;
    inset: 0;
}

.btn::before {
    background: var(--border-color);
    background-size: 300% 300%;
    animation: move-bg7234 5s ease infinite;
    z-index: -2;
}

@keyframes move-bg7234 {
    0% {
        background-position: 31% 0%;
    }

    50% {
        background-position: 70% 100%;
    }

    100% {
        background-position: 31% 0%;
    }
}

.btn::after {
    background: var(--bg);
    z-index: -1;
    clip-path: polygon(
        var(--border-width) calc(var(--curve-size) + var(--border-width) * 0.5),
        calc(var(--curve-size) + var(--border-width) * 0.5) var(--border-width),
        calc(100% - var(--border-width)) var(--border-width),
        calc(100% - var(--border-width)) calc(100% - calc(var(--curve-size) + var(--border-width) * 0.5)),
        calc(100% - calc(var(--curve-size) + var(--border-width) * 0.5)) calc(100% - var(--border-width)),
        var(--border-width) calc(100% - var(--border-width))
    );
    transition: clip-path 500ms;
}

.btn:where(:hover, :focus)::after {
    clip-path: polygon(
        calc(100% - var(--border-width)) calc(100% - calc(var(--curve-size) + var(--border-width) * 0.5)),
        calc(100% - var(--border-width)) var(--border-width),
        calc(100% - var(--border-width)) var(--border-width),
        calc(100% - var(--border-width)) calc(100% - calc(var(--curve-size) + var(--border-width) * 0.5)),
        calc(100% - calc(var(--curve-size) + var(--border-width) * 0.5)) calc(100% - var(--border-width)),
        calc(100% - calc(var(--curve-size) + var(--border-width) * 0.5)) calc(100% - var(--border-width))
    );
    transition: 200ms;
}

.btn:where(:hover, :focus) {
    color: #fff;
}

</style>
