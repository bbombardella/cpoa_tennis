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
        return $matchs;
    }

    public function create($id_tournois, $id_tour){
        $tournoi = Tournoi::find($id_tournois);
        $joueurs = $tournoi->joueur;
        $tour = Tour::find($id_tour);
        return view('match/modalCreateMatch')->with('data', [
            'joueurs' => $joueurs,
            'tournois' => $tournoi,
            'tour' => $tour
        ])
    }

    public function store(Request $request, $id_tournoi, $id_tour){
        $tournoi = Tournoi::find($id_tournoi);
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
}
