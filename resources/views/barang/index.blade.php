@extends('layouts.template')


@section('content')
@if (session('info'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        {{ session('info') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<div class="card shadow">
    <div class="card-header d-flex justify-content-between align-items-center">
        <div class="card-title">
            <h5 class="m-0"><i class="fas fa-table"></i> Daftar Barang</h5>
        </div>
        <a href="/barang/create" class="btn btn-dark rounded-0"><i class="fas fa-database"></i> Tambah Data Barang</a>
    </div>
    <div class="card-body">
        <table class="table table-striped w-100" id="myTable">
            <thead>
                <tr class="bg-dark text-light" style="height: 40px; line-height: 40px;">
                    <th class="text-start">No</th>
                    <th>Nama Barang</th>
                    <th class="text-start">Ukuran</th>
                    <th class="text-start">Harga</th>
                    <th class="text-start">Stok</th>
                    <th class="text-center" width="200">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($barang as $i => $brg )
                    <tr>
                        <td class="text-start">{{ $i + 1 }}</td>
                        <td>{{ $brg->nama_barang }}</td>
                        <td class="text-start">{{ $brg->ukuran }}</td>
                        <td class="text-start">{{ $brg->harga }}</td>
                        <td class="text-start">{{ $brg->stok }}</td>
                        <td>
                            <div class="d-flex justify-content-center">
                                <a href="/barang/edit/{{ $brg->id }}" class="btn btn-primary btn-sm rounded-0 me-2"><i class="fas fa-edit"></i> Edit</a>
                                <form action="/barang" method="post">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="id" value="{{ $brg->id }}">
                                    <button type="submit" class="btn btn-danger btn-sm rounded-0" onclick="return confirm('Yakin data barang ini akan dihapus?')">
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
    </script>
@endsection
