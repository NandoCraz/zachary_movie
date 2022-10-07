@extends('userPage.layouts.main')

@section('content')
    @if (session('berhasil'))
        <div class="alert alert-success mb-3 col-lg-10" role="alert">
            {{ session('berhasil') }}
        </div>
    @endif
    <a href="/data-movie/create" class="btn btn-info mb-4"><i class=" fas fa-solid fa-plus"></i> Tambah Data</a>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Movie Saya</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="text-center">
                        <tr>
                            <th>No.</th>
                            <th>Judul</th>
                            <th>Sutradara</th>
                            <th>Genre</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($movies as $movie)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $movie->judul }}</td>
                                <td>{{ $movie->sutradara }}</td>
                                <td>
                                    <ul>
                                        @foreach ($movie->genre as $genre)
                                            <li>
                                                <p class="badge badge-dark">
                                                    {{ $genre->nama }}
                                                </p>
                                            </li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>
                                    <a href="/data-movie/{{ $movie->id }}/edit" class="btn btn-success btn-sm"><i
                                            class="fas fa-solid fa-pen"></i></a>
                                    <form action="/data-movie/{{ $movie->id }}" method="post" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-sm btn-danger" onclick="confirm('Yakin Ingin Menghapus?')"><i
                                                class="fas fa-solid fa-trash"></i></button>
                                    </form>
                                    <a href="/data-movie/{{ $movie->id }}" class="btn btn-sm btn-primary"><i
                                            class="fas fa-solid fa-book"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
