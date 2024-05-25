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
                    <th class="text-center" width="250">Aksi</th>
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
                                <button class="btn btn-info btn-sm me-2 rounded-0 btnDetail" data-bs-toggle="modal" data-bs-target="#barangModal" data-id={{ $brg->id }}><i class="fa-solid fa-circle-info"></i> Detail</button>
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

{{-- Modal --}}
<div class="modal fade" id="barangModal" tabindex="-1" aria-labelledby="barangModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <form action="/jenis" method="post">
            <div class="modal-content">
                <div class="modal-header bg-dark text-light">
                <h1 class="modal-title fs-5" id="barangModalLabel">
                    <i class="fas fa-circle-info"></i> Detail Barang
                </h1>
                </div>
                <div class="modal-body">
                    <div class="row w-100">
                        <div class="col-4">
                            <img src="" class="img-detail" style="height: 200px; width: 200px; object-fit: cover">
                        </div>
                        <div class="col-8 ps-4">
                            <h2>Sendal Sepatu Keren Loh</h2>
                            <h5>Harga : Rp. <span class="rupiah">250.000</span>,-</h5>
                            <h5>Stok : <span class="stok">10</span> pasang</h5>
                            <p class="lead">Sepatu Murah Nike Zoom Flyknit Airmax Sneakers Sport Men Abu Hitam - Sepatu Olahraga Pria Running Jogging Gym Stylist Fashion Best Seller</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
  </div>
@endsection



@section('script')
    <script>
        function rupiah(value){
            var	number_string = value.toString(),
                sisa 	= number_string.length % 3,
                rupiah 	= number_string.substr(0, sisa),
                ribuan 	= number_string.substr(sisa).match(/\d{3}/g);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            return rupiah;
        }

        new DataTable('#myTable', {
            info: false,
        });

        $('.btnDetail').on('click', function(){
            const id = $(this).data('id');
            $.ajax({
                url: 'http://127.0.0.1:8000/getbarang',
                method: 'post',
                data: {id: id},
                dataType: 'json',
                success: function(data){
                    $('.modal-body .img-detail').attr('src', '/storage/produk/' + data.photo);
                    $('.modal-body h2').html(data.nama_barang);
                    $('.modal-body h5 .rupiah').html(rupiah(data.harga));
                    $('.modal-body h5 .stok').html(data.stok);
                    $('.modal-body p').html(data.deskripsi);
                }
            })

        })
    </script>
@endsection
