<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\Tournois;
use App\Models\Statut;
use App\Models\Joueur;
use App\Models\Tour;
use App\Models\Match;

use function App\Models\statut;

class TournoisController extends Controller
{
    /**
     * Show all the Tournoi in the database.
     */
    public function index()
    {
        $tournois = Tournois::all();
        
        $statut=[];
        foreach ($tournois as $tournoi){
            array_push($statut, Statut::find($tournoi->idStatut));
        }
        
        return view('tournois/list')->with('data', [
            'tournois' => $tournois,
            'statut'=>$statut
        ]);

    }

    public function show($id) {
        $tournois = Tournois::find($id);
        $statut = Statut::find($tournois->idStatut);
        $tours = Tour::all();
        if (count($tours->where('idTournois',$tournois->id))){
            $generate=false;

        }else{
            $generate=false;
        }
        if($tournois) {
            return view('tournois/show')->with('data', [
                'tournois' =>$tournois,
                'statut' => $statut,
                'generate' => $generate,
                'tour' => $tours,
            ]);
        } else {
            abort(404, 'tournoi non trouvé !');
        }
    }

    public function create() {
        $tournois= Tournois::all();
        $statuts = Statut::all();
        $statut=[];
        foreach ($tournois as $tournoi){
            array_push($statut, Statut::find($tournoi->idStatut));
        }
        return view('tournois/modal')->with('data', [
            'tournois' => $tournois,
            'statut' => $statut,
            'statuts' => $statuts
        ]);
    }

    public function arbre($id){
        $tournois = Tournois::find($id);
        $statut = Statut::find($tournois->idStatut);
        $tours = Tour::all();
        if (count($tours->where('idTournois',$tournois->id))){
            $generate=true;

        }else{
            $generate=false;
        }
        $toursselect=$tours->where('idTournois',$tournois->id);
        $matchs = Match::all();
        $matchselect=[];
        foreach ($toursselect as $tours){
            array_push($matchselect,$matchs->where('idTour', $tours->id));
        }
        if($tournois) {
            return view('tournois/modalArbre')->with('data', [
                'tournois' =>$tournois,
                'statut' => $statut,
                'generate' => $generate,
                'tour' => $toursselect,
                'match' => $matchs,
            ]);
        } else {
            abort(404, 'tournoi non trouvé !');
        }
    }

    public function createPlayer(int $id_tournois){
        $tournois = Tournois::find($id_tournois);
        $player = Joueur::all();
        //$statuts = Statut::all();
        $joueur_tournoi = $tournois->joueur;

        $statut = Statut::find($tournois->idStatut);
        $tours = Tour::all();
        if (count($tours->where('idTournois',$tournois->id))){
            $generate=true;

        }else{
            $generate=false;
        }

        if(count($joueur_tournoi)>0)
        {
            $player=$player->diff($joueur_tournoi);
        }
        return view('tournois/modalAddPlayer') ->with('data', [
            'tournois' => $tournois,
            'joueurs' => $player,
            //'statuts' => $statuts,
            'joueur_tournoi' => $joueur_tournoi,
            'statut' => $statut,
            'generate' => $generate,

        ]);
    }

    public function removePlayer(Request $request, int $id_tournois){
        $tournoi = Tournois::find($id_tournois);
        foreach($request->joueur as $idPlayer) {
            $tournoi->joueur()->detach($idPlayer);
            $tournoi->save();
        }

        return redirect("/tournois/$id_tournois/joueurs/associate")->with('successMsg', 'Joueur.euse.s retiré.e.s avec succès !');
    }

    public function storePlayer(Request $request, int $id_tournois) {
        /*$request->validate([
            'idPlayer' => 'required|string|int'
        ]);*/

        $tournoi = Tournois::find($id_tournois);
        $joueur = Joueur::all();
        foreach($request->joueur as $idPlayer) {
            $tournoi->joueur()->attach($idPlayer);
            $tournoi->save();
        }
       return redirect("/tournois/$id_tournois/joueurs/associate")->with('successMsg', 'Joueurs ajouté.e.s avec succès !');
    }

    public function listPlayer(int $id_tournois) {
        $tournois = Tournois::find($id_tournois);
        return view('tournois/listPlayer')->with('data', [
            'tournois' => $tournois
        ]);
    }

    /**
     * Store a new flight in the database.
     *
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'lieu' => 'required|string',
            'date' => 'required|Date',
            'idStatut' => 'required|int'
        ]);

        $tournois= Tournois::create([            
            'lieu' => $request->lieu,
            'date' => $request->date,
            'idStatut' => $request->idStatut
        ]);

        $tournois->save();

        return redirect("/tournois")->with('successMsg', 'Tournoi créé avec succès !');
    }

    public function formChangeState($id_tournois) {
        $tournois = Tournois::find($id_tournois);
        $statut = Statut::find($tournois->idStatut);
        $statuts = Statut::all();
        if($tournois) {
            return view('tournois/modalChangeState')->with('data', [
                'tournois' =>$tournois,
                'statut' => $statut,
                'statuts' => $statuts
            ]);
        } else {
            abort(404, 'tournoi non trouvé !');
        }
    }
    
    public function changeState(Request $request, int $id_tournois){
        $tournoi=Tournois::find($id_tournois);

        $request->validate([
            'idStatut' => 'required|string|integer'
        ]);

        $tournoi->idStatut=$request->idStatut;
        $tournoi->save();

        return redirect("/tournois/$id_tournois");
    }

    /**
     * Generate a tournament
     */
    public function generateTournament($id_tournois){
        $tournoi = Tournois::find($id_tournois);
        $joueurs = count($tournoi->joueur);

        //ici on va créer les tours
        $nombre_tours=intval(log($joueurs)/log(2));
        $test=Tour::where('idTournois',$id_tournois)->get();
        if($nombre_tours==0 || 2**$nombre_tours!=$joueurs){
            return redirect("tournois/$id_tournois")->with('errorMsg', "Le tournois n'a pas pu être créé, le nombre de joueur doit être une puissance de 2");
        }else{
            if($nombre_tours-count($test)!=0){
                for($i=0;$i<$nombre_tours;$i++){    
                    $id_statut = (Statut::where('nom', 'En attente')->first())->id;
                    $tour = Tour::create([
                        'numeroDuTour' => $i+1,
                        'idStatut' => $id_statut,
                        'idTournois' => $id_tournois,
                    ]);
                    $tour->save();
                    $num_tour=$tour->numeroDuTour;
                    $nb_joueurs=$joueurs/(pow(2,($num_tour-1)));
                    for($j=0;$j<$nb_joueurs/2;$j++){
                        $match = Match::create([
                            'numeroDeMatch'=> $j+1,
                            'idTour' => $tour->id,
                            'idStatut' => $id_statut
                        ]); 
                        $match->save();               
                    }
                }
            }
            $tour_1= Tour::where('numeroDuTour',1)->where('idTournois',$id_tournois)->first();
            $matchs = Match::where('idTour',$tour_1->id)->get();
            $joueurs=$tournoi->joueur;
            foreach($matchs as $match){
                $match->joueur1()->associate($joueurs->random());
                $match->save();
                $joueurs=$joueurs->diff($match->joueur1());
                $match->joueur2()->associate($joueurs->random());
                $match->save();
                $joueurs=$joueurs->diff($match->joueur2());                
            }
            return redirect("tournois/$id_tournois")->with('successMsg', 'Tours créés avec succès !');
        }
    }
}