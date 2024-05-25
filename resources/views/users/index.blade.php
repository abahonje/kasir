@extends('layouts.template')


@section('content')
@if (session('info'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        {{ session('info') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<div class="card p-3 shadow">
    <div class="card-header d-flex justify-content-between align-items-center">
        <div class="card-title">
            <h5 class="m-0"><i class="fas fa-table"></i> Daftar User</h5>
        </div>
        <a href="/user/create" class="btn btn-dark rounded-0"><i class="fas fa-user-plus"></i> Tambah Data User</a>
    </div>
    <div class="card-body">
        <table class="table table-hoverable table-striped w-100">
            <thead>
                <tr class="bg-dark text-light" style="height: 40px; line-height: 40px">
                    <th>No</th>
                    <th>Nama Lengkap</th>
                    <th>Username</th>
                    <th>Level</th>
                    <th>Status</th>
                    <th class="text-center" width="200">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $i => $us)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td>{{ $us->nama_lengkap }}</td>
                        <td>{{ $us->username }}</td>
                        <td>{{ $us->level }}</td>
                        <td>{{ $us->status }}</td>
                        <td>
                            <div class="d-flex justify-content-center">
                                <a href="/user/edit/{{ $us->id }}" class="btn btn-primary btn-sm rounded-0 me-2"><i class="fas fa-edit"></i> Edit</a>
                                <form action="/user" method="post">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="id" value="{{ $us->id }}">
                                    <button type="submit" class="btn btn-danger btn-sm rounded-0" onclick="return confirm('Yakin data user ini akan dihapus?')">
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
