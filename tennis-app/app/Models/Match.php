<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    use HasFactory;
    use Tour;
    use Statut;

    protected $table = 'match';
    protected $primaryKey = 'id';
    protected $fillable = [
            'numeroDeMatch',
            'joueur1',
            'joueur2',
            'gagnant'
        ];

    public function statut(){
        return $this->hasOne(Statut::class, 'idStatut');
    }

    public function tour(){
        return $this->hasOne(Tour::class, 'idTournois');
    }

    public function joueur1() {
        return $this->hasOne(Joueur::class, 'joueur1');
    }

    public function joueur2() {
        return $this->hasOne(Joueur::class, 'joueur2');
    }

    public function gagnant() {
        return $this->hasOne(Joueur::class, 'gagnant');
    }
}
