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
        return view('tour/list')->with('data', [
            'tournois' => $tournois,
            'enough_player' => $enough_player,
            'tours' => $tours
        ]);
    }

    public function show($id_tournois, $id_tour) {
        $tour = Tour::find($id_tour);
        return view('tour/show')->with('tour', $tour);
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
