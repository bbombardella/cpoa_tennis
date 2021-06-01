<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    use HasFactory;
    use Tournois;
    use Statut;

    protected $fillable = [
            'numeroDuTour',
            'idStatut',
            'idTournois'
        ];

    protected $primaryKey = 'id';

    public function statut(){
        return $this->hasOne(Statut::class);
    }

    public function tournois(){
        return $this->hasOne(Tournois::class);
    }
}
