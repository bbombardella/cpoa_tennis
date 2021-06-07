<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JoueurController;
use App\Http\Controllers\TourController;

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
Route::post('/joueurs/create', [JoueurController::class, 'store'])
->middleware('auth')->name('joueurs/create');
Route::get('/joueurs/{id}', [JoueurController::class, 'show']);

Route::get('/tournois/{id_tournois}/tour', [TourController::class, 'index']);
Route::get('/tournois/{id_tournois}/tour/{id_tour}', [TourController::class, 'show']);
Route::get('/tournois/{id_tournois}/tour/create', [TourController::class, 'create']);
Route::post('/tournois/{id_tournois}/tour/create', [TourController::class, 'store']);

Route::get('/tournois', function () {
    return view('tournois');
})->middleware(['auth'])->name('tournois');

Route::get('/tour/{id_tour}/match', [MatchController::class, 'index']);
Route::get('/tour/{id_tour}/match/{id_match}', [MatchController::class, 'show']);
Route::get('/tour/{id_tour}/match/create', [MatchController::class, 'create']);
Route::post('/tour/{id_tour}/match/create', [MatchController::class, 'store']);

Route::get('/recherche', function () {
    return view('recherche');
})->middleware(['auth'])->name('recherche');

require __DIR__.'/auth.php';
