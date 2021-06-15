<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tournois') }}
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

    @if (session('errorMsg'))
        <div class="m-3" role="alert">
            <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                Erreur
            </div>
            <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                <p>{{ session('errorMsg') }}</p>
            </div>
        </div>
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="font-semibold text-xl text-gray-800 leading-tight mb-2">
                        Informations sur le tournoi {{ $data['tournois']->id }}
                    </h3>
                    <div>
                        <ul>
                            <li>
                                Lieu: {{ $data['tournois']->lieu }}
                            </li>
                            <li>
                                Date: {{ $data['tournois']->date->format('d/m/Y') }}
                            </li>
                            <li>
                                Statut: {{ $data['statut']->nom }}
                            </li>
                        </ul>
                    </div>
                    <a class="waves-effect waves-light btn modal-trigger" href='{{ url("/tournois/".$data['tournois']->id."/tour") }}''>
                        <x-button name="createJoueur" class="createJoueur mt-5" type="button">
                            Voir les tours
                        </x-button> 
                    </a> 

                    @if (!$data['generate'])
                        @role('Organisateur')
                        <a class="waves-effect waves-light btn modal-trigger" href='{{ url("/tournois/".$data['tournois']->id."/generate") }}''>
                            <x-button name="createJoueur" class="createJoueur mt-5" type="button">
                                Générer tournoi
                            </x-button> 
                        </a>
                        <a class="waves-effect waves-light btn modal-trigger" href="{{ url('/tournois/'.$data['tournois']->id.'/joueurs/associate') }}">
                            <x-button name="createTournoi" class="createTournoi mt-5" type="button">
                                Modifier les participants
                            </x-button> 
                        </a>  
                        @endrole
                    @else 
                        <a class="waves-effect waves-light btn modal-trigger" href='{{ url("/tournois/".$data['tournois']->id."/arbre") }}''>
                            <x-button name="createJoueur" class="createJoueur mt-5" type="button">
                                Afficher l'arbre
                            </x-button> 
                        </a>
                    @endif

                    

                    @role('Organisateur')
                    <a class="waves-effect waves-light btn modal-trigger" href='{{ url("/tournois/".$data['tournois']->id."/changeState") }}''>
                        <x-button name="changeTournoisState" class="changeTournoisState mt-5" type="button">
                            Changer le statut
                        </x-button> 
                    </a> 
                    
                    @endrole
                </div>
                @include('tournois/retour')
            </div>
        </div>
    </div>
</x-app-layout>