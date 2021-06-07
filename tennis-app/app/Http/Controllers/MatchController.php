<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Match;

class MatchController extends Controller
{
    public function show($id_tour) {
        Match::with('idTour', $id_tour)->get();
    }
}
