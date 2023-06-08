<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DaftarController extends Controller
{
    public function index()
    {
        return view('layouts.daftar');
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}

