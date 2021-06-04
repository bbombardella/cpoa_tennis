<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Joueur;

class JoueurController extends Controller
{
    public function create()
    {
        return view('joueurs');
    } 
    
    /**
     * Store a new flight in the database.
     *
     * @param  \Illuminate\Http\Request  $request
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

    }       
}
