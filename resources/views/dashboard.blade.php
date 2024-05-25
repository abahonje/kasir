@extends('layouts.template')

@section('content')
<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card bg-primary text-white mb-4 position-relative shadow border-0">
            <div class="card-body">
                <span>Supplier</span>
                <h1>3</h1>
            </div>
            <i class="fas fa-truck position-absolute card-icon opacity-50"></i>
            <div class="card-footer d-flex align-items-center justify-content-center">
                <a class="small text-white text-decoration-none" href="/supplier">Selengkapnya</a>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-success text-white mb-4 position-relative shadow border-0">
            <div class="card-body">
                <span>Barang</span>
                <h1>10</h1>
            </div>
            <i class="fas fa-database position-absolute card-icon opacity-50"></i>
            <div class="card-footer d-flex align-items-center justify-content-center">
                <a class="small text-white text-decoration-none" href="/barang">Selengkapnya</a>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-warning text-white mb-4 position-relative shadow border-0">
            <div class="card-body">
                <span>User</span>
                <h1>3</h1>
            </div>
            <i class="fas fa-user position-absolute card-icon opacity-50"></i>
            <div class="card-footer d-flex align-items-center justify-content-center">
                <a class="small text-white text-decoration-none" href="/user">Selengkapnya</a>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-danger text-white mb-4 position-relative shadow border-0">
            <div class="card-body">
                <span>Transaksi Penjualan</span>
                <h1>20</h1>
            </div>
            <i class="fas fa-chart-area position-absolute card-icon opacity-50"></i>
            <div class="card-footer d-flex align-items-center justify-content-center">
                <a class="small text-white text-decoration-none" href="/penjualan">Selengkapnya</a>
            </div>
        </div>
    </div>
</div>
@endsection
