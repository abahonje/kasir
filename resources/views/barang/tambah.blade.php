@extends('layouts.template')

@section('content')
<div class="card p-4 shadow border-0 mb-4">
    <div class="card-header">
        <h5><i class="fas fa-file"></i> Form Tambah Data Barang</h5>
    </div>
    <div class="card-body">
        <form action="/barang" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-7">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="mb-3 row">
                        <label for="nama_barang" class="col-3 form-label">Nama Barang</label>
                        <div class="col-9">
                            <input type="text" class="form-control @error('nama_barang') is-invalid @enderror" name="nama_barang" value="{{ old('nama_barang') }}">
                            @error('nama_barang')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="jenis_id" class="col-3 form-label">Jenis Barang</label>
                        <div class="col-9">
                            <select class="form-control @error('jenis_id') is-invalid @enderror js-example-basic-single" name="jenis_id" style="height: 50px !important">
                                <option value="">Pilih Jenis</option>
                                @foreach ($jenis as $jns)
                                    <option value="{{ $jns->id }}">{{ $jns->jenis }}</option>
                                @endforeach
                            </select>
                            @error('jenis_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="harga" class="col-3 form-label">Harga</label>
                        <div class="col-9">
                            <input type="text" class="form-control @error('harga') is-invalid @enderror" name="harga" value="{{ old('harga') }}">
                            @error('harga')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="ukuran" class="col-3 form-label">Ukuran</label>
                        <div class="col-9">
                            <input type="text" class="form-control @error('ukuran') is-invalid @enderror" name="ukuran" value="{{ old('ukuran') }}">
                            @error('ukuran')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="stok" class="col-3 form-label">Stok</label>
                        <div class="col-9">
                            <input type="text" class="form-control @error('stok') is-invalid @enderror" name="stok" value="{{ old('stok') }}">
                            @error('stok')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="deskripsi" class="col-3 form-label">Deskripsi</label>
                        <div class="col-9">
                            <textarea type="text" class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" rows="5">{{ old('deskripsi') }}</textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <button class="btn btn-success rounded-0 px-4"><i class="fas fa-save"></i> Simpan</button>
                        <a href="/barang" class="btn btn-warning rounded-0"><i class="fas fa-undo"></i> Cancel</a>
                    </div>
                </div>
                <div class="col-5 pt-5">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-8 text-center">
                            <h4>Upload Photo</h4>
                            <img src="/img/upload.jpg" class="img-preview cursor-pointer" style="height: 250px; width: 250px; object-fit:cover" role="button">
                        </div>
                    </div>
                    <input class="form-control @error('photo') is-invalid @enderror" type="file" name="photo" id="photo" onchange="previewImg()" hidden>
                    @error('photo')
                        <div class="invalid-feedback text-center">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });

    $('.img-preview').on('click', function(){
        $('#photo').click();
    })

    function previewImg() {
            const gambar = document.querySelector('#photo');
            const imgPreview = document.querySelector('.img-preview');
            const fileGambar = new FileReader();
            fileGambar.readAsDataURL(gambar.files[0]);
            fileGambar.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        }
</script>
@endsection
