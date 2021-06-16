<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Joueurs') }}
        </h2>
    </x-slot>

    @if (session('successMsg'))
        <div class="m-3" role="alert">
            <div class="bg-green-500 text-white font-bold rounded-t px-4 py-2">
            Succès !
            </div>
            <div class="border border-t-0 border-green-400 rounded-b bg-green-100 px-4 py-3 text-green-700">
            <p>{{ session('successMsg') }}</p>
            </div>
        </div>
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="font-semibold text-xl text-gray-800 leading-tight mb-2">
                        Informations sur  {{ $data['joueur']->nom }} {{ $data['joueur']->prenom }}
                    </h3>
                    <div>
                        <ul>
                            <li>
                                Nom: {{ $data['joueur']->nom }}
                            </li>
                            <li>
                                Prenom: {{ $data['joueur']->prenom }}
                            </li>
                            <li>
                                Niveau: {{ $data['joueur']->niveau }}
                            </li>
                            <li>
                                Club: {{ $data['joueur']->club }}
                            </li>
                            <div class="m-1 font-semibold text-gray-800">
                            -Statistique
                            </div>
                            <li>
                                Victoire: {{ $data['victoire']}}
                            </li>
                            <li>
                                Défaite: {{ $data['defaite'] }}
                            </li>
                            <li>
                                Nombre d'inscription: {{ $data['nb_tournoi'] }}
                            </li>
                        </ul>
                        @role('Visiteur|Organisateur')
                            @if ($data['favoris'])
                                @include('joueurs/Retirer_favoris')
                            @else
                                @include('joueurs/ajout_favoris')
                            @endif
                        @endrole
                        @role('Organisateur')
                            @include('joueurs/modifier')
                        @endrole
                        
                    </div>
                </div>
                @include('joueurs/retour')
            </div>
        </div>
    </div>
</x-app-layout>