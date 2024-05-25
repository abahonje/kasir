<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'title' => 'Data Supplier',
            'suppliers' => Supplier::all(),
        ];

        return view('suppliers.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'title' => 'Data Supplier',
        ];

        return view('suppliers.tambah', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
        ], [
            'nama' => 'Nama supplier harus diisi',
            'no_hp' => 'Nomor HP harus diisi',
            'alamat' => 'Alamat lengkap harus diisi',
        ]);

        $validatedData['user_id'] = auth()->user()->id;

        Supplier::create($validatedData);
        return redirect('/supplier')->with('info', 'Data supplier baru berhasil ditambahkan ke dalam database');
    }

    /**
     * Display the specified resource.
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supplier $supplier)
    {
        $data = [
            'title' => 'Data Supplier',
            'supplier' => $supplier
        ];

        return view('suppliers.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
        ], [
            'nama' => 'Nama supplier harus diisi',
            'no_hp' => 'Nomor HP harus diisi',
            'alamat' => 'Alamat lengkap harus diisi',
        ]);

        $validatedData['user_id'] = auth()->user()->id;

        Supplier::where('id', $request->id)->update($validatedData);
        return redirect('/supplier')->with('info', 'Data supplier berhasil diupdate di dalam database');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $supplier = Supplier::find($request->id);
        $supplier->forceDelete();

        return redirect('/supplier')->with('info', 'Data supplier berhasil dihapus di dalam database');
    }
}
