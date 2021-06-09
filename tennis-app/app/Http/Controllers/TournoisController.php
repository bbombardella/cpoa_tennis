<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\Tournois;
use App\Models\Statut;
use App\Models\Joueur;

class TournoisController extends Controller
{
    /**
     * Show all the Tournoi in the database.
     */
    public function index()
    {
        $tournois = Tournois::all();

        return view('tournois/list')->with('data', [
            'tournois' => $tournois
        ]);

    }

    public function show($lieu) {
        $tournois = Tournois::find($lieu);
        if($tournois) {
            return view('tournois/show')->with('tournoi', $tournois);
        } else {
            abort(404, 'tournoi non trouvé !');
        }
    }

    public function create() {
        $tournois= Tournois::all();
        $statuts = Statut::all();
        return view('tournois/modal')->with('data', [
            'tournois' => $tournois,
            'statuts' => $statuts
        ]);
    }

    public function createPlayer(int $id_tournois){
        $tournois = Tournois::find($id_tournois);
        $player = Joueur::all();
        $statuts = Statut::all();
        $joueur_tournoi = $tournois->joueur;
        return view('tournois/modalAddPlayer') ->with('data', [
            'tournois' => $tournois,
            'joueurs' => $player,
            'statuts' => $statuts,
            'joueur_tournoi' => $joueur_tournoi,
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
        foreach($request->joueur as $idPlayer) {
            $player = Joueur::find($idPlayer);
            if($tournoi->joueur->isEmpty()){
            $tournoi->joueur()->attach($idPlayer);
            $tournoi->save();
            }
        }
        
       return redirect("/tournois/$id_tournois/joueurs")->with('successMsg', 'Joueurs ajouté.e.s avec succès !');
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
}
