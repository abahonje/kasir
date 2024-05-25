@extends('layouts.template')

@section('content')
<div class="card p-4 shadow border-0 mb-4">
    <div class="card-header">
        <h5><i class="fas fa-file"></i> Form Tambah Data User</h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-8">
                <form action="/user" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="mb-3 row">
                        <label for="nama_lengkap" class="col-3">Nama Lengkap</label>
                        <div class="col-9">
                            <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" name="nama_lengkap" value="{{ old('nama_lengkap') }}">
                            @error('nama_lengkap')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="username" class="col-3">Username</label>
                        <div class="col-9">
                            <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}">
                            @error('username')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-4 row">
                        <label for="level" class="col-3">Level</label>
                        <div class="col-9">
                            <input type="text" class="form-control text-muted bg-light" name="level" value="kasir" readonly>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <button class="btn btn-success rounded-0 px-4"><i class="fas fa-save"></i> Simpan</button>
                        <a href="/user" class="btn btn-warning rounded-0"><i class="fas fa-undo"></i> Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
