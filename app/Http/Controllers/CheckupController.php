<?php

namespace App\Http\Controllers;

use App\Models\Balita;
use App\Models\Checkup;
use App\Models\Imunisasi;
use App\Models\Vitamin;
use Illuminate\Http\Request;

class CheckupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Checkup::with(['balita', 'vitamin', 'imunisasi'])->get();

        return view('checkup.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $balita = Balita::all();
        $vitamin = Vitamin::all();
        $imunisasi = Imunisasi::all();
        return view('checkup.create', compact('balita', 'vitamin', 'imunisasi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vitamin = Vitamin::firstwhere('id', $request->vitamin_id);

        $balita = Balita::firstwhere('id', $request->balita_id);
        
        if($balita->umur > $vitamin->maksimal_umur_pengguna){
            return redirect()->back()->with('error', 'Vitamin Tidak Sesuai Umur Balita');
        }

        $data = $request->validate([
            'balita_id' => 'required',
            'berat_badan' => 'required',
            'vitamin_id' => 'required',
            'imunisasi_id' =>'required',
            'status_gizi' =>'required',
            'checkup_ke' => 'required',
        ]);

        Checkup::create($data);
        return redirect('/dashboard/checkup')->with('success', 'Data Checkup Balita Berhasil di Tambahkan');
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
        $data = Checkup::findOrFail($id);
        $balita = Balita::all();
        $vitamin = Vitamin::all();
        $imunisasi = Imunisasi::all();
        return view('checkup.edit', compact('data', 'balita', 'vitamin', 'imunisasi'));
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
            'balita_id' => 'required',
            'berat_badan' => 'required',
            'vitamin_id' => 'required|numeric',
            'imunisasi_id' =>'required',
            'status_gizi' =>'required',
            'checkup_ke' => 'required',
        ]);

        $item = Checkup::findOrFail($id);

        $item->update($data);
        return redirect('/dashboard/checkup')->with('info', 'Data Checkup Balita Berhasil di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Checkup::findOrFail($id);

        $item->delete();

        return redirect('/dashboard/checkup')->with('danger', 'Data Checkup Balita Berhasil di Hapus');
    }
}
