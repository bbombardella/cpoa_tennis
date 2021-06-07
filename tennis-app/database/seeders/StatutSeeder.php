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
        ])->save();
        Statut::create([
            'nom' => 'En attente'
        ])->save();
        Statut::create([
            'nom' => 'Terminé'
        ])->save();
    }
}
