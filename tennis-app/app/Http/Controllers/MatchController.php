<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Match;
use App\Models\Tour;
use App\Models\Tournois;
use App\Models\ResultatMatch;
use App\Models\Statut;
use App\Models\Joueur;

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

    public function show($id_tournoi, $id_tour, $id_match) {
        $match = Match::find($id_match);
        if($resultat = ResultatMatch::find($id_match)!=null){
            return view('match/show')->with('data', [
                'id_tournois'=>$id_tournoi,
                'match'=>$match,
                'id_tour'=>$id_tour,
                'resultats'=> $resultats,
            ]);
        }
        return view('match/show')->with('data', [
            'id_tournois'=>$id_tournoi,
            'match'=>$match,
            'id_tour'=>$id_tour,
        ]);
    }

    public function create($id_tournois, $id_tour){
        
        $tournoi = Tournois::find($id_tournois);
        $joueurs = $tournoi->joueur;
        $tour = Tour::find($id_tour);
        $matchs = Match::where('idTour', $id_tour)->get();
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
        $match = Match::where('idTour', $id_tour)->get();
        $nbmatch = $match->max('numeroDeMatch');
        $id_statut = (Statut::where('nom', 'En attente')->first())->id;
        $joueur1 = Joueur::find($request->joueur_1);
        $joueur2 = Joueur::find($request->joueur_2);
        $match = Match::create([
            'numeroDeMatch' => $nbmatch+1,
            'idTour'=> $id_tour,
            'idStatut' => $id_statut,
        ]);
        dump([$joueur1, $joueur2]);
        $match->joueur_un()->associate($joueur1);
        $match->joueur_deux()->associate($joueur2);
        $match->save();
        return redirect('/tournois/'.$id_tournoi.'/tour/'.$id_tour.'/match')->with('succesMsg', 'Match crée avec succès');
    }

    public function storePlayer(Request $request, $id_tournoi, $id_tour, $id_match){
        $match = Match::find($id_match);
        $match->joueur1 = $request->joueur_1;
        $match->joueur2 = $request->joueur_2;
        $match->save();
    }
    
    public function saisieResultat($id_tournois, $id_tour, $id_match) {
        $match = Match::find($id_match);
        $tournoi = Tournois::find($id_tournois);
        $tour = Tour::find($id_tour);
        $matchs = Match::where('idTour', $id_tour)->get();
        return view('match/modalResultat')->with('data', [
            'id_tournois' => $id_tournois,
            'id_tour' => $id_tour,
            'id_match' => $id_match,
            'tour' => $tour,
            'matchs' => $matchs,
            'match' => $match,
        ]);
    }

    public function enregistrementResultat(Request $request, $id_tournois, $id_tour, $id_match) {
        /*$request->validate([
            'score1' => 'required|string|int',
            'score2' => 'required|string|int'
        ]);*/

        $match = Match::find($id_match);

        //si joueur 1 est gagnant
        if($request->score1 > $request->score2) {
            $resultat = ResultatMatch::create([
                'idMatch' => $id_match,
                'gagnant' => $match->joueur_un->id,
                'perdant' => $match->joueur_deux->id,
                'score_gagnant' => $request->score1,
                'score_perdant' => $request->score2
            ]);
        } else {
            $resultat = ResultatMatch::create([
                'idMatch' => $id_match,
                'gagnant' => $match->joueur_deux->id,
                'perdant' => $match->joueur_un->id,
                'score_gagnant' => $request->score2,
                'score_perdant' => $request->score1
            ]);
        }
        
        $resultat->save();

        return redirect("tournois/$id_tournois/tour/$id_tour/match")->with('successMsg', 'Résultats saisies avec succès !');
    }

    public function delete($id_tour, $id_match) {
        $match = Match::remove($id_match);
    }
}
