<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class GenerationController extends Controller
{
    /**
     * Generate a tournament
     */
    public function index($id_tournois){
        $tournoi = Tournoi::find($id_tournois);
        $joueurs = Joueur::find($tournoi->joueur);
        $idStatut = Status::find($)
        //ici on va créer les tours
        $nb_tour=count($joueurs);
        $nb_tour=($nb_tour/2)-1
        for(i=0;i<$nb_tour;i++){
            $tour = Tour::create([
                'numeroDuTour' => count($tours)+1,
                'idStatut' => 'En attente',
                'idTournois' => $id_tournois
            ]);
            $tour->save();
        }
    }
}