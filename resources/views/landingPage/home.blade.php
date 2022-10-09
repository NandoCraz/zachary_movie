@extends('landingPage.layouts.main')
@section('container')
    {{-- <div class="row gy-4 justify-content-center">
        <div class="col-xl-3 col-lg-4 col-md-6">
            <div class="gallery-item h-100">
                <img src="{{ asset('landingAssets/img/gallery/gallery-1.jpg') }}" class="img-fluid" alt="">
                <div class="gallery-links d-flex align-items-center justify-content-center">
                    <a href="{{ asset('landingAssets/img/gallery/gallery-1.jpg') }}" title="Gallery 1"
                        class="glightbox preview-link"><i class="bi bi-arrows-angle-expand"></i></a>
                    <a href="gallery-single.html" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
            </div>
        </div><!-- End Gallery Item -->
        <div class="col-xl-3 col-lg-4 col-md-6">
            <div class="gallery-item h-100">
                <img src="{{ asset('landingAssets/img/gallery/gallery-2.jpg') }}" class="img-fluid" alt="">
                <div class="gallery-links d-flex align-items-center justify-content-center">
                    <a href="{{ asset('landingAssets/img/gallery/gallery-2.jpg') }}" title="Gallery 2"
                        class="glightbox preview-link"><i class="bi bi-arrows-angle-expand"></i></a>
                    <a href="gallery-single.html" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
            </div>
        </div><!-- End Gallery Item -->
        <div class="col-xl-3 col-lg-4 col-md-6">
            <div class="gallery-item h-100">
                <img src="{{ asset('landingAssets/img/gallery/gallery-3.jpg') }}" class="img-fluid" alt="">
                <div class="gallery-links d-flex align-items-center justify-content-center">
                    <a href="{{ asset('landingAssets/img/gallery/gallery-3.jpg') }}" title="Gallery 3"
                        class="glightbox preview-link"><i class="bi bi-arrows-angle-expand"></i></a>
                    <a href="gallery-single.html" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
            </div>
        </div><!-- End Gallery Item -->
        <div class="col-xl-3 col-lg-4 col-md-6">
            <div class="gallery-item h-100">
                <img src="{{ asset('landingAssets/img/gallery/gallery-4.jpg') }}" class="img-fluid" alt="">
                <div class="gallery-links d-flex align-items-center justify-content-center">
                    <a href="{{ asset('landingAssets/img/gallery/gallery-4.jpg') }}" title="Gallery 4"
                        class="glightbox preview-link"><i class="bi bi-arrows-angle-expand"></i></a>
                    <a href="gallery-single.html" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
            </div>
        </div><!-- End Gallery Item -->
        <div class="col-xl-3 col-lg-4 col-md-6">
            <div class="gallery-item h-100">
                <img src="{{ asset('landingAssets/img/gallery/gallery-5.jpg') }}" class="img-fluid" alt="">
                <div class="gallery-links d-flex align-items-center justify-content-center">
                    <a href="{{ asset('landingAssets/img/gallery/gallery-5.jpg') }}" title="Gallery 5"
                        class="glightbox preview-link"><i class="bi bi-arrows-angle-expand"></i></a>
                    <a href="gallery-single.html" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
            </div>
        </div><!-- End Gallery Item -->
        <div class="col-xl-3 col-lg-4 col-md-6">
            <div class="gallery-item h-100">
                <img src="{{ asset('landingAssets/img/gallery/gallery-6.jpg') }}" class="img-fluid" alt="">
                <div class="gallery-links d-flex align-items-center justify-content-center">
                    <a href="{{ asset('landingAssets/img/gallery/gallery-6.jpg') }}" title="Gallery 6"
                        class="glightbox preview-link"><i class="bi bi-arrows-angle-expand"></i></a>
                    <a href="gallery-single.html" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
            </div>
        </div><!-- End Gallery Item -->
        <div class="col-xl-3 col-lg-4 col-md-6">
            <div class="gallery-item h-100">
                <img src="{{ asset('landingAssets/img/gallery/gallery-7.jpg') }}" class="img-fluid" alt="">
                <div class="gallery-links d-flex align-items-center justify-content-center">
                    <a href="{{ asset('landingAssets/img/gallery/gallery-7.jpg') }}" title="Gallery 7"
                        class="glightbox preview-link"><i class="bi bi-arrows-angle-expand"></i></a>
                    <a href="gallery-single.html" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
            </div>
        </div><!-- End Gallery Item -->
        <div class="col-xl-3 col-lg-4 col-md-6">
            <div class="gallery-item h-100">
                <img src="{{ asset('landingAssets/img/gallery/gallery-8.jpg') }}" class="img-fluid" alt="">
                <div class="gallery-links d-flex align-items-center justify-content-center">
                    <a href="{{ asset('landingAssets/img/gallery/gallery-8.jpg') }}" title="Gallery 8"
                        class="glightbox preview-link"><i class="bi bi-arrows-angle-expand"></i></a>
                    <a href="gallery-single.html" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
            </div>
        </div><!-- End Gallery Item -->
        <div class="col-xl-3 col-lg-4 col-md-6">
            <div class="gallery-item h-100">
                <img src="{{ asset('landingAssets/img/gallery/gallery-9.jpg') }}" class="img-fluid" alt="">
                <div class="gallery-links d-flex align-items-center justify-content-center">
                    <a href="{{ asset('landingAssets/img/gallery/gallery-9.jpg') }}" title="Gallery 9"
                        class="glightbox preview-link"><i class="bi bi-arrows-angle-expand"></i></a>
                    <a href="gallery-single.html" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
            </div>
        </div><!-- End Gallery Item -->
        <div class="col-xl-3 col-lg-4 col-md-6">
            <div class="gallery-item h-100">
                <img src="{{ asset('landingAssets/img/gallery/gallery-10.jp') }}g" class="img-fluid" alt="">
                <div class="gallery-links d-flex align-items-center justify-content-center">
                    <a href="{{ asset('landingAssets/img/gallery/gallery-10.jp') }}g" title="Gallery 10"
                        class="glightbox preview-link"><i class="bi bi-arrows-angle-expand"></i></a>
                    <a href="gallery-single.html" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
            </div>
        </div><!-- End Gallery Item -->
        <div class="col-xl-3 col-lg-4 col-md-6">
            <div class="gallery-item h-100">
                <img src="{{ asset('landingAssets/img/gallery/gallery-11.jp') }}g" class="img-fluid" alt="">
                <div class="gallery-links d-flex align-items-center justify-content-center">
                    <a href="{{ asset('landingAssets/img/gallery/gallery-11.jp') }}g" title="Gallery 11"
                        class="glightbox preview-link"><i class="bi bi-arrows-angle-expand"></i></a>
                    <a href="gallery-single.html" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
            </div>
        </div><!-- End Gallery Item -->
        <div class="col-xl-3 col-lg-4 col-md-6">
            <div class="gallery-item h-100">
                <img src="{{ asset('landingAssets/img/gallery/gallery-12.jp') }}g" class="img-fluid" alt="">
                <div class="gallery-links d-flex align-items-center justify-content-center">
                    <a href="{{ asset('landingAssets/img/gallery/gallery-12.jp') }}g" title="Gallery 12"
                        class="glightbox preview-link"><i class="bi bi-arrows-angle-expand"></i></a>
                    <a href="gallery-single.html" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
            </div>
        </div><!-- End Gallery Item -->
        <div class="col-xl-3 col-lg-4 col-md-6">
            <div class="gallery-item h-100">
                <img src="{{ asset('landingAssets/img/gallery/gallery-13.jp') }}g" class="img-fluid" alt="">
                <div class="gallery-links d-flex align-items-center justify-content-center">
                    <a href="{{ asset('landingAssets/img/gallery/gallery-13.jp') }}g" title="Gallery 13"
                        class="glightbox preview-link"><i class="bi bi-arrows-angle-expand"></i></a>
                    <a href="gallery-single.html" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
            </div>
        </div><!-- End Gallery Item -->
        <div class="col-xl-3 col-lg-4 col-md-6">
            <div class="gallery-item h-100">
                <img src="{{ asset('landingAssets/img/gallery/gallery-14.jp') }}g" class="img-fluid" alt="">
                <div class="gallery-links d-flex align-items-center justify-content-center">
                    <a href="{{ asset('landingAssets/img/gallery/gallery-14.jp') }}g" title="Gallery 14"
                        class="glightbox preview-link"><i class="bi bi-arrows-angle-expand"></i></a>
                    <a href="gallery-single.html" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
            </div>
        </div><!-- End Gallery Item -->
        <div class="col-xl-3 col-lg-4 col-md-6">
            <div class="gallery-item h-100">
                <img src="{{ asset('landingAssets/img/gallery/gallery-15.jp') }}g" class="img-fluid" alt="">
                <div class="gallery-links d-flex align-items-center justify-content-center">
                    <a href="{{ asset('landingAssets/img/gallery/gallery-15.jp') }}g" title="Gallery 15"
                        class="glightbox preview-link"><i class="bi bi-arrows-angle-expand"></i></a>
                    <a href="gallery-single.html" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
            </div>
        </div><!-- End Gallery Item -->
        <div class="col-xl-3 col-lg-4 col-md-6">
            <div class="gallery-item h-100">
                <img src="{{ asset('landingAssets/img/gallery/gallery-16.jp') }}g" class="img-fluid" alt="">
                <div class="gallery-links d-flex align-items-center justify-content-center">
                    <a href="{{ asset('landingAssets/img/gallery/gallery-16.jp') }}g" title="Gallery 16"
                        class="glightbox preview-link"><i class="bi bi-arrows-angle-expand"></i></a>
                    <a href="gallery-single.html" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="container">
        <section id="hero" class="hero d-flex flex-column justify-content-center align-items-center mb-5" data-aos="fade"
            data-aos-delay="1500">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center">
                        <h2>Selamat Datang di <span>ZachMovie</span>
                            situs web blogger tentang dokumentasi berbagai film!</h2>
                        <p>Disini kamu bisa menulis tentang film apapun yang kamu sukai, dan orang lain bisa menilai
                            tulisanmu.
                        </p>
                        <a href="/data-movie" class="btn-get-started">Mulai Tulis Film Kesukaanmu!</a>
                    </div>
                </div>
            </div>
        </section>
        @if ($movies[0])
            <div class="container mt-5 mb-3">
                <div class="container">
                    <div class="row d-flex justify-content-beetwen">
                        <div class="col-md-6">
                            <h2>Terakhir Dibuat</h2>
                        </div>
                        <div class="col-md-6 text-end">
                            <a href="/movies" class="btn btn-red text-light" style="background-color: red;">Lihat Semua</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-4 text-dark">
                @if ($movies[0]->image)
                    <img src="{{ asset('storage/' . $movies[0]->image) }}" alt="{{ $movies[0]->judul }}" width="1200"
                        class="img-fluid mb-2">
                @else
                    <img class="card-img-top" src="https://source.unsplash.com/1200x400?random" alt="hero">
                @endif
                <div class="card-body text-center">
                    <h5 class="card-title">{{ $movies[0]->judul }}</h5>
                    <p class="card-text">
                        <small class="text-muted">
                            Di Publish Oleh : <a href="/movies?user={{ $movies[0]->user->username }}"
                                class="text-decoration-none fw-bold">{{ $movies[0]->user->name }}</a>
                            {{ $movies[0]->created_at->diffForHumans() }}
                        </small>
                    </p>
                    {{-- <p>
                    <small class="badge badge-warning">
                        Rating : {{ $movies[0]->rating }}
                    </small>
                </p> --}}
                    <p>{{ $movies[0]->excerpt }}</p>
                    <a href="/movie/{{ $movies[0]->slug }}" class="btn btn-dark">Baca Selengkapnya</a>
                </div>
            </div>
        @else
            <h2 class="text-center text-light">Belum Ada Movie Terbaru...</h2>
        @endif

    </div>
@endsection
