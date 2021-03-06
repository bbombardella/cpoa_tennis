<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tournois extends Model
{
    use HasFactory;

    protected $table = 'tournois';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keytype = 'int';
    public $timestamps = false;
    protected $dateFormat = 'Y-m-d';

    protected $fillable = [
        'lieu',
        'date',
        'idStatut'
    ];

    protected $casts = [
        'date' => 'datetime',
    ];

    public function statut(){
        return $this->belongsTo(Statut::class, 'idStatut');
    }

    public function joueur()
    {
        return $this->belongsToMany(Joueur::class, 'tournois_joueur', 'idTournois', 'idJoueur');
    }
    
}
