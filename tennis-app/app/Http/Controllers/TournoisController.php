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

    public function createPlayer(){
        $tournois = Tournois::all();
        $player = Joueur::all();
        $statuts = Statut::all();
        return view('tournois/modalAddPlayer') ->with('data', [
            'tournois' => $tournois,
            'joueurs' => $player,
            'statuts' => $statuts
        ]);
    }

    public function storePlayer(Request $request, int $id_tournois) {
        $request->validate([
            'idPlayer' => 'required|string|int'
        ]);

        $tournoi = Tournois::find($id_tournois);
        $tournoi->joueur()->attach($request->idPlayer);

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

        return Redirect::back()->with('successMsg', 'Tournoi créé avec succès !');
    }       
}
