<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'match';
    protected $primaryKey = 'id';
    protected $fillable = [
            'numeroDeMatch',
            'idStatut',
            'idTour',
        ];

    public function statut(){
        return $this->hasOne(Statut::class, 'idStatut');
    }

    public function tour(){
        return $this->belongsTo(Tour::class, 'idTour');
    }

    public function joueur_un() {
        return $this->belongsTo(Joueur::class, 'joueur1');
    }

    public function joueur_deux() {
        return $this->belongsTo(Joueur::class, 'joueur2');
    }

    public function resultat() {
        return $this->belongsTo(ResultatMatch::class, 'id', 'idMatch');
    }
}
