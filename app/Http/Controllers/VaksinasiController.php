<?php

namespace App\Http\Controllers;

use App\Models\Vaksinasi;
use Illuminate\Http\Request;

class VaksinasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Vaksinasi::all();
        return view('vaksinasi.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vaksinasi.create');
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
            'jenis_vaksin' => 'required',
            'keterangan' => 'required'
        ]);

        Vaksinasi::create($data);
        return redirect('/dashboard/vaksinasi')->with('success', 'Daftar Jenis Vaksinasi Berhasil di Tambahkan');
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
        $data = Vaksinasi::findOrFail($id);
        return view('vaksinasi.edit', compact('data'));
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
            'jenis_vaksin' => 'required',
            'keterangan' => 'required'
        ]);

        $item = Vaksinasi::findOrFail($id);

        $item->update($data);
        return redirect('/dashboard/vaksinasi')->with('Info', 'Daftar Jenis Vaksinasi Berhasil di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Vaksinasi::findOrFail($id);

        $item->delete();

        return redirect('/dashboard/vaksinasi')->with('danger', 'Daftar Jenis Vaksinasi Berhasil di Hapus');;
    }
}
