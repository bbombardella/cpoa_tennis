<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tour;
use App\Models\Tournois;

class TourController extends Controller
{
    public function index($id_tournois) {
        if(!Tournois::find($id_tournois)) {
            abort(404);
        }
        $tours = Tour::with('idTournois', $id_tournois);
        return view('tour/list')->with('data', [
            'id_tournois' => $id_tournois,
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
