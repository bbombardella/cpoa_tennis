<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Match;

class MatchController extends Controller
{
    public function index($id_tour) {
        $matchs = Match::with('idTour', $id_tour)->get();
        return $matchs;
    }

    public function show($id_tour, $id_match) {
        $match = Match::find($id_match);
        return $matchs;
    }
}
