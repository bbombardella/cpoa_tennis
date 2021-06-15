<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\Tournois;
use App\Models\Statut;
use App\Models\Joueur;

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
        if($tournois) {
            return view('tournois/show')->with('data', [
                'tournois' =>$tournois,
                'statut' => $statut,
                'generate' => true,
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
        $singleElimination = [
            $teams = [              // Matchups
              ["Team 1", "Team 2"], // First match
              ["Team 3", "Team 4"]  // Second match
            ],
            $results = [            // List of brackets (single elimination, so only one bracket)
              [                     // List of rounds in bracket
                [                   // First round in this bracket
                  [1, 2],           // Team 1 vs Team 2
                  [3, 4]            // Team 3 vs Team 4
                ],
                [                   // Second (final) round in single elimination bracket
                  [5, 6],           // Match for first place
                  [7, 8]            // Match for 3rd place
                ]
              ]
            ]
                ];
        if($tournois) {
            return view('tournois/modalArbre')->with('data', [
                'tournois' =>$tournois,
                'statut' => $statut,
                'generate' => true,
                'affichage'=>$singleElimination,
            ]);
        } else {
            abort(404, 'tournoi non trouvé !');
        }
    }

    public function createPlayer(int $id_tournois){
        $tournois = Tournois::find($id_tournois);
        $player = Joueur::all();
        $statuts = Statut::all();
        $joueur_tournoi = $tournois->joueur;
        if(count($joueur_tournoi)>0)
        {
            $player=$player->diff($joueur_tournoi);
        }
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
}
