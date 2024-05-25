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
            <h5 class="m-0"><i class="fas fa-table"></i> Daftar Supplier</h5>
        </div>
        <a href="/supplier/create" class="btn btn-dark rounded-0"><i class="fas fa-truck"></i> Tambah Data Supplier</a>
    </div>
    <div class="card-body">
        <table class="table table-striped w-100" id="myTable">
            <thead>
                <tr class="bg-dark text-light" style="height: 40px; line-height: 40px;">
                    <th class="text-start">No</th>
                    <th>Nama Supplier</th>
                    <th class="text-start">Nomor HP</th>
                    <th>Alamat</th>
                    <th class="text-center" width="200">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($suppliers as $i => $sup )
                    <tr>
                        <td class="text-start">{{ $i + 1 }}</td>
                        <td>{{ $sup->nama }}</td>
                        <td class="text-start">{{ $sup->no_hp }}</td>
                        <td>{{ $sup->alamat }}</td>
                        <td>
                            <div class="d-flex justify-content-center">
                                <a href="/supplier/edit/{{ $sup->id }}" class="btn btn-primary btn-sm rounded-0 me-2"><i class="fas fa-edit"></i> Edit</a>
                                <form action="/supplier" method="post">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="id" value="{{ $sup->id }}">
                                    <button type="submit" class="btn btn-danger btn-sm rounded-0" onclick="return confirm('Yakin data supplier ini akan dihapus?')">
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
