<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Match;
use App\Models\Tour;
use App\Models\Tournois;

class MatchController extends Controller
{
    public function index($id_tournois, $id_tour) {
        $tournoi = Tournois::find($id_tournois);
        $tour = Tour::find($id_tour);
        $matchs = Match::where('idTour', $id_tour)->get();
        
        return view('match/list')->with('data', [
            'id_tournois' => $id_tournois,
            'id_tour' => $id_tour,
            'tour' => $tour,
            'matchs' => $matchs,
        ]);
    }

    public function show($id_tour, $id_match) {
        $match = Match::find($id_match);
        $resultat = ResultatMatch::find($id_match);
        return $matchs;
    }

    public function create($id_tournois, $id_tour){
        $tournoi = Tournois::find($id_tournois);
        $joueurs = $tournoi->joueur;
        $tour = Tour::find($id_tour);
        $matchs = Match::where('idTour', $id_tour)->get();
        var_dump($matchs);
        return view('match/modalCreateMatch') -> with('data', [
            'joueurs' => $joueurs,
            'tournois' => $tournoi,
            'id_tournois' => $id_tournois,
            'id_tour' => $id_tour,
            'tour' => $tour,
            'matchs' => $matchs,
        ]);
    }

    public function store(Request $request, $id_tournoi, $id_tour){
        $tournoi = Tournois::find($id_tournoi);
        $nbmatch = count(Tour::where('id', $id_tour)->tournoi->match);
        var_dump($nbmatch);
        $id_statut = (Statut::where('nom', 'En attente')->first())->id;
        $match = Match::create([
            'numeroDeTour' => $nbmatch+1,
            'idTour'=> $id_tour,
            'idStatut' => $id_statut,
        ]);
        $match->save();
    }
    
    public function saisieResultat($id_tour, $id_match) {

    }

    public function enregistrementResultat(Request $request, $id_tour, $id_match) {
        $request->validate([
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
