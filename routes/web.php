<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\SetPasswordController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Applying middleware
Route::middleware('auth')->group(function () {
    // Protected routes here
    Route::get('/daftar', [DaftarController::class, 'index'])->name('daftar');
    Route::get('/cetakan', [DaftarController::class, 'cetakindex'])->name('pet_cetak');
    // Route::get('/pet_cetak', function () {
    //     $user_id = request('user_id');
    //     $pets = DB::select('SELECT * FROM pets WHERE user_id = ?', [$id]);
    // });

    Route::get('/semakan', [DaftarController::class, 'semakindex'])->name('semakindex');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    // Route::get('/daftar/create', [DaftarController::class, 'create'])->name('daftar.create');

    Route::get('/senaraitanah', [DaftarController::class, 'senaraitanahindex'])->name('senaraitanahindex');
    Route::get('/ptundaf', [DaftarController::class, 'ptundaf'])->name('ptundaf');

    Route::get('/petsemak', function () {
        return view('petsemak');
    })->name('petsemak');

    Route::get('/carian', function () {
        return view('carian');
    })->name('carian');

    Route::post('/store', [DaftarController::class, 'store'])->name('store');
    Route::get('/daftar/{id}/edit', [DaftarController::class, 'edit'])->name('daftaredit');
    // ...
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// New User Registration
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

// Password Setting
Route::get('set-password', [SetPasswordController::class, 'showSetPasswordForm'])->name('set.password');
Route::post('set-password', [SetPasswordController::class, 'setPassword']);

// Password Reset

Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');

//Subsidi Daftar Form Page
// Route::get('/daftar', function () {
//     return view('layouts.daftar');
// })->name('daftar');

Route::view('senaraitanah', 'senaraitanah');


// Route::get('/dashboard', function () {
//     return view('dashboard');
// });


// Route::view('dashboard', 'Dashboard');

// Registration routes
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/success', function () {
    return view('auth.success');
});


// New route for ptundaf.blade.php
Route::get('/ptundaf', function () {
    return view('ptundaf');
})->name('ptundaf');

