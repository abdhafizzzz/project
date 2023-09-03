<?php

namespace App\Http\Controllers;

use App\Models\Daerah;
use App\Models\Pemilikan;
use App\Models\PetaniBajak;
use App\Models\Stesen;
use App\Models\Tanah;
use App\Models\LokasiTanah;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
// use Carbon\Carbon;

class TuntutanController extends Controller
{
    // public function index()
    // {
    //     // Get the logged-in user's nokp
    //     $nokp = Auth::user()->nokp;

    //     // Show the current year
    //     $Date = date('Y');

    //     // Fetch data from 'tanah' table where 'nokppetani' matches the logged-in user's nokp and 'tarikh' is in the last year
    //     $tanah = DB::table('tanah')
    //         ->whereYear('tarikh', $Date)
    //         ->where('nokppetani', $nokp)
    //         ->get();

    //     // Retrieve the 'namalokasi' value for each 'lokasi' in the 'tanah' collection
    //     //map() method to iterate through the collection to include the 'namalokasi' into the $item
    //     $tanahWithLokasi = $tanah->map(function ($item) {
    //         $item->lokasi = DB::table('lokasitanah')
    //             ->where('id', $item->lokasi)
    //             ->value('namalokasi');
    //         $item->pemilikan = DB::table('pemilikan')
    //             ->where('kodmilik', $item->pemilikan)
    //             ->value('deskripsi');
    //         return $item;
    //     });

    //     return view('ptundaf', compact('tanah'));
    // }

    public function index()
    {
        // Get the logged-in user's nokp
        $nokp = Auth::user()->nokp;

        // Show the current year
        $currentYear = date('Y');

        // Fetch data from 'tanah' table where 'nokppetani' matches the logged-in user's nokp and 'tarikh' is in the current year
        $tanah = Tanah::where('nokppetani', $nokp)
            ->whereYear('tarikh', $currentYear)
            ->get();

        // Retrieve the 'namalokasi' value for each 'lokasi' in the 'tanah' collection
        // Use eager loading to fetch related data more efficiently
        $tanahWithLokasi = $tanah->load('lokasiTanah', 'pemilikan');

        $tanahWithLokasi = $tanah->map(function ($item) {
            $item->lokasi = LokasiTanah::where('id', $item->lokasi)->value('namalokasi');
            $item->pemilikan = Pemilikan::where('kodmilik', $item->pemilikan)->value('deskripsi');
            return $item;
        });
        return view('ptundaf', compact('tanah', 'tanahWithLokasi'));
    }

    // Function to show the view with necessary data
    // public function showTanah($table_id)
    // {
    //     // Get the logged-in user's nokp
    //     $nokp = Auth::user()->nokp;

    //     // Fetch data from 'tanah' table where 'nokppetani' matches the logged-in user's nokp and 'table_id' matches the provided $table_id
    //     $tanah = DB::table('tanah')
    //         ->where('nokppetani', $nokp)
    //         ->where('table_id', $table_id)
    //         ->first();

    //     // Check if the $tanah is found
    //     if (!$tanah) {
    //         // If the $tanah is not found, redirect back with an error message
    //         return redirect()
    //             ->back()
    //             ->with('error', 'Data not found.');
    //     }

    //     // Retrieve the 'nama' value for the 'nokppetani' in the 'users' table
    //     $nama = DB::table('users')
    //         ->where('nokp', $tanah->nokppetani)
    //         ->value('nama');

    //     // Fetch the lastkodbank value from the 'petanibajak' table
    //     $petaniBajak = DB::table('petanibajak')
    //     ->where('nokp', $nokp)
    //     ->latest('tarpohon')
    //     ->first();

    //     $petaniBajak->daerah = DB::table('daerah')->where('koddaerah', $petaniBajak->daerah)->value('namadaerah');

    //     // Use map to add additional fields to the $tanah object
    //     $tanahWithLokasi = collect([$tanah])
    //         ->map(function ($item) {
    //             $item->lokasi = DB::table('lokasitanah')
    //                 ->where('id', $item->lokasi)
    //                 ->value('namalokasi');
    //             $item->pemilikan = DB::table('pemilikan')
    //                 ->where('kodmilik', $item->pemilikan)
    //                 ->value('deskripsi');
    //             $item->stesen = DB::table('stesen')->where('stationcode', $item->stesen)->value('stationdesc');
    //             return $item;

    //         })
    //         ->first(); // Retrieve the first item from the collection

    //     // Get the last segment of the URL path, which should be the table_id
    //     $tableId = request()->segment(count(request()->segments()));
    //     // Find the specific item in $tanah where the table_id matches
    //     $specificItem = collect([$tanah])->where('table_id', $tableId)->first();

    //     return view('ptundaf2', compact('nama', 'table_id', 'tanahWithLokasi', 'petaniBajak', 'specificItem'));
    // }

