<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JoueurController;
use App\Http\Controllers\TournoisController;
use App\Models\Joueur;
use App\Models\Tournois;

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

Route::get('/joueurs/create', function () {
    $joueurs = Joueur::all();
    return view('joueurs/modal')->with('joueurs', $joueurs);
})->middleware(['auth'])->name('modal');

Route::post('/joueurs/create', [JoueurController::class, 'store'])
->middleware('auth')->name('joueurs/create');

Route::get('/joueurs/{id}', [JoueurController::class, 'show']);


    //-- Route Tournois
Route::get('/tournois', [TournoisController::class, 'index'])->middleware(['auth'])->name('tournois');

Route::get('/tournois/create', function() {
    $tournois= Tournois::all();
    return view('tournois/modal')->with('tournois', $tournois);
})->middleware(['auth'])->name('tournois/create');

Route::post('/tournois/create', [TournoisController::class, 'store'])
->middleware('auth')->name('tournois/create');

Route::get('/tournois/{id}', [TournoisController::class, 'show']);



Route::get('/recherche', function () {
    return view('recherche');
})->middleware(['auth'])->name('recherche');

require __DIR__.'/auth.php';
