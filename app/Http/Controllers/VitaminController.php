<?php

namespace App\Http\Controllers;

use App\Models\Vitamin;
use Illuminate\Http\Request;

class VitaminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Vitamin::all();
        return view('vitamin.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vitamin.create');
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
            'jenis_vitamin' => 'required',
            'keterangan' => 'required'
        ]);

        Vitamin::create($data);
        return redirect('/dashboard/vitamin')->with('success', 'Daftar Jenis Vitamin Berhasil di Tambahkan');
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
        $data = Vitamin::findOrFail($id);
        return view('vitamin.edit', compact('data'));
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
            'jenis_vitamin' => 'required',
            'keterangan' => 'required'
        ]);

        $item = Vitamin::findOrFail($id);

        $item->update($data);
        return redirect('/dashboard/vitamin')->with('info', 'Daftar Jenis Vitamin Berhasil di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Vitamin::findOrFail($id);

        $item->delete();

        return redirect('/dashboard/vitamin')->with('danger', 'Daftar Jenis Vitamin Berhasil di Hapus');;
    }
}
