<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
// use Carbon\Carbon;

class TuntutanController extends Controller
{
    public function index()
    {
        // Get the logged-in user's nokp
        $nokp = Auth::user()->nokp;

        // Show the current year
        $Date = date('Y');

        // Fetch data from 'tanah' table where 'nokppetani' matches the logged-in user's nokp and 'tarikh' is in the last year
        $tanah = DB::table('tanah')
                ->whereYear('tarikh', $Date)
                ->where('nokppetani', $nokp)
                ->get();

        // Retrieve the 'namalokasi' value for each 'lokasi' in the 'tanah' collection
        //map() method to iterate through the collection to include the 'namalokasi' into the $item
        $tanahWithLokasi = $tanah->map(function ($item) {
        $item->lokasi = DB::table('lokasitanah')->where('id', $item->lokasi)->value('namalokasi');
        $item->deskripsi = DB::table('pemilikan')->where('kodmilik', $item->pemilikan)->value('deskripsi');
        return $item;
        });

        return view('ptundaf', compact('tanah'));
    }

    public function edit($bil = null)//this function is used to retrieve the petanibajak record
    {
        // Retrieve the $userData object
        $userData = DB::table('petanibajak')
        ->join('tanah', 'petanibajak.nokp', '=', 'tanah.nokppetani')
        ->where('petanibajak.nokp', Auth::user()->nokp)
        ->orderBy('petanibajak.tarpohon', 'desc')
        ->select('petanibajak.*','tanah.pemilikgeran', 'tanah.nogeran', 'tanah.luaspohon', 'tanah.stesen', 'tanah.bil as id')
        ->get();

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

        return view('ptundaf2', compact('userData'));
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
        }

        // Handle the case when the Tuntutan record is not found
        return redirect()->back()->with('success', 'Sila kemaskini data di bahagian Tuntutan.');
    }
}
