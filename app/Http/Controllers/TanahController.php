<?php

namespace App\Http\Controllers;

use App\Models\LokasiTanah;
use App\Models\Pemilikan;
use App\Models\PetaniBajak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Date;
use App\Models\Tanah;

class TanahController extends Controller
{
    // public function index()
    // {
    //     // Get the logged-in user's nokp
    //     $nokp = Auth::user()->nokp;

    //     // Get the maximum available year from the 'tanah' table for the logged-in user
    //     $maxYear = DB::table('tanah')
    //         ->where('nokppetani', $nokp)
    //         ->max(DB::raw('YEAR(tarikh)'));

    //     // Fetch data from 'tanah' table where 'nokppetani' matches the logged-in user's nokp and 'tarikh' matches the maximum available year
    //     $tanah = DB::table('tanah')
    //         ->where('nokppetani', $nokp)
    //         ->where(DB::raw('YEAR(tarikh)'), $maxYear)
    //         ->get();

    //     $tanahWithLokasi = $tanah->map(function ($item) {
    //         $item->tarikh = Carbon::parse($item->tarikh)->format('Y-m-d');
    //         $item->lokasi = DB::table('lokasitanah')->where('id', $item->lokasi)->value('namalokasi');
    //         $item->pemilikan = DB::table('pemilikan')->where('kodmilik', $item->pemilikan)->value('deskripsi');
    //         return $item;
    //     });

    //     return view('tanahindex', compact('tanah'));
    // }

    public function index()
    {
        // Get the logged-in user's nokp
        $nokp = Auth::user()->nokp;

        // Get the maximum available year from the 'tanah' table for the logged-in user
        $maxYear = Tanah::where('nokppetani', $nokp)
            ->max(DB::raw('YEAR(tarikh)'));

        // Fetch data from 'tanah' table where 'nokppetani' matches the logged-in user's nokp and 'tarikh' matches the maximum available year
        $tanah = Tanah::where('nokppetani', $nokp)
            ->whereYear('tarikh', $maxYear)
            ->get();

        $tanahWithLokasi = $tanah->map(function ($item) {
            $item->tarikh = Carbon::parse($item->tarikh)->format('Y-m-d');
            $item->lokasi = LokasiTanah::where('id', $item->lokasi)->value('namalokasi');
            $item->pemilikan = Pemilikan::where('kodmilik', $item->pemilikan)->value('deskripsi');
            return $item;
        });

        return view('tanahindex', compact('tanah'));
    }

