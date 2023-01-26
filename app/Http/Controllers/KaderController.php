<?php

namespace App\Http\Controllers;

use App\Models\Kader;
use Illuminate\Http\Request;

class KaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Kader::all();
        return view('kader.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kader.create');
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
            'nama' => 'required',
            'alamat' => 'required',
            'umur' => 'required|numeric',
            'jabatan' => 'required',
            'status' => 'required'
        ]);

        Kader::create($data);
        return redirect('/dashboard/kader')->with('success', 'Data Kader Berhasil di Tambahkan');
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
        $data = Kader::findOrFail($id);

        return view('kader.edit', compact('data'));
            
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
            'nama' => 'required',
            'alamat' => 'required',
            'umur' => 'required|numeric',
            'jabatan' => 'required',
            'status' => 'required'
        ]);

        $item = Kader::findOrFail($id);

        $item->update($data);
        return redirect('/dashboard/kader')->with('info', 'Daftar Jenis Kader Berhasil di Ubah');;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Kader::findOrFail($id);

        $item->delete();

        return redirect('/dashboard/kader')->with('danger', 'Daftar Jenis Kader Berhasil di Hapus');;
    }
}
