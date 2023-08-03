<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TuntutanController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $daftar = DB::table('petanibajak')->where('petanibajak_id', $user->id)->first();
        $tanah = DB::table('tanah')->where('pohonid', $user->id)->first();

        return view('ptundaf', compact('daftar', 'tanah'));
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
                'nopetani' => null,
                'pohonid' => null,

                'alamat' => null,
                'poskod' => null,

                'daerah' => null,
                'musim' => null,
                'musim2' => null,
                'stesen' => null,

                'nogeran' => null,
                'luaspohon' => null,
                'lokasi' => null,
                'bulan' => null,
                'tuntutan' => null,
                'akaun' => null,

                'tahunpohon' => null,

                'tarpohon' => null,
            ];
        }

        // Create a new variable to hold the formatted date value
        $tarikhMemohon = $userData ? Carbon::parse($userData->tarpohon)->toDateString() : '';

        return view('ptundaf2', compact('userData', 'tarikhMemohon'));
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

                    'musim' => $request->musim ? 1 : 0,
                    'musim2' => $request->musim2 ? 1 : 0,
                    'stesen' => $request->stesen,

                'nogeran' => $request->nogeran,
                'luaspohon' => $request->luaspohon,
                'lokasi' => $request->lokasi,
                'bulan' => $request->bulan,
                'tuntutan' => $request->tuntutan,
                'akaun' => $request->akaun,



                'tahunpohon' => $request->tahunpohon,



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


            'nogeran' => $request->nogeran,
            'luaspohon' => $request->luaspohon,
            'lokasi' => $request->lokasi,
            'bulan' => $request->bulan,
            'tuntutan' => $request->tuntutan,
            'akaun' => $request->akaun,

            ]);

            return back()->with('success', 'Data berhasil disimpan!');
        }
    }

    public function changeDate($id)
    {
        // Find the Tuntutan record based on the given ID
        $tuntutan = DB::table('tanah')->where('table_id', $id)->first();
        $lasttableId = DB::table('tanah')->max('table_id');
        $tableId = $lasttableId + 1;

        if ($tuntutan) {
            // Convert the Tuntutan record to an array
            $tuntutanArray = (array) $tuntutan;

            // Set the 'tarikh' column value to the current date
            $tuntutanArray['tarikh'] = date('Y-m-d');

            // Set the new value for the 'table_id' column
            $tuntutanArray['table_id'] = $tableId;

            // Insert the duplicated Tuntutan record with the updated 'tarikh' value
            $newId = DB::table('tanah')->insertGetId($tuntutanArray);

            if ($newId) {
                // Redirect or perform any other actions as needed
                return redirect()->back()->with('success', 'Sila kemaskini data di bahagian Tuntutan.');
            }
        }

        // Handle the case when the Tuntutan record is not found
        return redirect()->back()->with('error', 'Tuntutan not found.');
    }
}
