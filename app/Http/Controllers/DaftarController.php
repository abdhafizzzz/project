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

    public function show($id = null)
    {
        if ($id) {
            // Retrieve the daftar record with the given id and user_id
            $daftar = DB::select('SELECT * FROM daftar WHERE id = ? AND user_id = ?', [$id, Auth::id()]);

            // Check if the daftar record exists
            if (!$daftar) {
                abort(404);
            }

            return view('semakdaftar')->with('daftar', $daftar[0]);
        } else {
            // Handle the case where no id is provided
            // For example, show a list of all daftar entries
            $daftar = DB::select('SELECT * FROM daftar WHERE user_id = ?', [Auth::id()]);

            return view('daftar')->with('daftar', $daftar);
        }
    }

    public function semakindex()
    {
        return view('semakdaftar');
    }

    public function cetakindex()
    {
        return view('pet_cetak');
    }

    public function store(Request $request)
    {
        DB::table('daftar')->insert([
            'user_id' => Auth::id(),
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

    public function edit($id)
    {
        // Retrieve the daftar record with the given id
        $daftar = DB::select('SELECT * FROM daftar WHERE id = ?', [$id]);

        // Check if the daftar record exists
        if (!$daftar) {
            abort(404);
        }
        // Pass the daftar record to the daftaredit view
        return view('daftaredit', ['daftar' => $daftar[0]]);
    }

    public function create(Request $request)
    {
        // Tallying ID of logged in user with the daftar table
        $userId = Auth::id();

        DB::table('daftar')->insert([
            'user_id' => $userId,
            // Set other column values of daftar as needed
        ]);

        // Perform any additional logic or redirect as needed
    }
}

