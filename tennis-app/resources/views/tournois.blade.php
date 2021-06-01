<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tournois') }}
        </h2>
    </x-slot>
    

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="font-semibold text-xl text-gray-800 leading-tight">
                        Vos favoris
                    </h3>
                    <div>
                        <?php

                        $tournois = DB::table('tournois')->get();
                        
                        foreach ($tournois as $tournoi){
                            echo ' <div>
                                        <p>
                                            Numéro de tournoi : ' .$tournoi->id.'
                                        </p>
                                        <p>
                                            Le tournoi se déroule à '.$tournoi->lieu. ' le ' .$tournoi->date.'
                                        </p>
                                    </div>';
                        }
                        
                        ?>
                    </div>
                </div>

                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="font-semibold text-xl text-gray-800 leading-tight">
                        Vos tournois
                    </h3>

                    <x-button name="createTournoi" class="createTournoi" type="button">
                        Créer un tournoi
                    </x-button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
