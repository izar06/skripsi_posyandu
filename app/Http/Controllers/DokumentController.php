<?php

namespace App\Http\Controllers;

use App\Models\Dokument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DokumentController extends Controller
{
    public function index()
    {
        $data = Dokument::all();
        return view('dokumen.index', compact('data'));
    }

    public function create()
    {
        return view('dokumen.create');
    }

    public function store(Request $request)
    {
        $data = new Dokument();
        $file = $request->file;
        $filename = time().'.'.$file->getClientOriginalExtension();
        $request->file->move('assets', $filename);

        $data->file=$filename;
        $data->nama = $request->nama;
        $data->deskripsi = $request->deskripsi;

        $data->save();
        return redirect('/dashboard/dokumen')->with('success', 'File Sudah Berhasil Di Tambahkan');
    }

    public function download(Request $request, $file)
    {
        return response()->download(public_path('assets/'. $file));
    }

    public function view($id)
    {
        $data = Dokument::find($id);
 
        return view('dokumen.view',compact('data'));
 
    }
 
 
}
