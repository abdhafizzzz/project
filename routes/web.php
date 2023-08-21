<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\TanahController;
use App\Http\Controllers\TuntutanController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\SetPasswordController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController; // Add this line

Route::get('/', function () {
    return view('auth.login');
});

Route::post('/check-nokp', [RegisterController::class, 'checkNokp'])->name('check-nokp');

// Applying middleware
Route::middleware('auth')->group(function () {
    // Protected routes here
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // Route for handling and displaying the edit form of daftar blade
    Route::post('/daftar/update', [DaftarController::class, 'update'])->name('daftar.update');
    Route::match(['GET', 'POST'], '/daftar', [DaftarController::class, 'edit'])->name('daftar'); // Make it handle both GET (view) and POST (create, edit, and store) method

    //Route tanahindex blade
    Route::get('/tanah/{id}/edit', [TanahController::class, 'edit'])->name('edit-tanah');
    Route::get('/tanahindex', [TanahController::class, 'index'])->name('tanahindex'); // Define the tanahindex route with the TanahController's index method
    Route::get('/tanah/{id}/delete', [TanahController::class, 'delete'])->name('tanah.delete');

    //Route senaraitanah blade
    Route::post('/senaraitanah/store', [TanahController::class, 'store'])->name('senaraitanah.store');
    Route::get('/senaraitanah', [TanahController::class, 'index2'])->name('senaraitanah'); // Define the tanahindex route with the TanahController's index method
    Route::get('/senaraitanah/change-date/{id}', [TuntutanController::class, 'changeDate'])->name('tanah.changeDate');//for ptundaf to be able to read tuntutan user

    Route::get('/get-latest-table-id', [TanahController::class, 'getLatestTableId']);//retrieve the latest table id

    //Route ptundaf blade
    Route::get('/ptundaf', [TuntutanController::class, 'index'])->name('ptundaf');
    // Route::get('/ptundaf3', [TuntutanController::class, 'index'])->name('ptundaf3');

      // Define the route for displaying the search form (GET request)
Route::get('/carian ', [TuntutanController::class, 'showSearchForm'])->name('carian');

Route::get('/tanah/{table_id}', [TuntutanController::class, 'showTanah'])->name('ptundaf2');
Route::post('/tuntutan', [TuntutanController::class, 'storeTuntutan'])->name('tuntutan.store');


// Define the route for handling the search request (POST request)
Route::match(['GET', 'POST'], '/carian', [TuntutanController::class, 'search'])->name('carian');

    Route::post('/upload', [TanahController::class, 'upload'])->name('upload');


});

Auth::routes();

// New User Registration
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);
Route::get('/refresh-math-captcha', [RegisterController::class, 'refreshMathCaptcha'])->name('refresh.math.captcha');

// Password Setting
Route::get('set-password', [SetPasswordController::class, 'showSetPasswordForm'])->name('set.password');
Route::post('set-password', [SetPasswordController::class, 'setPassword']);

// Password Reset
Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');

// Subsidi Daftar Form Page
Route::get('/pet_cetak', [DaftarController::class, 'showPetCetakForm'])->name('pet_cetak');




