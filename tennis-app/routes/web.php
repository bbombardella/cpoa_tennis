<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JoueurController;
use App\Http\Controllers\TournoisController;
use App\Http\Controllers\RechercheController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\MatchController;
use App\Http\Controllers\FavorisController;
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
Route::get('/joueurs/create', [JoueurController::class, 'create'])->middleware(['auth'])->name('modal');
Route::post('/joueurs/create', [JoueurController::class, 'store'])->middleware('auth')->name('joueurs/create');
Route::post('/joueurs/favoris/add/{id}', [FavorisController::class, 'add'])->middleware('auth')->name('joueurs/favoris');
Route::post('/joueurs/favoris/remove/{id}',[FavorisController::class, 'remove'])->middleware('auth')->name('joueurs/favoris');
Route::get('/joueurs/{id}', [JoueurController::class, 'show'])->middleware('auth')->name('joueurs/favoris');

    //-- Route Tournois
Route::get('/tournois', [TournoisController::class, 'index'])->middleware(['auth'])->name('tournois');
Route::get('/tournois/create', [TournoisController::class, 'create'])->middleware(['auth'])->name('tournois/create');
Route::post('/tournois/create', [TournoisController::class, 'store'])->middleware('auth')->name('tournois/create');
Route::get('/tournois/{id_tournois}/joueurs', [TournoisController::class, 'listPlayer']);
Route::get('/tournois/{id_tournois}/joueurs/associate', [TournoisController::class, 'createPlayer'])->name('tournois/associate');
Route::post('/tournois/{id_tournois}/joueurs/associate', [TournoisController::class, 'storeplayer']);
Route::get('/tournois/{id}', [TournoisController::class, 'show']);


Route::get('/tournois/{id_tournois}/tour', [TourController::class, 'index']);
Route::get('/tournois/{id_tournois}/tour/{id_tour}', [TourController::class, 'show']);
Route::get('/tournois/{id_tournois}/tour/create', [TourController::class, 'create']);
Route::post('/tournois/{id_tournois}/tour/create', [TourController::class, 'store']);

Route::get('/tour/{id_tour}/match', [MatchController::class, 'index']);
Route::get('/tour/{id_tour}/match/{id_match}', [MatchController::class, 'show']);
Route::get('/tour/{id_tour}/match/create', [MatchController::class, 'create']);
Route::post('/tour/{id_tour}/match/create', [MatchController::class, 'store']);

Route::get('/recherche', function () {
    return view('recherche/recherche');
})->middleware(['auth'])->name('recherche');

Route::post('/recherche', [RechercheController::class, 'search'])
->middleware(['auth'])->name('recherche');

require __DIR__.'/auth.php';
