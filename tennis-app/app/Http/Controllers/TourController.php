<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tour;
use App\Models\Tournois;

class TourController extends Controller
{
    public function index($id_tournois) {
        $tournois = Tournois::find($id_tournois);
        if(!$tournois) {
            abort(404);
        }
        $tours = Tour::where('idTournois', $id_tournois)->get();
        $enough_player = (((count($tournois->joueur)-1) & count($tournois->joueur))==0 && count($tournois->joueur)!=0);
        $nb_joueurs = count($tournois->joueur);
        $nb_tours = ($nb_joueurs)/2;
        $nb_tours_dispo = $nb_tours - count($tours);
        return view('tour/list')->with('data', [
            'tournois' => $tournois,
            'nb_joueurs' => $nb_joueurs,
            'enough_player' => $enough_player,
            'tours' => $tours,
            'nb_tours_dispo' => $nb_tours_dispo
        ]);
    }

    public function show($id_tournois, $id_tour) {
        $tour = Tour::find($id_tour);
        return view('tour/show')->with('data', [
            "id_tournois" => $id_tournois,
            "tour" => $tour
        ]);
    }

    public function store() {
        //
    }

    public function create() {
        return view('tour/modal');
    }

    public function delete() {
        //
    }
}
