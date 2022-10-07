{{-- <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#profileModal">Large</button> --}}
<div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">User Profile</h5>
            </div>
            <div class="modal-body">
                <div class="container-xl px-4 mt-4">
                    <div class="row">
                        <div class="col-xl-4">
                            <!-- Profile picture card-->
                            <div class="card mb-4 mb-xl-0">
                                <div class="card-header">Foto Profile</div>
                                <div class="card-body text-center">
                                    <form action="/users/image/{{ auth()->user()->id }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <!-- Profile picture image-->
                                        @if (auth()->user()->image)
                                            @if (auth()->user()->image)
                                                <img class="imgPreview img-profile mb-2"
                                                    src="{{ asset('storage/' . auth()->user()->image) }}"
                                                    width="170">
                                            @else
                                                <img class="imgPreview img-profile mb-2"
                                                    src="{{ asset('storage/profileImages/default.jpg') }}"
                                                    width="170">
                                            @endif
                                        @else
                                            <img class="imgPreview img-fluid col-sm-5 d-block mb-3" width="170">
                                        @endif

                                        <div class="input-group mb-3">
                                            <input class="form-control @error('image') is-invalid @enderror"
                                                name="image" type="file" id="imageFile" onchange="tampilImage()">
                                            @error('image')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <!-- Profile picture help block-->
                                        <div class="small font-italic text-muted mb-4">JPG, PNG, JPEG tidak lebih 2 MB
                                        </div>
                                        <!-- Profile picture upload button-->
                                        <button class="btn btn-primary" type="submit">Ubah Gambar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8">
                            <!-- Account details card-->
                            <div class="card mb-4">
                                <div class="card-header">User Details</div>
                                <div class="card-body">
                                    <form method="POST" action="/users/{{ auth()->user()->id }}">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="small mb-1" for="nama">Nama</label>
                                            <input class="form-control @error('name') is-invalid @enderror"
                                                id="nama" name="name" type="text" placeholder="Masukkan nama"
                                                value="{{ auth()->user()->name }}" required />
                                            @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="small mb-1" for="email">Email</label>
                                            <input class="form-control" id="email" type="email"
                                                value="{{ auth()->user()->email }}" disabled readonly />
                                        </div>

                                        <div class="mb-3">
                                            <label class="small mb-1" for="username">Username</label>
                                            <input class="form-control" id="username" type="text"
                                                value="{{ auth()->user()->username }}" disabled readonly />
                                        </div>
                                        <!-- Submit button-->
                                        <button class="btn btn-primary" type="submit">Simpan Perubahan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer"><button class="btn btn-primary" type="button" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
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
