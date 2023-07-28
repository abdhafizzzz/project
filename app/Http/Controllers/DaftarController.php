<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DaftarController extends Controller
{
    public function cetakindex()
    {
        return view('pet_cetak');
    }

    public function showPetCetakForm()
    {
        $user = Auth::user();
        $tanah = DB::table('tanah')->where('pohonid', $user->id)->first();
        return view('pet_cetak', compact('user', 'tanah'));
    }

    public function edit($id = null)//this function is used to retrieve the petanibajak record
    {
        // Retrieve the $userData object
        $userData = DB::table('petanibajak')
        ->where('nokp', Auth::user()->nokp)
        ->orderBy('tarpohon', 'desc')
        ->first();

        // Check if $userData is null, if so, create an empty object
        if (!$userData) {
            $userData = (object) [
                'nama' => null,
                'nokp' => null,
                'jantina' => null,
                'alamat' => null,
                'poskod' => null,
                'daerah' => null,
                'telrumah' => null,
                'telhp' => null,
                'nopetani' => null,
                'tahunpohon' => null,
                'baru' => null,
                'musim' => null,
                'musim2' => null,
                'stesen' => null,
                'tarpohon' => null,
            ];
        }

        // Create a new variable to hold the formatted date value
        $tarikhMemohon = $userData ? Carbon::parse($userData->tarpohon)->toDateString() : '';

        return view('daftar', compact('userData', 'tarikhMemohon'));
    }

    public function update(Request $request)//this function is used to update the petanibajak record
    {
        // Retrieve the existing data for the authenticated user
        $existingData = DB::table('petanibajak')
            ->where('nokp', Auth::user()->nokp)
            ->where('tahunpohon', $request->tahunpohon)
            ->first();

        if ($existingData) {
            // Update the existing row
            DB::table('petanibajak')
                ->where('nokp', Auth::user()->nokp)
                ->where('tahunpohon', $request->tahunpohon)
                ->update([
                    'nama' => $request->nama,
                    'nokp' => $request->nokp,
                    'jantina' => $request->jantina,
                    'alamat' => $request->alamat,
                    'poskod' => $request->poskod,
                    'daerah' => $request->daerah,
                    'telrumah' => $request->telrumah,
                    'telhp' => $request->telhp,
                    'nopetani' => $request->nopetani,
                    'baru' => $request->baru,
                    'musim' => $request->musim ? 1 : 0,
                    'musim2' => $request->musim2 ? 1 : 0,
                    'stesen' => $request->stesen,
                    'tarpohon' => $request->tarpohon,
                ]);

            return back()->with('success', 'Data berhasil diperbaharui!');
        } else {
            // Retrieve the last petanibajak_id
            $lastPetanibajakId = DB::table('petanibajak')->orderBy('petanibajak_id', 'desc')->value('petanibajak_id');

            // Retrieve the last pohonid for the given stesen
            $lastPohonId = DB::table('petanibajak')
            ->where('stesen', $request->stesen)
            ->orderBy('pohonid', 'desc')
            ->value('pohonid');

            // Generate the new petanibajak_id
            $petanibajakId = $lastPetanibajakId + 1;

            // Generate the new pohonid
            $pohonId = $lastPohonId + 1;

            // Insert a new row
            DB::table('petanibajak')->insert([
                'petanibajak_id' => $petanibajakId,
                'pohonid' => $pohonId,
                'nokp' => Auth::user()->nokp,
                'nama' => $request->nama,
                'jantina' => $request->jantina,
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
                'stesen' => $request->stesen,
                'tarpohon' => $request->tarpohon,
            ]);

            return back()->with('success', 'Data berhasil disimpan!');
        }
    }
}
