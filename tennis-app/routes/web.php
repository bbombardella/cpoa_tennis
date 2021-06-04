<?php

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

Route::get('/joueurs', function () {
    return view('joueurs');
})->middleware(['auth'])->name('joueurs');

Route::get('/tournois', function () {
    return view('tournois');
})->middleware(['auth'])->name('tournois');

Route::get('/recherche', function () {
    return view('recherche');
})->middleware(['auth'])->name('recherche');

Route::get('/modal', function () {
    return view('modal');
})->middleware(['auth'])->name('joueurs2');

require __DIR__.'/auth.php';
