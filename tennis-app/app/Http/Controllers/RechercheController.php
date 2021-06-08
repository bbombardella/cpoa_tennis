<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RechercheController extends Controller
{
    public function search (Request $request)
    {
        $search = $request->item_search;
        $type = $request->search;

        if ($type === 'Joueurs'){
            $result = DB::table('joueur')
            ->select ('id','nom','prenom') 
            ->where ('nom', 'like', $search)
            ->orWhere ('prenom', 'like', $search)
            ->get();
            if($result) {
                return view('recherche/recherche')->with('joueurs', $result);
            } else {
                abort(404, 'Joueur non trouvé !');
            }
        } else {
            $result = DB::table('tournois')
            ->select ('id','lieu') 
            ->where ('lieu', 'like', $search)
            ->get();
            if($result) {
                return view('recherche/recherche')->with('tournois', $result);
            } else {
                abort(404, 'Tournois non trouvé !');
            }
        }
    }

}
