<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Match;

class MatchController extends Controller
{
    public function index($id_tour) {
        $matchs = Match::with('idTour', $id_tour)->get();
        return view('match/list')->with('data', [
            'id_tour' => $id_tour,
            'matchs' => $matchs
        ]);
    }

    public function show($id_tour, $id_match) {
        $match = Match::find($id_match);
        $resultat = ResultatMatch::find($id_match);
        return $matchs;
    }

    public function saisieResultat($id_tour, $id_match) {

    }

    public function enregistrementResultat(Request $request, $id_tour, $id_match) {
        $request->validate([
            'score1' => 'required|string|int',
            'gagnant' => 'required|string|int',
            'score1' => 'required|string|int',
            'score2' => 'required|string|int'
        ]);

        $tournoi = Tournois::find($id_tournois);
        $joueur = Joueur::all();
        foreach($request->joueur as $idPlayer) {
            $tournoi->joueur()->attach($idPlayer);
            $tournoi->save();
        }
    }

    public function delete($id_tour, $id_match) {
        $match = Match::remove($id_match);
    }
}
