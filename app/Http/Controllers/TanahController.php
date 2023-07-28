<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class TanahController extends Controller
{

    public function index()
    {
        return view('tanahindex');
    }

    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'table_id' => 'required',
            'pohonid' => 'required',
            'pemilikgeran' => 'required',
            'nogeran' => 'required',
            'lokasi' => 'required',
            'luasekar' => 'required',
            'luaspohon' => 'required',
            'pemilikan' => 'required',
        ]);

        // Create a new record in the 'tanah' table using the validated data
        $tanah = DB::table('tanah')->insertGetId([
            'table_id' => $validatedData['table_id'],
            'pohonid' => $validatedData['pohonid'],
            'pemilikgeran' => $validatedData['pemilikgeran'],
            'nogeran' => $validatedData['nogeran'],
            'lokasi' => $validatedData['lokasi'],
            'luasekar' => $validatedData['luasekar'],
            'luaspohon' => $validatedData['luaspohon'],
            'pemilikan' => $validatedData['pemilikan'],
        ]);

      // Redirect the user to the 'tanahindex' page after storing the data
        return redirect()->route('tanahindex');
    }

    public function update(Request $request, $id)
    // {
    //     // Validate the form data
    //     $validatedData = $request->validate([
    //         'pohonid' => 'required',
    //         'pemilikgeran' => 'required',
    //         'nogeran' => 'required',
    //         'lokasi' => 'required',
    //         'luasekar' => 'required',
    //         'luaspohon' => 'required',
    //         'pemilikan' => 'required',
    //     ]);
    // }
    {
        // Validate the form data
        $validatedData = $request->validate([
            'table_id' => 'required',
            'pohonid' => 'required',
            'pemilikgeran' => 'required',
            'nogeran' => 'required',
            'lokasi' => 'required',
            'luasekar' => 'required',
            'luaspohon' => 'required',
            'pemilikan' => 'required',
        ]);

        // Create a new record in the 'tanah' table using the validated data
        $tanah = DB::table('tanah')->insertGetId([
            'table_id' => $validatedData['table_id'],
            'pohonid' => $validatedData['pohonid'],
            'pemilikgeran' => $validatedData['pemilikgeran'],
            'nogeran' => $validatedData['nogeran'],
            'lokasi' => $validatedData['lokasi'],
            'luasekar' => $validatedData['luasekar'],
            'luaspohon' => $validatedData['luaspohon'],
            'pemilikan' => $validatedData['pemilikan'],
        ]);

      // Redirect the user to the 'tanahindex' page after storing the data
        return redirect()->route('tanahindex');
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

    public function edit($id)
    {
        $tanah = DB::table('tanah')->where('table_id', $id)->first();

        if (!$tanah) {
            abort(404); // Handle the case when the tanah record is not found
        }

        return view('senaraitanah.edit', ['tanah' => $tanah]);
    }

    public function index2()
    {
        // Call the getLatestTableId() method to fetch the latest table_id value
        $latestTableId = $this->getLatestTableId();

        // Fetch the user_id value
        $user_id = DB::table('petanibajak')->where('petanibajak_id', Auth::user()->id)->value('petanibajak_id');

        // Pass the latestTableId and user_id variables to the view
        return view('senaraitanah', compact('latestTableId', 'user_id'));
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




