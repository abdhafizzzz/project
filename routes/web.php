<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\TanahController;
use App\Http\Controllers\TuntutanController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\SetPasswordController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Applying middleware
Route::middleware('auth')->group(function () {
    // Protected routes here
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // Route for handling and displaying the edit form
    Route::get('/daftar/edit', [DaftarController::class, 'edit'])->name('daftar.edit');
    Route::post('/daftar/update', [DaftarController::class, 'update'])->name('daftar.update');
    Route::match(['GET', 'POST'], '/daftar', [DaftarController::class, 'edit'])->name('daftar'); // Make it handle both GET (view) and POST (create, edit, and store) method
    Route::get('/cetakan', [DaftarController::class, 'cetakindex'])->name('pet_cetak');
    Route::get('/semakan', [DaftarController::class, 'semakindex'])->name('semakindex');

    Route::get('/tanah/{id}/edit', [TanahController::class, 'edit'])->name('edit-tanah');
    Route::post('/senaraitanah', [TanahController::class, 'store'])->name('senaraitanah.store');
    Route::put('/senaraitanah/{id}', [TanahController::class, 'update'])->name('senaraitanah.update');
    Route::get('/tanahindex', [TanahController::class, 'index'])->name('tanahindex'); // Define the tanahindex route with the TanahController's index method
    Route::get('/senaraitanah', [TanahController::class, 'create'])->name('senaraitanah'); // Define the tanahindex route with the TanahController's index method
    Route::get('/tanah/{id}/delete', [TanahController::class, 'delete'])->name('tanah.delete');


    Route::get('/carian', function () {
        return view('carian');
    })->name('carian');

});

Auth::routes();

// New User Registration
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

// Password Setting
Route::get('set-password', [SetPasswordController::class, 'showSetPasswordForm'])->name('set.password');
Route::post('set-password', [SetPasswordController::class, 'setPassword']);

// Password Reset
Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');

// Subsidi Daftar Form Page
// Route::get('/senaraitanah', [GeranController::class, 'index'])->name('tanahindex');

Route::post('/upload', 'FileController@upload')->name('file.upload');
Route::get('/pet_cetak', [DaftarController::class, 'showPetCetakForm'])->name('pet_cetak');
Route::get('/ptundaf', [TuntutanController::class, 'index'])->name('ptundaf');
