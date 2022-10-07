@extends('userPage.layouts.main')

@section('content')
    @if (session('berhasil'))
        <div class="alert alert-success mb-3 col-lg-10" role="alert">
            {{ session('berhasil') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger mb-3 col-lg-10" role="alert">
            {{ session('error') }}
        </div>
    @endif
    <div class="container">
        <h2 class="fw-bolder">Seluruh Data</h2>
        <div class="row mt-3">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Seluruh Movie
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ count($movie) }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-solid fa-pen-nib fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @can('user')
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                        Movie Saya
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ count($myMovie) }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-solid fa-bookmark fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endcan

            @can('admin')
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        Best Movie
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ count($bestMovie) }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-solid fa-star fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endcan

            @can('admin')
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-secondary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                                        Seluruh Genre
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ count($allGenres) }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-solid fa-tags fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endcan

            @can('admin')
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Seluruh User
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ count($user) }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-solid fa-users fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endcan

            {{-- <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Best MovieKu
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ count($myBestMovie) }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-solid fa-star fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            {{-- @foreach ($genres as $genre)
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-danger shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                        Genre {{ $genre->nama }}
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        {{ $genre->movie_count }}
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-solid fa-hashtag fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach --}}



        </div>
    </div>

    <div class="container mt-5">
        <h2 class="fw-bolder">Jumlah Genre Yang Dipasang User</h2>
        <div class="row mt-3">

            @foreach ($genres as $genre)
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-danger shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                        Genre {{ $genre->nama }}
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        {{ $genre->movie_count }}
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-solid fa-hashtag fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach



        </div>
    </div>
@endsection
