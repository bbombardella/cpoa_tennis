<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResultatMatch extends Model
{
    use HasFactory;

    protected $table = 'resultat_match';
    protected $primaryKey = 'idMatch';
    public $timestamps = false;
    protected $fillable = [
        'scoreGagnant',
        'scorePerdant',
        'gagnant',
        'perdant'
    ];

    public function joueur_gagnant() {
        return $this->hasOne(Joueur::class, 'gagnant');
    }

    public function joueur_perdant() {
        return $this->hasOne(Joueur::class, 'perdant');
    }
}
