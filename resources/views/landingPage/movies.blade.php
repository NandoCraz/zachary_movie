{{-- @dd($movies) --}}
@extends('landingPage.layouts.main')

@section('container')
    <div class="container my-5">
        <h1 class="my-5 text-center"style="margin-top: 120px !important">{{ $title }}</h1>

        @if ($movies->count())
            <div class="container text-dark">
                <div class="row">
                    @foreach ($movies as $movie)
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                @if ($movie->image)
                                    <img src="{{ asset('storage/' . $movie->image) }}" width="500" height="400"
                                        alt="{{ $movie->judul }}" class="img-fluid mb-2">
                                @else
                                    <img class="card-img" src="https://source.unsplash.com/500x400?random"
                                        alt="{{ $movie->judul }}">
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title">{{ $movie->judul }}</h5>
                                    <p class="card-text">
                                        <small class="text-muted">
                                            Di Publish Oleh : <a href="/movies?user={{ $movie->user->username }}"
                                                class="text-decoration-none fw-bold">{{ $movie->user->name }}</a>
                                            {{ $movie->created_at->diffForHumans() }}
                                        </small>
                                    </p>
                                    {{-- <p>
                                        <small class="badge badge-warning">
                                            Rating : {{ $movie->rating }}
                                        </small>
                                    </p> --}}
                                    <p>{{ $movie->excerpt }}</p>
                                    <a href="/movie/{{ $movie->slug }}" class="btn btn-dark btn-sm">Baca Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @else
            <h3 class="text-center">Movie Not Found.</h3>
        @endif

        <div class="d-flex justify-content-center">
            {{ $movies->links() }}
        </div>
    </div>
    {{-- @foreach ($movies as $movie)
        <article class="mb-5 border-bottom pb-4">
            <h2>
                <a href="/movie/{{ $movie->slug }}" class="text-decoration-none text-dark">{{ $movie->judul }}</a>
            </h2>
            <h5>Di Publish Oleh : <a href="/publisher/{{ $movie->user->username }}"
                    class="text-decoration-none">{{ $movie->user->name }}</a></h5>
            <p>{{ $movie->excerpt }}</p>
            <a href="/movie/{{ $movie->slug }}" class="text-decoration-none my-5">Baca Selengkapnya..</a>
        </article>
    @endforeach --}}
@endsection
