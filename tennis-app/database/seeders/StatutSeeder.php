<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Statut;

class StatutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Statut::create([
            'nom' => 'En cours'
        ]);
        Statut::create([
            'nom' => 'En attente'
        ]);
        Statut::create([
            'nom' => 'Terminé'
        ]);
    }
}
