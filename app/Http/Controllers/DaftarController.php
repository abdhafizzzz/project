<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DaftarController extends Controller
{
    public function index()
    {
        return view('daftar');
    }

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    // public function create()
    // {
    //     $daerahList = DB::table('daerah')->pluck('value', 'name');

    //     return view('daftar', compact('daerahList'));
    // }

    // public function store(Request $request)
    // {
    //     $loggedUser = Auth::user();
    //     // dd('store method reached');//to check if function called correctly
    //     $data = $request->validate([
    //         'pemohon' => 'required',
    //         'nokp' => 'required',
    //         'alamat' => 'required',
    //         'poskod' => 'required',
    //         'daerah' => 'required',
    //         'notel' => 'required',
    //         'nohp' => 'required',
    //         'nokad' => 'required',
    //         'tahunpohon' => 'required',
    //         'rd_daftar' => 'required',
    //         'ch_musim' => 'nullable',
    //         'ch_musim2' => 'nullable',
    //         'tarikh' => 'required',
    //     ]);
    //     // dd($data);//debug

    //     // Create a new record in the 'daftar' table
    //         DB::table('daftar')->insert([
    //         'pemohon' => $data['pemohon'],
    //         'nokp' => $data['nokp'],
    //         'alamat' => $data['alamat'],
    //         'poskod' => $data['poskod'],
    //         'daerah' => $data['daerah'],
    //         'notel' => $data['notel'],
    //         'nohp' => $data['nohp'],
    //         'nokad' => $data['nokad'],
    //         'tahunpohon' => $data['tahunpohon'],
    //         'rd_daftar' => $data['rd_daftar'],
    //         'ch_musim' => $data['ch_musim'],
    //         'ch_musim2' => $data['ch_musim2'],
    //         'tarikh' => $data['tarikh'],
    //     ]);
    //     // dd('Data has been saved successfully.');

    //     // Redirect or perform any other operations
    //     return redirect()->back()->with('success', 'Data has been saved successfully.');
    // }

    public function store(Request $request)
{
    DB::table('daftar')->insert([
        'pemohon' => $request->pemohon,
        'nokp' => $request->nokp,
        'alamat' => $request->alamat,
        'poskod' => $request->poskod,
        'daerah_id' => $request->daerah_id,
        'notel' => $request->notel,
        'nohp' => $request->nohp,
        'nokad' => $request->nokad,
        'tahunpohon' => $request->tahunpohon,
        'rd_daftar' => $request->rd_daftar,
        'ch_musim' => $request->ch_musim ? 1 : 0,
        'ch_musim2' => $request->ch_musim2 ? 1 : 0,
        'tarikh' => $request->tarikh,
        'created_at' => now(),
        'updated_at' => now()
    ]);

    return redirect('/daftar')->with('success', 'Data berhasil disimpan!');
}
}

