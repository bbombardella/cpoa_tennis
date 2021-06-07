<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Joueur;

class JoueurController extends Controller
{
    /**
     * Show all the Joueur in the database.
     */
    public function index()
    {
        $joueurs = Joueur::all();

        return view('joueurs/list')->with('joueurs', $joueurs);

    }

    public function show($id) {
        $joueur = Joueur::find($id);
        if($joueur) {
            return view('joueurs/show')->with('joueur', $joueur);
        } else {
            abort(404, 'Joueur non trouvé !');
        }
    }

    public function create() {
        $joueurs = Joueur::all();
        return view('joueurs/modal')->with('joueurs', $joueurs);
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
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'niveau' => 'required|string',
            'club' => 'required|string'
        ]);
        
        $joueur = Joueur::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'niveau' => $request->niveau,
            'club' => $request->club,
        ]);

        $joueur->save();

        return redirect()->route('joueurs')->with('successMsg', 'Joueur ajouté avec succès !');

    }       
}
