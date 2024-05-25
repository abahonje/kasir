@extends('layouts.template')

@section('content')
<div class="card p-4 shadow border-0 mb-4">
    <div class="card-header">
        <h5><i class="fas fa-file"></i> Form Tambah Data Supplier</h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-8">
                <form action="/supplier" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="mb-3 row">
                        <label for="nama" class="col-3">Nama Supplier</label>
                        <div class="col-9">
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}">
                            @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="no_hp" class="col-3">Nomor HP</label>
                        <div class="col-9">
                            <input type="text" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" value="{{ old('no_hp') }}">
                            @error('no_hp')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-4 row">
                        <label for="alamat" class="col-3">Alamat Lengkap</label>
                        <div class="col-9">
                            <textarea name="alamat" id="alamat" class="form-control @error('alamat') is-invalid @enderror" rows="5">{{ old('alamat') }}</textarea>
                            @error('alamat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <button class="btn btn-success rounded-0 px-4"><i class="fas fa-save"></i> Simpan</button>
                        <a href="/supplier" class="btn btn-warning rounded-0"><i class="fas fa-undo"></i> Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
