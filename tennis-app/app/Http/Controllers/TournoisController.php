<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tournois;

class TournoisController extends Controller
{
    /**
     * Show all the Tournoi in the database.
     */
    public function index()
    {
        $tournois = Tournois::all();

        return view('tournois/list')->with('tournois', $tournois);

    }

    public function show($lieu) {
        $tournois = Tournois::find($lieu);
        if($tournois) {
            return view('tournois/show')->with('tournoi', $tournois);
        } else {
            abort(404, 'tournoi non trouvé !');
        }
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
        
        $tournois= Tournois::create([            
            'lieu' => $request->lieu,
            'date' => $request->date,
            'idStatut' => $request->idStatut
        ]);

        $tournois->save();

        return redirect()->route('tournois')->with('successMsg', 'Tournoi créé avec succès !');

    }       
}
