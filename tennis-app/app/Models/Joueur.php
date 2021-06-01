<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Joueur extends Model
{
    use HasFactory;

    protected $table = 'joueur';

    protected $primaryKey = 'id';

    protected $fillable = [
        'nom',
        'prenom',
        'niveau',
        'club',
    ];

    public function tournois()
    {
        return $this->belongsToMany(Tournois::class, 'tournois_joueur', 'idJoueur', 'idTournois');
    }
}