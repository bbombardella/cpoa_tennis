<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
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
        $player = Joueurs::all();
        return view('tournois/modalAddPlayer') ->with('data', [
            'joueurs' => $player,
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
        /*
        $request->validate([
            'lieu' => 'required|string',
            'date' => 'required|Date',
            'etat' => 'required|int'
        ]);*/
        $tournois= ([            
            'lieu' => $request->lieu,
            'date' => $request->date,
            'idStatut' => $request->idStatut
        ]);

        //$tournois->save();
        $id = DB::table('Tournois')->insertGetId($tournois);
        return redirect("/tournois/$id/joueurs/associate");//->with('successMsg', 'Tournoi créé avec succès !');

    }       
}
