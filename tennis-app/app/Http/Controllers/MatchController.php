<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Match;
use App\Models\ResultatMatch;

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
        $match = Match::find($id_match);
        $joueurs = [$match->joueur_un, $match->joueur_deux];
        return view('match/modalResultat')->with('data', [
            'id_tour' => $id_tour,
            'id_match' => $id_match,
            'match' => $match,
            'joueurs' => $joueurs
        ]);
    }

    public function enregistrementResultat(Request $request, $id_tour, $id_match) {
        $request->validate([
            'gagnant' => 'required|string|int',
            'score1' => 'required|string|int',
            'score2' => 'required|string|int'
        ]);

        $match = Match::find($id_tour);

        //si joueur 1 est gagnant
        if($request->score1 > $request->score2) {
            $resultat = ResultatMatch::create([
                'idMatch' => $id_match,
                'gagnant' => $match->joueur_un->id,
                'scoreGagnant' => $request->score1,
                'scorePerdant' => $request->score2
            ]);
        } else {
            $resultat = ResultatMatch::create([
                'idMatch' => $id_match,
                'gagnant' => $match->joueur_deux->id,
                'scoreGagnant' => $request->score2,
                'scorePerdant' => $request->score1
            ]);
        }
        
        $resultat->save();

        return redirect("tour/$id_tour/match/$id_match")->with('successMsg', 'Résultats saisies avec succès !');
    }

    public function delete($id_tour, $id_match) {
        $match = Match::remove($id_match);
    }
}
