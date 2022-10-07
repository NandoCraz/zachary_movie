{{-- @dd($detail_movie->id) --}}
@extends('landingPage.layouts.main')

@section('container')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h1 class="mb-2 text-center">{{ $detail_movie->judul }}</h1>
                @if ($detail_movie->image)
                    <img src="{{ asset('storage/' . $detail_movie->image) }}" width="1200" alt="{{ $detail_movie->judul }}"
                        class="img-fluid mb-2">
                @else
                    <img src="https://source.unsplash.com/1200x400?random" alt="hero" class="img-fluid my-4">
                @endif
                @if (session('berhasil'))
                    <div class="alert alert-success my-3" role="alert">
                        {{ session('berhasil') }}
                    </div>
                @endif
                <h5>Sutradara : {{ $detail_movie->sutradara }}</h5>
                <h6>Genre :
                    @foreach ($detail_movie->genre as $genre)
                        <a href="/movies?genre={{ $genre->slug }}" class="badge badge-danger">{{ $genre->nama }} </a>
                    @endforeach
                </h6>
                <p class="badge badge-success">Rating : <i class="fas fa-solid fa-star"></i>
                    {{ $detail_movie->rating == 0 ? '-' : $detail_movie->rating }}</p>
                <p>Di Publish Oleh : <a href="/movies?user={{ $detail_movie->user->username }}"
                        class="text-decoration-none fw-bold">{{ $detail_movie->user->name }}</a></p>
                <p class="my-4">{!! $detail_movie->body !!}</p>
                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#ratingModal">Beri Penilaian</a>
                <a href="javascript:history.back()"
                    class=" btn btn-secondary btn-small text-decoration-none my-4">Kembali</a>
            </div>
        </div>
    </div>
@endsection
@include('landingPage.partials.modals.rating')
