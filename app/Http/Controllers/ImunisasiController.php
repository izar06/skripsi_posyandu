<?php

namespace App\Http\Controllers;

use App\Models\Imunisasi;
use Illuminate\Http\Request;

class ImunisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Imunisasi::all();
        return view('imunisasi.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('imunisasi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'jenis_imunisasi' => 'required',
            'keterangan' => 'required'
        ]);

        Imunisasi::create($data);
        return redirect('/dashboard/imunisasi')->with('success', 'Daftar Jenis Imunisasi Berhasil di Tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Imunisasi::findOrFail($id);
        return view('imunisasi.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'jenis_imunisasi' => 'required',
            'keterangan' => 'required'
        ]);

        $item = Imunisasi::findOrFail($id);

        $item->update($data);
        return redirect('/dashboard/imunisasi')->with('info', 'Daftar Jenis Imunisasi Berhasil di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Imunisasi::findOrFail($id);

        $item->delete();

        return redirect('/dashboard/imunisasi')->with('danger', 'Daftar Jenis Imunisasi Berhasil di Hapus');;
    }
}
