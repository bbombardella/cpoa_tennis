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
                        Les Joueurs
                    </h3>
                    @role('Visiteur|Organisateur')
                        @include('joueurs/favoris')
                    @endrole
                    <div>
                    @role('Visiteur|Organisateur')
                        <h4 class="font-semibold text-xl text-gray-800 leading-tight mb-2 mt-4 ml-2">
                            Liste complète
                        </h4>
                    @endrole
                        <ul>
                            @foreach ($data['joueurs'] as $joueur)
                                <li>
                                    <p>
                                        <a class="underline" href="{{ url('/joueurs/'.$joueur->id) }}">{{ $joueur->nom }} {{ $joueur->prenom }}</a>
                                    </p>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @role('Organisateur')
                <div class="p-6 bg-white border-b border-gray-200">
                    <a class="waves-effect waves-light btn modal-trigger" href="{{ url('/joueurs/create') }}">
                        <x-button name="createJoueur" class="createJoueur" type="button">
                            Créer un joueur
                        </x-button> 
                    </a>  
                </div>
                @endrole
            </div>
        </div>
    </div>
</x-app-layout>