@extends('userPage.layouts.main')
@section('content')
    <div class="row">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-primary">
                        Buat Genre
                    </h4>
                </div>
                <div class="card-body">

                    <form method="POST" action="/master/data-genre" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="judul">Nama</label>
                            <input class="form-control @error('nama') is-invalid @enderror" id="nama" type="text"
                                name="nama" value="{{ old('nama') }}" required>
                            @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="slug">Slug</label>
                            <input class="form-control @error('slug') is-invalid @enderror" id="slug" type="text"
                                name="slug" value="{{ old('slug') }}" required>
                            @error('slug')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="imageFile" class="form-label">Genre Image</label>
                            <img class="imgPreview img-fluid col-sm-5 d-block mb-3">
                            <input type="file" class="form-control @error('image') is-invalid @enderror" name="image"
                                id="imageFile" onchange="tampilImage()">
                            @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-4 mt-5">
                            <button type="reset" class="btn btn-warning">Reset</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        const nama = document.querySelector('#nama');
        const slug = document.querySelector('#slug');

        nama.addEventListener('change', function() {
            fetch('/master/data-genre/addSlug?nama=' + nama.value)
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
            // console.log(image.value);
        }
    </script>
@endsection
