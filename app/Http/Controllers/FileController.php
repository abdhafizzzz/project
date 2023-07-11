<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function upload(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');

            // Generate a unique filename
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();

            // Move the uploaded file to the desired storage location
            $file->move(public_path('uploads'), $filename);

            return redirect()->back()->with('success', 'File uploaded successfully!');
        }

        return redirect()->back()->with('error', 'No file selected.');
    }
}
