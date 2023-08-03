<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DaftarController extends Controller
{
    public function showPetCetakForm()
    {
        $user = Auth::user();

        $tarikhPohon = DB::table('petanibajak')->where('nokp', $user->nokp)->latest('tarpohon')->value('tarpohon');
        $tarikhPohon = Carbon::parse($tarikhPohon)->format('Y-m-d');

        $tanah = DB::table('tanah')->where('pohonid', $user->id)->first();

        $petanibajakData = DB::table('petanibajak')->where('nokp', $user->nokp)->latest('tarpohon')->first();
        $daerah = DB::table('daerah')->where('koddaerah', $petanibajakData->daerah)->value('namadaerah');

        return view('pet_cetak', compact('user', 'tanah', 'petanibajakData', 'tarikhPohon', 'daerah'));
    }

    public function edit($id = null)//this function is used to retrieve the petanibajak record
    {
        // Retrieve the $userData object using the DB::table() method.
        $userData = DB::table('petanibajak')
        ->where('nokp', Auth::user()->nokp)
        ->orderBy('tarpohon', 'desc')
        ->first();

        //Then, the null coalescing operator (??) is used to assign the default object with null values if $userData is null.
        $userData = $userData ?? (object) [
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
            ->latest('tahunpohon')
            ->first();

        if ($existingData) {
            // Update the existing row with parameter binding (to prevent SQL injection)
            DB::update('UPDATE petanibajak SET
                            nama = ?,
                            nokp = ?,
                            jantina = ?,
                            alamat = ?,
                            poskod = ?,
                            daerah = ?,
                            telrumah = ?,
                            telhp = ?,
                            nopetani = ?,
                            baru = ?,
                            musim = ?,
                            musim2 = ?,
                            stesen = ?,
                            tarpohon = ?
                        WHERE nokp = ? AND tahunpohon = ?', [
                            $request->nama,
                            $request->nokp,
                            $request->jantina,
                            $request->alamat,
                            $request->poskod,
                            $request->daerah,
                            $request->telrumah,
                            $request->telhp,
                            $request->nopetani,
                            $request->baru,
                            $request->musim ? 1 : 0,
                            $request->musim2 ? 1 : 0,
                            $request->stesen,
                            $request->tarpohon,
                            Auth::user()->nokp,
                            $request->tahunpohon
                        ]);

            return back()->with('success', 'Data berhasil diperbaharui!');
        } else {
            // Retrieve the last petanibajak_id
            $lastPetanibajakId = DB::table('petanibajak')->max('petanibajak_id');

            // Retrieve the last pohonid for the given stesen
            $lastPohonId = DB::table('petanibajak')->where('stesen', $request->stesen)->max('pohonid');

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
