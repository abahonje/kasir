@extends('layouts.template')


@section('content')
@if (session('info'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        {{ session('info') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <ul>
            @foreach($errors->all() as $message)
                <li class="m-0">{{ $message }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<div class="card shadow" data-error={{ $errors->any() ? true : false }}>
    <div class="card-header d-flex justify-content-between align-items-center">
        <div class="card-title">
            <h5 class="m-0"><i class="fas fa-table"></i> Daftar Jenis Barang</h5>
        </div>
        <button type="button" class="btn btn-dark rounded-0 btnTambahJenis" data-bs-toggle="modal" data-bs-target="#jenisModal"><i class="fas fa-truck"></i> Tambah Data Jenis</button>
    </div>
    <div class="card-body">
        <table class="table table-striped w-100" id="myTable">
            <thead>
                <tr class="bg-dark text-light" style="height: 40px; line-height: 40px;">
                    <th class="text-start">No</th>
                    <th>Kode</th>
                    <th class="text-start">Jenis Barang</th>
                    <th class="text-center" width="200">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jenis as $i => $jen )
                    <tr>
                        <td class="text-start">{{ $i + 1 }}</td>
                        <td>{{ $jen->kode }}</td>
                        <td class="text-start">{{ $jen->jenis }}</td>
                        <td>
                            <div class="d-flex justify-content-center">
                                <button type="button" class="btn btn-primary btn-sm rounded-0 me-2 btnEditJenis" data-bs-toggle="modal" data-bs-target="#jenisModal" data-id={{ $jen->id }}><i class="fas fa-edit"></i> Edit</button>
                                <form action="/jenis" method="post">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="id" value="{{ $jen->id }}">
                                    <button type="submit" class="btn btn-danger btn-sm rounded-0" onclick="return confirm('Yakin data jenis barang ini akan dihapus?')">
                                        <i class="fas fa-trash-alt"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


{{-- Modal --}}
<div class="modal fade" id="jenisModal" tabindex="-1" aria-labelledby="jenisModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="/jenis" method="post">
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="jenisModalLabel">
                    <i class="fas fa-file"></i> Form Tambah Data Jenis Barang
                </h1>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id" id="jenis_id">
                    <div class="mb-3 row">
                        <label for="kode" class="form-label col-3">Kode Jenis</label>
                        <div class="col-9">
                            <input type="text" class="form-control" name="kode" id="kode">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="jenis" class="form-label col-3">Jenis Barang</label>
                        <div class="col-9">
                            <input type="text" class="form-control" name="jenis" id="jenis">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
  </div>
@endsection


@section('script')
    <script>
        new DataTable('#myTable', {
            info: false,
            // ordering: true,
            // paging: true
            // layout: {
            //     topStart: {
            //         buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
            //     }
            // }
        });

        $('#jenisModal').on('hidden.bs.modal', function(){
            $('#kode').removeClass('is-invalid');
            $('#jenis').removeClass('is-invalid');
            $('#kode').val('');
            $('#jenis').val('');
        })

        $('.btnEditJenis').on('click', function(){
            const id = $(this).data('id');
            $.ajax({
                url: 'http://127.0.0.1:8000/getjenis',
                data: {id: id},
                dataType: 'json',
                method: 'post',
                success: function(data){
                    $('#kode').val(data.kode);
                    $('#jenis').val(data.jenis);
                    $('#jenis_id').val(data.id);
                    $('#jenisModal .modal-title').html('<i class="fas fa-file-edit"></i> Form Edit Data Jenis Barang');
                    $('#jenisModal button[type=submit]').html('Edit');
                    $('#jenisModal button[type=submit]').addClass('px-4');
                    $('#jenisModal form').attr('action', '/jenis/' + data.id);
                }
            })
        })
        $('.btnTambahJenis').on('click', function(){
            $('#jenisModal button[type=submit]').html('Simpan');
            $('#jenisModal button[type=submit]').addClass('px-4');
            $('#kode').val('');
            $('#jenis').val('');
            $('#jenisModal .modal-title').html('<i class="fas fa-file"></i> Form Tambah Data Jenis Barang');
            $('#jenisModal form').attr('action', '/jenis');
        })

    </script>
@endsection
