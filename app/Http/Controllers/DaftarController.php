<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DaftarController extends Controller
{
    public function index()
    {
        return view('daftar');
    }

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $daerahList = DB::table('daerah')->pluck('value', 'name');

        return view('daftar', compact('daerahList'));
    }

    public function store(Request $request)
{
    $data = $request->validate([
        'pemohon' => 'required',
        'nokp' => 'required',
        'alamat' => 'required',
        'poskod' => 'required',
        'daerah' => 'required',
        'notel' => 'required',
        'nohp' => 'required',
        'nokad' => 'required',
        'tahunpohon' => 'required',
        'rd_daftar' => 'required',
        'ch_musim' => 'nullable',
        'ch_musim2' => 'nullable',
        'tarikh' => 'required',
    ]);

    // Create a new record in the 'daftar' table
    DB::table('daftar')->insert([
        'pemohon' => $data['pemohon'],
        'nokp' => $data['nokp'],
        'alamat' => $data['alamat'],
        'poskod' => $data['poskod'],
        'daerah' => $data['daerah'],
        'notel' => $data['notel'],
        'nohp' => $data['nohp'],
        'nokad' => $data['nokad'],
        'tahunpohon' => $data['tahunpohon'],
        'rd_daftar' => $data['rd_daftar'],
        'ch_musim' => $data['ch_musim'],
        'ch_musim2' => $data['ch_musim2'],
        'tarikh' => $data['tarikh'],
    ]);

    // Redirect or perform any other operations
    return redirect()->back()->with('success', 'Data has been saved successfully.');
}
}

