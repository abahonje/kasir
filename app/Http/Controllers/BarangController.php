<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Jenis;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'title' => 'Data Barang',
            'barang' => Barang::all()
        ];

        return view('barang.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'title' => 'Data Barang',
            'jenis' => Jenis::all()
        ];

        return view('barang.tambah', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_barang' => 'required',
            'jenis_id' => 'required',
            'harga' => 'required',
            'ukuran' => 'required',
            'stok' => 'required',
            'deskripsi' => 'required',
            'photo' => 'nullable|image'
        ], [
            'nama_barang' => 'Nama barang harus diisi',
            'jenis_id' => 'Jenis barang harus dipilih',
            'harga' => 'Harga barang harus diisi',
            'ukuran' => 'Ukuran barang harus diisi',
            'stok' => 'Stok barang harus diisi',
            'deskripsi' => 'Deskripsi barang harus diisi',
            'photo' => 'Photo harus merupakan gambar',
        ]);

        if($request->file('photo')){
            $filename = $request->file('photo')->hashName();
            $request->file('photo')->storeAs('produk', $filename);
            $validatedData['photo'] = $filename;
        }

        $validatedData['user_id'] = auth()->user()->id;

        Barang::create($validatedData);
        return redirect('/barang')->with('info', 'Data barang baru berhasil ditambahkan ke dalam database');



    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $barang = Barang::find($request->id);
        return $barang->toJson();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barang $barang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Barang $barang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barang $barang)
    {
        //
    }
}
