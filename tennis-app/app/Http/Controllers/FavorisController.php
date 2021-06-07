<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class FavorisController extends Controller
{
    public function add($id) {
        Auth::user()->joueur()->attach($id);

        return Redirect::back()->with('successMsg', 'Joueur ajouté aux favoris !');
    }

    public function remove($id) {
        Auth::user()->joueur()->detach($id);

        return Redirect::back()->with('successMsg', 'Joueur retiré des favoris !');
    }
}
