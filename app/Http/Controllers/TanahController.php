<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TanahController extends Controller
{
    public function index()
    {
        return view('tanahindex');
    }

    public function create()
    {

        // Call the getLatestTableId() method to fetch the latest table_id value
        $latestTableId = $this->getLatestTableId();

        // Fetch the user_id value
        $user_id = Auth::id();

        // Pass the latestTableId and user_id variables to the view for creating new tanah
        return view('senaraitanah_create', compact('latestTableId', 'user_id'));
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
            'tarikh' => 'required|date',
        ]);

        // Get the logged-in user's ID (auth ID)
        $nokppetani = Auth::user()->nokp;
        $pohonId = DB::table('petanibajak')->where('nokp', $nokppetani)->latest('tarpohon')->value('pohonid');
        $stesen = DB::table('petanibajak')->where('nokp', $nokppetani)->latest('tarpohon')->value('stesen');
        $tahunpohon = DB::table('petanibajak')->where('nokp', $nokppetani)->latest('tarpohon')->value('tahunpohon');

        // Find the maximum bil value for the current user
        $maxBil = DB::table('tanah')
            ->where('nokppetani', $nokppetani)
            ->max('bil');

        // Calculate the new bil value
        $newBil = $maxBil ? $maxBil + 1 : 1;

        // Create a new record in the 'tanah' table using the validated data and the logged-in user's ID
        DB::table('tanah')->insert([
            'table_id' => $validatedData['table_id'],
            'bil' => $newBil,
            'pohonid' => $pohonId,
            'nokppetani' => $nokppetani,
            'stesen' => $stesen,
            'tahunpohon' => $tahunpohon,
            'pemilikgeran' => $validatedData['pemilikgeran'],
            'nogeran' => $validatedData['nogeran'],
            'lokasi' => $validatedData['lokasi'],
            'luasekar' => $validatedData['luasekar'],
            'luaspohon' => $validatedData['luaspohon'],
            'pemilikan' => $validatedData['pemilikan'],
            'tarikh' => $validatedData['tarikh'],
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
        // Call the getLatestTableId() method to fetch the latest table_id value
        $latestTableId = $this->getLatestTableId();

        // Pass the latestTableId and user_id variables to the view
        return view('senaraitanah', compact('latestTableId'));
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
            'file' => 'required|mimes:pdf|max:2048', // PDF and maximum 2MB
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Process the file upload
        if ($request->hasFile('file')) {
            $file = $request->file('file');

            // You may want to generate a unique name for the file
            $filename = uniqid('geran_') . '.' . $file->getClientOriginalExtension();

            // Store the file in the 'public' disk (you may need to configure the filesystems.php for this)
            $path = $file->storeAs('geran_files', $filename, 'public');

            // Save the file path in the database or any other processing you want to do
            // For example, if you have a 'gerans' table with a 'file_path' column, you can do:
            // $geran = new Geran;
            // $geran->file_path = $path;
            // $geran->save();

            // Redirect back with a success message
            return redirect()->back()->with('success', 'File uploaded successfully.');
        }

        return redirect()->back()->withErrors(['file' => 'File upload failed.'])->withInput();
    }
}
