<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Joueur;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class FavorisController extends Controller
{
    public function add($id) {
        Auth::user()->joueur()->attach($id);

        return Redirect::back()->with('successMsg', 'Joueur ajouté aux favoris !');
    }

    public function remove($id) {
        $id_user = Auth::user()->id;
    }
}
