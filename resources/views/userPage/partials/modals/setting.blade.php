<div class="modal fade" id="settingModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ganti Password</h5>
            </div>
            <div class="modal-body">
                <div class="container-xl px-4 mt-4">
                    <div class="row">
                        <div class="col-xl-10 mx-auto">
                            <!-- Account details card-->
                            <div class="card mb-4">
                                <div class="card-header">User Password</div>
                                <div class="card-body">
                                    <form method="POST" action="/users/password/{{ auth()->user()->id }}">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="small mb-1" for="old_pass">Password Lama</label>
                                            <input class="form-control @error('old_pass') is-invalid @enderror"
                                                id="old_pass" name="old_pass" type="password"
                                                placeholder="Masukkan Password Lama" />
                                            @error('old_pass')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="small mb-1" for="new_pass">Password Baru</label>
                                            <input class="form-control @error('new_pass') is-invalid @enderror"
                                                id="new_pass" name="new_pass" type="password"
                                                placeholder="Masukkan Password Baru" />
                                            @error('new_pass')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="small mb-1" for="konf_pass">Konfirmasi Password Baru</label>
                                            <input class="form-control @error('konf_pass') is-invalid @enderror"
                                                id="konf_pass" name="konf_pass" type="password"
                                                placeholder="Konfirmasi Password" />
                                            @error('konf_pass')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
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
