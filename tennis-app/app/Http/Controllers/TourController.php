<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tour;
use App\Models\Tournois;
use App\Models\Statut;

class TourController extends Controller
{
    public function index($id_tournois) {
        $tournois = Tournois::find($id_tournois);
        if(!$tournois) {
            abort(404);
        }
        $tours = Tour::where('idTournois', $id_tournois)->get();
        $nb_joueurs = count($tournois->joueur);
        $enough_player = ((($nb_joueurs-1) & $nb_joueurs)==0 && $nb_joueurs!=0);
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

    public function store(Request $request, int $id_tournois) {
        $tournois = Tournois::find($id_tournois);
        if(!$tournois) {
            abort(404);
        }
        $tours = Tour::where('idTournois', $id_tournois)->get();
        $nb_joueurs = count($tournois->joueur);
        $enough_player = ((($nb_joueurs-1) & $nb_joueurs)==0 && $nb_joueurs!=0);
        $nb_tours = ($nb_joueurs)/2;
        $nb_tours_dispo = $nb_tours - count($tours);
        if($enough_player && $nb_tours_dispo>0) {
            $request->validate([
                'idStatut' => 'required|int'
            ]);

            $tour = Tour::create([
                'numeroDuTour' => count($tours)+1,
                'idStatut' => $request->idStatut,
                'idTournois' => $id_tournois
            ]);
            $tour->save();
            return redirect()->route("tournois_tour", $id_tournois)->with('successMsg', 'Le tour '.$tour->numeroDeTour.' a bien été ajouté !');
        }
        return redirect()->url("tournois/$id_tournois/tour")->with('errorMsg', 'Le tour n\'a pas pu être crée.');
    }

    public function create($id_tournois) {
        $tournois = Tournois::find($id_tournois);
        if(!$tournois) {
            abort(404);
        }
        $tours = Tour::where('idTournois', $id_tournois)->get();
        $nb_joueurs = count($tournois->joueur);
        $enough_player = ((($nb_joueurs-1) & $nb_joueurs)==0 && $nb_joueurs!=0);
        $nb_tours = ($nb_joueurs)/2;
        $nb_tours_dispo = $nb_tours - count($tours);
        $statuts = Statut::all();
        return view('tour/modal')->with('data', [
            'tournois' => $tournois,
            'nb_joueurs' => $nb_joueurs,
            'enough_player' => $enough_player,
            'tours' => $tours,
            'nb_tours_dispo' => $nb_tours_dispo,
            'nb_tours_now' => count($tours)+1,
            'statuts' => $statuts
        ]);
    }

    public function delete($id_tournois, $id_tour) {
        $tour = Tour::find($id_tour);
        if(!$tour) {
            abort(404);
        }
        $tour->delete();
    }
}
