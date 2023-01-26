<?php

namespace App\Http\Controllers;

use App\Models\Dokumentasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DokumentasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Dokumentasi::all();
        return view('dokumentasi.index', compact('data')
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dokumentasi.create');
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
            'body'=> 'required',
            'image'=>'image|file|max:1024'
        ]);

        if($request->file('image')){
            $data['image'] = $request->file('image')->store('dokumentasi-images');
        }

        Dokumentasi::create($data);
        return redirect('/dashboard/dokumentasi')->with('success', 'Dokumentasi Berhasil Di Tambahkan');
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
        $data = Dokumentasi::findOrFail($id);
        return view('dokumentasi.edit', compact('data'));
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
            'body'=> 'required',
            'image'=>'image|file|max:1024'
        ]);

        $item = Dokumentasi::findOrFail($id);

        if($request->file('image')){
            if($request->oldImage){
                    Storage::delete($request->oldImage);
                }
            $data['image'] = $request->file('image')->store('dokumentasi-images');
        }

        $item->update($data);
        return redirect('/dashboard/dokumentasi')->with('info', 'Dokumentasi Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dokumentasi $dokumentasi)
    {
        if($dokumentasi->image){
            Storage::delete($dokumentasi->image);
        }

        Dokumentasi::destroy($dokumentasi->id);

        return redirect('/dashboard/dokumentasi')->with('danger', 'Dokumentasi Berhasil Di Hapus');
    }
}
