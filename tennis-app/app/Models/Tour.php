<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;

    protected $table = 'tour';
    protected $primaryKey = 'id';
    protected $fillable = [
        'numeroDuTour',
        'idStatut',
        'idTournois'
    ];

    public $timestamps = false;

    public function statut() {
        return $this->hasOne(Statut::class, 'id', 'idStatut');
    }

    public function tournois() {
        return $this->hasOne(Tournois::class, 'id', 'idTournois');
    }
}
