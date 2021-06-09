<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class GuestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Visiteur',
            'email' => 'visiteur@visiteur.visiteur',
            'password' => 'visiteur'
        ]);
        $user->save();
    }
}
