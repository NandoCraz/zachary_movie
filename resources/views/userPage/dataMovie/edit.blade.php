@extends('userPage.layouts.main')
@section('content')
    <div class="row">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-primary">
                        Edit Tulisan Movie
                    </h4>
                </div>
                <div class="card-body">

                    <form method="POST" action="/data-movie/{{ $movie->id }}" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="mb-4">
                            <label for="judul">Judul Movie</label>
                            <input class="form-control @error('judul') is-invalid @enderror" id="judul" type="text"
                                name="judul" value="{{ old('judul', $movie->judul) }}" required>
                            @error('judul')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="slug">Slug</label>
                            <input class="form-control @error('slug') is-invalid @enderror" id="slug" type="text"
                                name="slug" value="{{ old('slug', $movie->slug) }}" required>
                            @error('slug')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="sutradara">Sutradara Movie</label>
                            <input class="form-control @error('sutradara') is-invalid @enderror" id="sutradara"
                                type="text" name="sutradara" value="{{ old('sutradara', $movie->sutradara) }}" required>
                            @error('sutradara')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label class="form-control-label">Genre <p class="text-muted fs-6">(Masukkan setidaknya 1 genre)
                                </p></label>
                            <div class="row">
                                @foreach ($genres as $genre)
                                    <div class="col-lg-2">
                                        <div class="form-check">
                                            @if (old('genre') == $genre->id || $movie->genre->where('id', $genre->id)->count())
                                                <input class="form-check-input" type="checkbox" value="{{ $genre->id }}"
                                                    id="genre" name="genre[]" checked>
                                            @else
                                                <input class="form-check-input" type="checkbox" value="{{ $genre->id }}"
                                                    id="genre" name="genre[]">
                                            @endif
                                            <label class="form-check-label" for="flexCheckDefault">
                                                {{ $genre->nama }}
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="imageFile" class="form-label">Movie Image</label>
                            @if ($movie->image)
                                <img src="{{ asset('storage/' . $movie->image) }}"
                                    class="imgPreview img-fluid d-block mb-3 col-sm-5">
                            @else
                                <img class="imgPreview img-fluid col-sm-5 d-block mb-3">
                            @endif
                            <input class="form-control @error('image') is-invalid @enderror" name="image" type="file"
                                id="imageFile" onchange="tampilImage()">
                            @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="body">Body</label>
                            <p class="text-danger">
                                @error('body')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            </p>
                            <input id="body" type="hidden" name="body" value="{{ old('body', $movie->body) }}">
                            <trix-editor input="body"></trix-editor>
                        </div>
                        <div class="mb-4 mt-5">
                            <button type="submit" class="btn btn-primary">Ubah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        const judul = document.querySelector('#judul');
        const slug = document.querySelector('#slug');

        judul.addEventListener('change', function() {
            fetch('/data-movie/addSlug?judul=' + judul.value)
                .then((response) => response.json())
                .then((data) => slug.value = data.slug);
        })


        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        })

        function tampilImage() {
            const image = document.querySelector('#imageFile');
            const imgPreview = document.querySelector('.imgPreview');

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
