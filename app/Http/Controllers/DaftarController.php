<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DaftarController extends Controller
{
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

    public function create(Request $request)
    {
        // Tallying ID of logged in user with the daftar table
        $userId = Auth::id();

        DB::table('daftar')->insert([
            'user_id' => $userId,
            // Set other column values of daftar as needed
        ]);

        // Perform any additional logic or redirect as needed
        $userId = Auth::id();

        // DB::table('tanah')->insert([
        //     'pohonid' => $userId,
            // Set other column values of daftar as needed
        // ]);

    }
    public function showPetCetakForm()
    {
        $user = Auth::user();
        $tanah = DB::table('tanah')->where('pohonid', $user->id)->first();
        return view('pet_cetak', compact('user', 'tanah'));
    }

    public function edit()
    {
        $userData = DB::table('petanibajak')->where('petanibajak_id', Auth::user()->id)->first();

        return view('daftar', compact('userData'));
    }

    public function update(Request $request)
    {
        $petanibajakId = Auth::id();

    DB::table('petanibajak')->updateOrInsert(
        ['petanibajak_id' => $petanibajakId],
        [
            'petanibajak_id' => $petanibajakId,
            'nama' => $request->nama,
            'nokp' => $request->nokp,
            'alamat' => $request->alamat,
            'poskod' => $request->poskod,
            'daerah' => $request->daerah,
            'telrumah' => $request->telrumah,
            'telhp' => $request->telhp,
            'nopetani' => $request->nopetani,
            'tahunpohon' => $request->tahunpohon,
            'baru' => $request->baru,
            'musim' => $request->musim ? 1 : 0,
            'musim2' => $request->musim2 ? 1 : 0,
            'tarpohon' => $request->tarpohon,
            // 'created_at' => now(),
            // 'updated_at' => now()
        ]
    );

    // return redirect('/daftar')->with('success', 'Data berhasil disimpan!');
    return back()->with('success', 'Data berhasil disimpan!');

    }
}

