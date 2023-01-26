<?php

namespace App\Http\Controllers;

use App\Models\Balita;
use Illuminate\Http\Request;

class BalitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Balita::all();
        return view('balita.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('balita.create');
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
            'nama_balita' => 'required',
            'nama_ibu' => 'required',
            'umur' => 'required|numeric',
            'jenis_kelamin' =>'required',
            'tgl_lahir' =>'required',
            'alamat' => 'required',
        ]);

        Balita::create($data);
        return redirect('/dashboard/balita')->with('success', 'Data Balita Berhasil di Tambahkan');
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
        $data = Balita::findOrFail($id);
        return view('balita.edit', compact('data'));
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
            'nama_balita' => 'required',
            'nama_ibu' => 'required',
            'umur' => 'required|numeric',
            'jenis_kelamin' =>'required',
            'tgl_lahir' =>'required',
            'alamat' => 'required',
        ]);

        $item = Balita::findOrFail($id);

        $item->update($data);
        return redirect('/dashboard/balita')->with('info', 'Data Balita Berhasil di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Balita::findOrFail($id);

        $item->delete();

        return redirect('/dashboard/balita')->with('Danger', 'Data Balita Berhasil di Hapus');
    }
}
