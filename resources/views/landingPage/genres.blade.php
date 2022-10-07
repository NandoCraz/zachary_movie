@extends('landingPage.layouts.main')

@section('container')
    <div class="container my-5">
        <h1 class="my-5 text-center"style="margin-top: 120px !important">{{ $title }}</h1>

        <div class="container">
            <div class="row">
                @foreach ($genres as $genre)
                    <div class="col-md-4">
                        <div class="card p-0">
                            <a href="/movies?genre={{ $genre->slug }}">
                                <img class="card-img" src="https://source.unsplash.com/600x500?{{ $genre->nama }}"
                                    alt="{{ $genre->nama }}">
                                <div class="card-img-overlay d-flex align-items-center p-0">
                                    <h5 class="card-title flex-fill text-center text-light fs-2 py-3"
                                        style="background-color: rgba(0,0,0,0.7)">{{ $genre->nama }}</h5>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- <ul class="list-group">
        <a href="/genres/{{ $genre->slug }}" class="text-decoration-none text-dark">
            <li class="list-group-item">
                <h2>
                    {{ $genre->nama }}
                </h2>
            </li>
        </a>
    </ul> --}}
@endsection
