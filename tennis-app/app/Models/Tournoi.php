<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tournois extends Model
{
    use HasFactory;

    protected $fillable = [
        'lieu',
        'date',
        'statut',
    ];

    protected $casts = [
        'date' => 'datetime',
    ];

    public function statut(){
        return $this->hasOne(Statut::class);
    }

    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keytype = 'int';


    
}
