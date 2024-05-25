<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use Illuminate\Http\Request;

class JenisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'title' => 'Data Jenis Barang',
            'jenis' => Jenis::all()
        ];

        return view('jenis.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kode' => 'required|unique:jenis,kode',
            'jenis' => 'required'
        ],[
            'kode.required' => 'Kode jenis harus diisi',
            'kode.unique' => 'Kode jenis sudah ada di dalam database',
            'jenis' => 'Nama jenis barang harus diisi',
        ]);

        $validatedData['user_id'] = auth()->user()->id;

        Jenis::create($validatedData);
        return redirect('/jenis')->with('info', 'Data jenis barang baru berhasil ditambahkan ke dalam database')->withInput();
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $jenis = Jenis::where('id', $request->id)->first();
        return $jenis->toJson();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jenis $jenis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jenis $jenis)
    {
        $validatedData = $request->validate([
            'kode' => 'required|unique:jenis,kode,' . $request->id,
            'jenis' => 'required'
        ],[
            'kode.required' => 'Kode jenis harus diisi',
            'kode.unique' => 'Kode jenis sudah ada di dalam database',
            'jenis' => 'Nama jenis barang harus diisi',
        ]);

        $validatedData['user_id'] = auth()->user()->id;

        Jenis::where('id', $request->id)->update($validatedData);
        return redirect('/jenis')->with('info', 'Data jenis barang berhasil diupdate di dalam database');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $jenis = Jenis::find($request->id);
        $jenis->forceDelete();

        return redirect('/jenis')->with('info', 'Data jenis barang berhasil dihapus di dalam database');
    }
}
