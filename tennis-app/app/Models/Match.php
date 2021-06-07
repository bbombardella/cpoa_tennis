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
            'numeroDeMatch'
        ];

    public function statut(){
        return $this->hasOne(Statut::class, 'idStatut');
    }

    public function tour(){
        return $this->hasOne(Tour::class, 'idTournois');
    }
}
