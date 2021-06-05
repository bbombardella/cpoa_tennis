<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JoueurController;
use App\Models\Joueur;

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

Route::get('/joueurs', [JoueurController::class, 'index'])->middleware(['auth'])->name('joueurs');

Route::get('/tournois', function () {
    return view('tournois');
})->middleware(['auth'])->name('tournois');

Route::get('/recherche', function () {
    return view('recherche');
})->middleware(['auth'])->name('recherche');

Route::get('/joueurs/create', function () {
    $joueurs = Joueur::all();
    return view('modal_joueur')->with('joueurs', $joueurs);
})->middleware(['auth'])->name('modal');

Route::post('/joueurs/create', [JoueurController::class, 'store'])
->middleware('auth')->name('joueurs/create');

require __DIR__.'/auth.php';
