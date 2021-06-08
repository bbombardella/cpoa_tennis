<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Liste des joueurs') }}
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
                        Liste des joueurs (Tournois {{ $data['tournois']->id }})
                    </h3>
                    <div>
                        <ul>
                            @forelse ($data['tournois']->joueur as $joueur)
                                <li>
                                    <p>
                                        <a class="underline" href="{{ url('/joueurs/'.$joueur->id) }}">{{ $joueur->id }} {{ $joueur->nom }} {{ $joueur->prenom }}</a>
                                    </p>
                                </li>
                            @empty
                                <p>Aucun joueurs dans le tournois</p>
                            @endforelse
                        </ul>
                    </div>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <a class="waves-effect waves-light btn modal-trigger" href="{{ url('/tournois/'.$data['tournois']->id.'/joueurs/associate') }}">
                        <x-button name="createTournoi" class="createTournoi" type="button">
                            Ajouter un joueur
                        </x-button> 
                    </a>  
                </div>
            </div>
        </div>
    </div>
</x-app-layout>