    public function showTanah($table_id)
    {
        // Get the logged-in user's nokp
        $nokp = Auth::user()->nokp;

        // Fetch data from 'tanah' table where 'nokppetani' matches the logged-in user's nokp and 'table_id' matches the provided $table_id
        $tanah = Tanah::where('nokppetani', $nokp)
            ->where('table_id', $table_id)
            ->first();

        // Check if the $tanah is found
        if (!$tanah) {
            // If the $tanah is not found, redirect back with an error message
            return redirect()
                ->back()
                ->with('error', 'Data not found.');
        }

        // Retrieve the 'nama' value for the 'nokppetani' in the 'users' table
        $nama = User::where('nokp', $tanah->nokppetani)->value('nama');

        // Fetch the lastkodbank value from the 'petanibajak' table
        $petaniBajak = PetaniBajak::where('nokp', $nokp)
            ->latest('tarpohon')
            ->first();

        $petaniBajak->daerah = Daerah::where('koddaerah', $petaniBajak->daerah)->value('namadaerah');

        // Use map to add additional fields to the $tanah object
        $tanahWithLokasi = collect([$tanah])
            ->map(function ($item) {
                $item->lokasi = LokasiTanah::where('id', $item->lokasi)->value('namalokasi');
                $item->pemilikan = Pemilikan::where('kodmilik', $item->pemilikan)->value('deskripsi');
                $item->stesen = Stesen::where('stationcode', $item->stesen)->value('stationdesc');
                return $item;
            })
            ->first(); // Retrieve the first item from the collection

        // Get the last segment of the URL path, which should be the table_id
        $tableId = request()->segment(count(request()->segments()));
        // Find the specific item in $tanah where the table_id matches
        $specificItem = collect([$tanah])->where('table_id', $tableId)->first();

        return view('ptundaf2', compact('nama', 'table_id', 'tanahWithLokasi', 'petaniBajak', 'specificItem'));
    }

    public function storeTuntutan(Request $request)
    {
        // Validate the input data
        $request->validate([
            'bulanbajak' => 'required',
            'noakaun' => 'required',
            'bank' => 'required',
            'bankcwgn' => 'required',
            'tartuntut' => 'required',
            'table_id' => 'required|exists:tanah,table_id',
        ]);

        $amaunField = $request->input('bulanbajak') >= 3 && $request->input('bulanbajak') <= 7 ? 'amaunlulus' : 'amaunlulus2';

        $dataToUpdate = [
            'bulanbajak' => $request->input('bulanbajak'),
            'amaunlulus' => $amaunField === 'amaunlulus' ? $request->input('amaunlulus') : null,
            'amaunlulus2' => $amaunField === 'amaunlulus2' ? $request->input('amaunlulus2') : null,
            'noakaun' => $request->input('noakaun'),
            'bank' => $request->input('bank'),
            'bankcwgn' => $request->input('bankcwgn'),
            'tartuntut' => $request->input('tartuntut'),
        ];

        DB::table('tanah')
            ->where('table_id', $request->input('table_id'))
            ->update($dataToUpdate);
        // Redirect to the 'ptundaf' route with a success message
        return redirect()
            ->route('ptundaf')
            ->with('success', 'Tuntutan data has been stored successfully.');
    }

    public function changeDate($id)
    {
        // Find the Tanah record based on the given ID
        $tanah = DB::table('tanah')
            ->where('table_id', $id)
            ->first();

        if ($tanah) {
            // Create a new array with the same data as the original record
            $newTanah = (array) $tanah;

            // Set the 'tarikh' column value to the current date
            $newTanah['tarikh'] = date('Y-m-d');

            // Get the maximum table_id from the 'tanah' table
            $newTableId = DB::table('tanah')->max('table_id') + 1;

            // Set the new value for the 'table_id' column
            $newTanah['table_id'] = $newTableId;

            // Insert the duplicated Tanah record with the updated 'tarikh' value and new 'table_id'
            DB::table('tanah')->insert($newTanah);
        }

        // Redirect back with a success message
        return redirect()
            ->back()
            ->with('success', 'Sila kemaskini data di bahagian Tuntutan.');
    }

    public function showSearchForm()
    {
        return view('carian'); // Replace 'search_form' with the name of your Blade view for the search form
    }
    public function search(Request $request)
    {
        $user = Auth::user();
        $searchKeyword = $request->input('tahun');
        $tahunpohon = $request->input('tahun');
        $musim = $request->input('musim');
        $musim2 = $request->input('musim2');

        // Validate checkboxes only if none is selected
        $request->validate(
            [
                'musim' => 'required_without:musim2',
                'musim2' => 'required_without:musim',
            ],
            [
                'musim.required_without' => 'Sila Pilih Musim Penanaman untuk Luar Musim (Bulan Mac - Julai) DAN/ATAU',
                'musim2.required_without' => 'Sila Pilih Musim Penanaman untuk Musim Utama (Bulan Ogos - Feb) dan masukkan tahun carian ',
            ],
        );

        // Check if the "tahun" input is not empty before executing the search query
        if (!empty($tahunpohon)) {
            $searchResults = DB::table('tanah')
                ->join('stesen', 'tanah.stesen', '=', 'stesen.stationcode')
                ->where('tanah.nokppetani', $user->nokp)
                ->where(function ($query) use ($tahunpohon) {
                    $query->where('tanah.tahunpohon', 'like', '%' . $tahunpohon . '%')->orWhere('tanah.tahunpohon', $tahunpohon);
                })
                ->orderBy('tanah.tahunpohon', 'desc')
                ->select('tanah.*', 'tanah.tahunpohon', 'tanah.pemilikgeran', 'stesen.stationdesc', 'tanah.nogeran', 'tanah.luaspohon', 'tanah.amaunlulus', 'tanah.nopenyatamusim')
                ->get();
        } else {
            // If the "tahun" input is empty, set an empty collection for searchResults
            $searchResults = collect();
        }

        return view('carian', compact('searchResults'));
    }
}
