{{-- @dd($movies) --}}
@extends('userPage.layouts.main')

@section('content')
    @if (session('berhasil'))
        <div class="alert alert-success mb-3 col-lg-10" role="alert">
            {{ session('berhasil') }}
        </div>
    @endif
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Seluruh User</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="text-center">
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Movie</th>
                            <th>Dibuat</th>
                            <th>Terakhir Login</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->movie->count() }} Movie</td>
                                <td class="text-center">{{ $user->created_at->format('m/d/Y') }}</td>
                                <td>
                                    {{ Carbon\Carbon::parse($user->last_seen)->diffForHumans() }}
                                </td>
                                <td>
                                    @if (Cache::has('user-is-online-' . $user->id))
                                        <span class="text-success">Online</span>
                                    @else
                                        <span class="text-secondary">Offline</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <form action="/users/{{ $user->id }}" method="post" class="d-inline">
                                        @csrf
                                        <button class="btn btn-sm btn-danger" onclick="confirm('Yakin Ingin Menghapus?')"><i
                                                class="fas fa-solid fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
