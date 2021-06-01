<?php use App\Models\Joueur; ?>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Joueurs') }}
        </h2>
    </x-slot>
    

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="font-semibold text-xl text-gray-800 leading-tight">
                        Les Joueurs
                    </h3>
                    <div>

                        <?php
                        $joueurs = DB::table('Joueur')->get();
                        echo '<ul>';
                        foreach ($joueurs as $joueur){
                            echo '<li>';
                            echo '<p>';
                            echo $joueur->nom.' '.$joueur->prenom;
                            echo '</p>';
                            echo '</li>';
                        }
                        echo '</ul>';
                        ?>
                        
                    </div>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-button name="createJoueur" class="createJoueur" type="button">
                        Créer un joueur
                    </x-button> 
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
