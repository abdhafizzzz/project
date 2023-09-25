<?php

namespace App\Http\Controllers;

use App\Models\PetaniBajak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class DaftarController extends Controller
{
    public function showPetCetakForm()
    {
        // Get the logged-in user's nokp
        $nokp = Auth::user()->nokp;

        // Fetch data from 'petanibajak' table for the logged-in user
$petanibajakData = DB::table('petanibajak')
->where('nokp', $nokp)

->first(); // Assuming you expect only one row for the logged-in user

$daerah = DB::table('daerah')->where('koddaerah', $petanibajakData->daerah)->value('namadaerah');

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
            $item->lokasi = DB::table('lokasitanah')
                ->where('id', $item->lokasi)
                ->value('namalokasi');



            $item->deskripsi = DB::table('pemilikan')
                ->where('kodmilik', $item->pemilikan)
                ->value('deskripsi');
            return $item;
        });

        return view('pet_cetak', compact( 'tanah','petanibajakData' ));
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
    public function uploadIC(Request $request)
{
    // Validate the uploaded file
    $validator = Validator::make($request->all(), [
        'nokpgambar' => ['required', 'file', 'max:2048', 'mimes:jpeg,png,jpg,pdf'], // Accept images (jpeg, png, jpg) and PDF files
    ], [
        'nokpgambar.required' => 'Please choose a file to upload.',
        'nokpgambar.file' => 'The uploaded file is invalid.',
        'nokpgambar.mimes' => 'The file must be an image (JPEG, PNG, JPG) or a PDF.',
        'nokpgambar.max' => 'The file size must not exceed 2MB.',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // Process the file upload
    if ($request->hasFile('nokpgambar')) {
        $nokpgambarFile = $request->file('nokpgambar');

        // Get the authenticated user's NOKP value
        $nokp = Auth::user()->nokp;

        // Determine the storage directory - 'nokpgambar'
        $storageDirectory = 'nokpgambar';

        // Generate a unique filename with 'nokpgambar' and the user's NOKP
        $filename = 'nokpgambar_' . $nokp . '.' . $nokpgambarFile->getClientOriginalExtension();

        // Store the file in the designated directory
        $path = $nokpgambarFile->storeAs($storageDirectory, $filename);

            // Update the 'petanibajak' table with the file information
            DB::table('petanibajak')
            ->where('nokp', $nokp)
            ->update([
                'nokpgambar' => $path,
            ]);


        return redirect()->route('daftar2')->with('success', 'IC uploaded successfully.');
    }

    return redirect()->back()->with('error', 'File upload failed.');
}


    public function viewIC()
    {
        $nokp = Auth::user()->nokp;
        $storageDisk = 'local'; // Make sure this matches your storage disk configuration

        // List of acceptable file extensions
        $allowedExtensions = ['jpg', 'png', 'jpeg', 'pdf'];

        foreach ($allowedExtensions as $extension) {
            $fileName = 'nokpgambar_' . $nokp . '.' . $extension;

            // Check if the file exists
            if (Storage::disk($storageDisk)->exists('nokpgambar/' . $fileName)) {
                $filePath = storage_path('app/nokpgambar/' . $fileName);
                return response()->file($filePath);
            }
        }

        return response()->json(['error' => 'IC not found.'], 404);
    }
    public function uploadNobank(Request $request)
{
    $validator = Validator::make($request->all(), [
        'nobank' => ['required', 'file', 'max:2048', 'mimes:jpeg,png,jpg,pdf'], // Accept images (jpeg, png, jpg) and PDF files
        'nobank.required' => 'Please choose a No Penyata Bank file to upload.',
        'nobank.file' => 'The uploaded file is invalid.',
        'nobank.mimes' => 'The file must be a between (JPEG, PNG, JPG) or PDF.',
        'nobank.max' => 'The file size must not exceed 2MB.',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // Process the No Penyata Bank file upload
    if ($request->hasFile('nobank')) {
        $nobankFile = $request->file('nobank');

        // Get the authenticated user's NOKP value
        $nokp = Auth::user()->nokp;

        // Determine the storage directory based on file type (PDF)
        $storageDirectory = 'nobank';

        // Generate a unique filename with 'nobank' and the user's NOKP
        $filename = 'nobank_' . $nokp . '.' . $nobankFile->getClientOriginalExtension();

        // Store the file in the designated directory
        $path = $nobankFile->storeAs($storageDirectory, $filename);

            // Update the 'petanibajak' table with the file information
    DB::table('petanibajak')
    ->where('nokp', $nokp)
    ->update([
        'nobank' => $path,
    ]);

        return redirect()->route('daftar2')->with('success', 'No Penyata Bank uploaded successfully.');
    }

    return redirect()->back()->with('error', 'File upload failed.');
}

public function viewNobank()
{
    $nokp = Auth::user()->nokp;
    $storagePath = storage_path('app/nobank');
    $allowedExtensions = ['jpg', 'png', 'jpeg', 'pdf'];

    foreach ($allowedExtensions as $extension) {
        $fileExtension = $extension;
        $fileName = 'nobank_' . $nokp . '.' . $fileExtension;
        $filePath = $storagePath . '/' . $fileName;

        if (file_exists($filePath)) {
            return response()->file($filePath);
        }
    }

    return response()->json(['error' => 'No Penyata Bank not found.'], 404);
}
public function show($id)
{
    $petaniBajak = PetaniBajak::find($id);

    return view('daftar2', compact('petaniBajak'));
}
}
