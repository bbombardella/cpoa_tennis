<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Match') }}
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
                        Informations sur le match {{ $data['match']->numeroDeMatch }} du tour {{ $data['match']->tour->numeroDuTour }}
                    </h3>
                    <div>
                        <ul>
                            <li>
                                Numéro de tour: {{ $data['match']->numeroDeMatch }}
                            </li>
                            @if(($data['match']->joueur_un)!=null)
                                @if ($data['match']->resultat->gagnant==$data['match']->joueur_un->id)
                                    <li>
                                        Joueur 1: <a class="underline" href="{{ url('joueurs/'.$data['match']->joueur_un->id) }}">{{ $data['match']->joueur_un->nom }} {{ $data['match']->joueur_un->prenom }}</a> - {{ $data['match']->resultat->score_gagnant }} - <strong>Gagnant</strong>
                                    </li>
                                    <li>
                                        Joueur 2 : <a class="underline" href="{{ url('joueurs/'.$data['match']->joueur_deux->id) }}">{{ $data['match']->joueur_deux->nom }} {{ $data['match']->joueur_deux->prenom }}</a> - {{ $data['match']->resultat->score_perdant }} - <strong>Perdant</strong>
                                    </li>
                                @else
                                    <li>
                                        Joueur 1: <a class="underline" href="{{ url('joueurs/'.$data['match']->joueur_un->id) }}">{{ $data['match']->joueur_un->nom }} {{ $data['match']->joueur_un->prenom }}</a> - {{ $data['match']->resultat->score_perdant }} - <strong>PErdant</strong>
                                    </li>
                                    <li>
                                        Joueur 2 : <a class="underline" href="{{ url('joueurs/'.$data['match']->joueur_deux->id) }}">{{ $data['match']->joueur_deux->nom }} {{ $data['match']->joueur_deux->prenom }}</a> - {{ $data['match']->resultat->score_gagnant }} - <strong>Gagnant</strong>
                                    </li>
                                @endif
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="m-4 float-left">
                    <x-button type="button" class="waves-effect waves-light btn modal-trigger">
                        <a href='{{ url('/tournois/'.$data['id_tournois'].'/tour/'.$data['id_tour'].'/match') }}'>
                          Gérer les joueurs du match
                        </a>
                    </x-button>
                </div>
                <div class="m-4 float-right">
                    <x-button type="button" class="waves-effect waves-light btn modal-trigger">
                        <a href='{{ url('/tournois/'.$data['id_tournois'].'/tour'.$data['id_tour'].'/match') }}'>
                          Retour
                        </a>
                    </x-button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>