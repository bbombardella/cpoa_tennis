<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Joueur;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FavorisController extends Controller
{
    public function add($id) {
        Auth::user()->joueur()->attach($id);

        return view('joueurs/show')->with('successMsg', 'Joueur ajouté aux favoris !');
    }

    public function remove($id) {
        $id_user = Auth::user()->id;
    }
}
