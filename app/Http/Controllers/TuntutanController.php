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

        $id = DB::table('tanah')->where('nokppetani', $nokp)->value('bil');
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

    // Retrieve the specific item based on your requirements
    $specificItem = DB::table('tanah')->where('bil', $id)->first();

    // Pass the $tanahWithLokasi and $specificItem variables to the view
    return view('ptundaf', compact('tanah'))->with('tanahWithLokasi', $tanahWithLokasi)->with('specificItem', $specificItem);
    }

    // Function to show the view with necessary data
    public function showTanah($table_id)
    {
        // Get the logged-in user's nokp
        $nokp = Auth::user()->nokp;

        // Fetch data from 'tanah' table where 'nokppetani' matches the logged-in user's nokp and 'table_id' matches the provided $table_id
        $tanah = DB::table('tanah')
            ->where('nokppetani', $nokp)
            ->where('table_id', $table_id)
            ->first();

            // //if dd correct data pula cilakak
            // dd($nokp, $table_id, $tanah);

        // Check if the $tanah is found
        if (!$tanah) {
            // If the $tanah is not found, redirect back with an error message
            return redirect()->back()->with('error', 'Data not found.');
        }

        // Retrieve the 'nama' value for the 'nokppetani' in the 'users' table
        $nama = DB::table('users')->pluck('nama')->first();

        // Retrieve the 'namalokasi' value for the 'lokasi' in the 'tanah' record
        $tanah->lokasi = DB::table('lokasitanah')->pluck('namalokasi')->first();

        // Retrieve the 'deskripsi' value for the 'pemilikan' in the 'tanah' record
        $tanah->deskripsi = DB::table('pemilikan')->pluck('deskripsi')->first();

        return view('ptundaf2', compact('nama', 'tanah'));
    }

    // Function to store the tuntutan data
    public function storeTuntutan(Request $request)
    {
        // Validate the input data
        $request->validate([
            'bulan' => 'required',
            'tuntutan' => 'required',
            'akaun' => 'required',
            'bank' => 'required',
            'daerah' => 'required',
            'tarpohon' => 'required',
            'tanah_id' => 'required|exists:tanah,table_id',
        ]);

        // Store the tuntutan data in the database
        DB::table('tuntutan')->insert([
            'bulan' => $request->input('bulan'),
            'tuntutan' => $request->input('tuntutan'),
            'akaun' => $request->input('akaun'),
            'bank' => $request->input('bank'),
            'daerah' => $request->input('daerah'),
            'tarpohon' => $request->input('tarpohon'),
            'tanah_id' => $request->input('tanah_id'),
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Tuntutan data has been stored successfully.');
    }

    public function changeDate($id)
    {
        // Find the Tanah record based on the given ID
        $tanah = DB::table('tanah')->where('table_id', $id)->first();

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
        return redirect()->back()->with('success', 'Sila kemaskini data di bahagian Tuntutan.');
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

    // Check if the "tahun" input is not empty before executing the search query
    if (!empty($tahunpohon)) {
        $searchResults = DB::table('tanah')
            ->join('stesen', 'tanah.stesen', '=', 'stesen.stationcode')
            ->where('tanah.nokppetani', $user->nokp)
            ->where(function ($query) use ($tahunpohon) {
                $query->where('tanah.tahunpohon', 'like', '%' . $tahunpohon . '%')
                    ->orWhere('tanah.tahunpohon', $tahunpohon);
            })
            ->orderBy('tanah.tahunpohon', 'desc')
            ->select('tanah.*', 'tanah.tahunpohon', 'tanah.pemilikgeran', 'stesen.stationdesc', 'tanah.nogeran', 'tanah.luaspohon', 'tanah.amaunlulus')
            ->get();
    } else {
        // If the "tahun" input is empty, set an empty collection for searchResults
        $searchResults = collect();
    }

    return view('carian', compact('searchResults'));
}


}






