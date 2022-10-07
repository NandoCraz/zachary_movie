{{-- @dd($movie->judul) --}}
@extends('userPage.layouts.main')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h1 class="mb-3 text-center">{{ $movie->judul }}</h1>
                @if ($movie->image)
                    <img src="{{ asset('storage/' . $movie->image) }}" width="1200" alt="{{ $movie->judul }}"
                        class="img-fluid mb-2">
                @else
                    <img src="https://source.unsplash.com/1200x400?random" alt="hero" class="img-fluid my-4">
                @endif
                <h5>Sutradara : {{ $movie->sutradara }}</h5>
                <h6>Genre :
                    @foreach ($movie->genre as $genre)
                        <a href="/movies?genre={{ $genre->slug }}" class="badge badge-danger">{{ $genre->nama }} </a>
                    @endforeach
                </h6>
                <p class="badge badge-warning">Rating : {{ $movie->rating == 0 ? '-' : $movie->rating }}</p>
                <p class="my-4">{!! $movie->body !!}</p>
                <a href="/data-movie" class=" btn btn-secondary btn-small text-decoration-none my-4">Kembali</a>
            </div>
        </div>
    </div>
@endsection
