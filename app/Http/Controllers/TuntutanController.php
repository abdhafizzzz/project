<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TuntutanController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $daftar = DB::table('daftar')->where('user_id', $user->id)->first();
        $tanah = DB::table('tanah')->where('pohonid', $user->id)->first();

        return view('ptundaf', compact('daftar', 'tanah'));
    }
}
