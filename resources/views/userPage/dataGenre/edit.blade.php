@extends('userPage.layouts.main')
@section('content')
    <div class="row">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-primary">
                        Edit Genre
                    </h4>
                </div>
                <div class="card-body">

                    <form method="POST" action="/master/data-genre/{{ $genre->id }}" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="mb-4">
                            <label for="judul">Nama</label>
                            <input class="form-control @error('nama') is-invalid @enderror" id="nama" type="text"
                                name="nama" value="{{ old('nama', $genre->nama) }}" required>
                            @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="slug">Slug</label>
                            <input class="form-control @error('slug') is-invalid @enderror" id="slug" type="text"
                                name="slug" value="{{ old('slug', $genre->slug) }}" required>
                            @error('slug')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="imageFile" class="form-label">Genre Image</label>
                            @if ($genre->image)
                                <img src="{{ asset('storage/' . $genre->image) }}"
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
