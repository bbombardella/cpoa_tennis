<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Joueur;
use Favoris;
use Illuminate\Support\Facades\Auth;

class JoueurController extends Controller
{
    /**
     * Show all the Joueur in the database.
     */
    public function index()
    {
        $joueurs = Joueur::all();
        $user = Auth::user();
        if($user) {
            $favoris = $user->joueur;
            if(count($favoris)>0) {
                $joueurs=$joueurs->diff($favoris);
            }
        }
        return view('joueurs/list')->with('data', [
            'joueurs' => $joueurs,
            'favoris' => $favoris
        ]);

    }

    public function show($id) {
        $joueur = Joueur::find($id);
        $user = Auth::user();
        if($user) {
            $favs = $user->joueur;
        }
        $favoris=FALSE;

        foreach($favs as $fav){
            if ($fav->id == $id){
                $favoris=TRUE;
            }
        }

        if($joueur) {
            return view('joueurs/show')->with('data', [
                'joueur'=> $joueur,
                'favoris' => $favoris,
            ]);
        } else {
            abort(404, 'Joueur non trouvé !');
        }
    }

    public function create() {
        $joueurs = Joueur::all();
        $user = Auth::user();
        if($user) {
            $favoris = $user->joueur;
        }
        return view('joueurs/modal')->with('data', [
            'joueurs' => $joueurs,
            'favoris' => $favoris
        ]);
    }

    public function edit($id) {
        $joueur = Joueur::find($id);
        $user = Auth::user();
        if($user) {
            $favoris = $user->joueur;
        }
        return view('joueurs/modal_edit')->with('data', [
            'joueur' => $joueur,
            'favoris' => $favoris
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
    
    public function store_edit($id ,Request $request)
    {
        $request->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'niveau' => 'required|string',
            'club' => 'required|string'
        ]);
        
        $joueur =Joueur::find($id);
        $joueur->nom=$request['nom'];
        $joueur->prenom=$request['prenom'];
        $joueur->niveau=$request['niveau'];
        $joueur->club=$request['club'];

        
        $joueur->save();

        return redirect()->route('joueurs/id',$id)->with('successMsg', 'Joueur modifier avec succès !');

    }
}
