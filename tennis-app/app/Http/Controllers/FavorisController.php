<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favoris;

class FavorisController extends Controller
{
    public function add($id) {
        $id_user = Auth::user()->id;
        $favoris = Favoris::create([
            'idJoueur' => $id,
            'idUser' => $id_user,
        ]);

        $favoris->save();

        return return view('joueurs/show')->with('joueur', $joueur)->with('successMsg', 'Joueur ajouté aux favoris !');
    }

    public function remove($id) {
        $id_user = Auth::user()->id;
    }
}
