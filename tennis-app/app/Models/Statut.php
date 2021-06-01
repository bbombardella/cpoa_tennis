<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statut extends Model
{
    use HasFactory;

    protected $table = 'statut';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'nom'
    ];
}