    public function updateyear()
    {
        // Get the logged-in user's nokp
        $nokp = Auth::user()->nokp;

        // Get the maximum available year from the 'tanah' table for the logged-in user
        $maxYear = DB::table('tanah')
            ->where('nokppetani', $nokp)
            ->max(DB::raw('YEAR(tarikh)'));

        // Fetch data from 'tanah' table where 'nokppetani' matches the logged-in user's nokp and 'tarikh' matches the maximum available year
        $tanah = DB::table('tanah')
            ->where('nokppetani', $nokp)
            ->where(DB::raw('YEAR(tarikh)'), $maxYear)
            ->get();

        $currentYear = date('Y');

        // Check if datasets already exist for the current year
        $datasetsExist = DB::table('tanah')
            ->where('nokppetani', $nokp)
            ->where(DB::raw('YEAR(tarikh)'), $currentYear)
            ->exists();

        if (!$datasetsExist) {
            // Retrieve all datasets from the previous year
            $previousYearTanah = DB::table('tanah')
                ->where('nokppetani', $nokp)
                ->where(DB::raw('YEAR(tarikh)'), $maxYear)
                ->get();

            $latestTableId = DB::table('tanah')->max('table_id');
            $latestPohonId = PetaniBajak::where('tahunpohon', Carbon::now()->format('Y'))->where('nokp', Auth::user()->nokp)->value('pohonid');
            $latestNoPetani = PetaniBajak::where('tahunpohon', Carbon::now()->format('Y'))->where('nokp', Auth::user()->nokp)->value('nopetani');

            // Duplicate each dataset and update its date to the current year
            foreach ($previousYearTanah as $previousDataset) {
                $duplicatedDataset = clone $previousDataset;
                // $duplicatedDataset = new Tanah();
                $duplicatedDataset->bil = $previousDataset->bil;
                $duplicatedDataset->pohonid = $latestPohonId;
                $duplicatedDataset->nopetani = substr($latestNoPetani, 0, 10);
                $duplicatedDataset->nokppetani = $previousDataset->nokppetani;
                $duplicatedDataset->zon = $previousDataset->zon;
                $duplicatedDataset->mukim = $previousDataset->mukim;
                $duplicatedDataset->kawasan = $previousDataset->kawasan;
                $duplicatedDataset->stesen = $previousDataset->stesen;
                $duplicatedDataset->noakaun = $previousDataset->noakaun;
                $duplicatedDataset->bank = $previousDataset->bank;
                $duplicatedDataset->bankcwgn = $previousDataset->bankcwgn;
                $duplicatedDataset->tahunpohon = Carbon::now()->format('Y');
                $duplicatedDataset->tarikh = Carbon::now()->format('Y-m-d');
                $duplicatedDataset->table_id = ++$latestTableId; // Reset the ID to create a new entry in the database

                // Set null values
                $duplicatedDataset->de = null;
                $duplicatedDataset->detuntut = null;
                $duplicatedDataset->delulus = null;
                $duplicatedDataset->sokong = null;
                $duplicatedDataset->luastanam = null;
                $duplicatedDataset->luaslulus = null;
                $duplicatedDataset->rekomenlulus = null;
                $duplicatedDataset->ulasan = null;
                $duplicatedDataset->bulanbajak = null;
                $duplicatedDataset->amaun = null;
                $duplicatedDataset->idsyt = null;
                $duplicatedDataset->nokpkon = null;
                $duplicatedDataset->tarkon = null;
                $duplicatedDataset->tartuntut = null;
                $duplicatedDataset->tarlulus = null;
                $duplicatedDataset->semlulus = null;
                $duplicatedDataset->tarsemlulus = null;
                $duplicatedDataset->amaunlulus = null;
                $duplicatedDataset->sahlulus = null;
                $duplicatedDataset->tarsahlulus = null;
                $duplicatedDataset->nopenyatamusim = null;
                $duplicatedDataset->tahunpenyata = null;
                $duplicatedDataset->detuntut2 = null;
                $duplicatedDataset->delulus2 = null;
                $duplicatedDataset->sokong2 = null;
                $duplicatedDataset->luastanam2 = null;
                $duplicatedDataset->luaslulus2 = null;
                $duplicatedDataset->rekomenlulus2 = null;
                $duplicatedDataset->ulasan2 = null;
                $duplicatedDataset->bulanbajak2 = null;
                $duplicatedDataset->amaun2 = null;
                $duplicatedDataset->idsyt2 = null;
                $duplicatedDataset->nokpkon2 = null;
                $duplicatedDataset->tarkon2 = null;
                $duplicatedDataset->tartuntut2 = null;
                $duplicatedDataset->tarlulus2 = null;
                $duplicatedDataset->semlulus2 = null;
                $duplicatedDataset->tarsemlulus2 = null;
                $duplicatedDataset->amaunlulus2 = null;
                $duplicatedDataset->sahlulus2 = null;
                $duplicatedDataset->tarsahlulus2 = null;
                $duplicatedDataset->nopenyatamusim2 = null;
                $duplicatedDataset->tahunpenyata2 = null;
                $duplicatedDataset->kpedit = null;
                $duplicatedDataset->taredit = null;

                // Insert the duplicated dataset into the 'tanah' table
                DB::table('tanah')->insert(get_object_vars($duplicatedDataset));
            }
        }
        return response()->json(['message' => 'Data duplicated successfully'], 200);
    }

    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'table_id' => 'required',
            'pemilikgeran' => 'required',
            'nogeran' => 'required',
            'lokasi' => 'required',
            'luasekar' => 'required',
            'luaspohon' => 'required',
            'pemilikan' => 'required',
            // 'tarikh' => 'required|date',
        ]);

        $CurrentYear = Carbon::now()->format('Y');

        // Get the logged-in user's ID (auth ID)
        $nokppetani = Auth::user()->nokp;
        $pohonId = DB::table('petanibajak')->where('nokp', $nokppetani)->latest('tarpohon')->value('pohonid');
        $stesen = DB::table('petanibajak')->where('nokp', $nokppetani)->latest('tarpohon')->value('stesen');
        $tahunpohon = DB::table('petanibajak')->where('nokp', $nokppetani)->latest('tarpohon')->value('tahunpohon');
        $nopetani = PetaniBajak::where('tahunpohon', $CurrentYear)->where('nokp', $nokppetani)->value('nopetani');

        $selectedLokasiId = $request->input('lokasi'); //read from the form
        $lokasi = DB::table('lokasitanah')->where('id', $selectedLokasiId)->first(); //read from the database, matching the id from the form

        // Find the maximum bil value for the current user
        $maxBil = DB::table('tanah')->where('nokppetani', $nokppetani)->max('bil');

        // Calculate the new bil value
        $newBil = $maxBil ? $maxBil + 1 : 1;

        // Create a new record in the 'tanah' table using the validated data and the logged-in user's ID
        DB::table('tanah')->insert([
            'table_id' => $validatedData['table_id'],
            'bil' => $newBil,
            'pohonid' => $pohonId,
            'nopetani' => substr($nopetani, 0, 10),
            'nokppetani' => $nokppetani,
            'stesen' => $stesen,
            'tahunpohon' => $tahunpohon,
            'pemilikgeran' => $validatedData['pemilikgeran'],
            'nogeran' => $validatedData['nogeran'],
            'lokasi' => $validatedData['lokasi'],
            'zon' => $lokasi->kodzon,
            'mukim' => $lokasi->kodmukim,
            'kawasan' => $lokasi->kodkawasan,
            'luasekar' => $validatedData['luasekar'],
            'luaspohon' => $validatedData['luaspohon'],
            'pemilikan' => $validatedData['pemilikan'],
            'tarikh' => Date::now(),
            // Add any other fields that need to be inserted
        ]);

        // Redirect the user to the 'tanahindex' page after storing the data
        return redirect()->route('tanahindex')->with('success', 'Data berhasil disimpan!');
    }

    public function delete($id)
    {
        $user = Auth::user();
        $tableId = $id;

        // Perform deletion logic here
        DB::table('tanah')->where('table_id', $tableId)->delete();

        // Set a success message
        $message = 'Geran Berjaya Di Padam!';

        // Store the success message in the session with the key 'success'
        session()->flash('success', 'Geran Berjaya Di Padam!');

        // Return the response to the same page
        return back();
    }

    public function index2()
    {
        $lokasiOptions = DB::table('lokasitanah')->where('kodstesen', DB::table('petanibajak')
                        ->where('tahunpohon', Carbon::now()->format('Y'))
                        ->where('nokp', Auth::user()->nokp)
                        ->value('stesen'))
                        ->get();

        // Call the getLatestTableId() method to fetch the latest table_id value
        $latestTableId = $this->getLatestTableId();

        // Pass the latestTableId and user_id variables to the view
        return view('senaraitanah', compact('latestTableId', 'lokasiOptions'));
    }

    public function getLatestTableId()
    {
        $latestTableId = DB::table('tanah')->max('table_id');
        return response()->json(['latestTableId' => $latestTableId + 1]);
    }

    public function upload(Request $request)
    {
        // Validate the uploaded file
        $validator = Validator::make($request->all(), [
            'file' => ['required', 'file', 'mimes:pdf', 'max:2048'], // PDF and maximum 2MB
        ], [
            'file.required' => 'Please choose a file to upload.',
            'file.file' => 'The uploaded file is invalid.',
            'file.mimes' => 'The file must be a PDF.',
            'file.max' => 'The file size must not exceed 2MB.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Process the file upload
        if ($request->hasFile('file')) {
            $file = $request->file('file');

            // Get the authenticated user's NOKP value
            $nokp = Auth::user()->nokp;

            // Generate a unique filename with 'geran' and the user's NOKP
            $filename = 'geran_' . $nokp . '.' . $file->getClientOriginalExtension();

            // Store the file in the 'public' disk with the generated filename
            $path = $file->storeAs('geran_files', $filename, 'public');

            // Save the file path in the database
            DB::table('gerans')->insert([
                'file_path' => $path,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Redirect back with a success message
            return redirect()->back()->with('success', 'File uploaded successfully.');
        }

        return redirect()->back()->withErrors(['file' => 'File upload failed.'])->withInput();
    }
}
