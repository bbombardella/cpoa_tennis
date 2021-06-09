<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tours') }}
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
                        Les tours du tournois {{ $data['tournois']->id }}
                    </h3>

                    @if ($data['enough_player'])
                        <p>Il y a <strong>{{ $data['nb_joueurs'] }} joueurs</strong> dans ce tournois.</p>
                        @role('Organisateur')
                        @if ($data['nb_tours_dispo'] > 0)
                            <p>Vous pouvez créer <strong>{{ $data['nb_tours_dispo'] }}</strong>
                                @if ($data['nb_tours_dispo'] == 1)
                                    tour
                                @else
                                    tours
                                @endif
                            </p>
                        @else
                            <p class="text-red-500">Vous ne pouvez pas créer d'autres tours.</p>
                        @endif
                        @endrole
                        <div>
                            <ul>
                                @forelse ($data['tours'] as $tour)
                                    <li>
                                        <p>
                                            <a class="underline" href="{{ url('/joueurs/') }}">Tour
                                                {{ $tour->id }}</a>
                                        </p>
                                    </li>
                                @empty
                                    <p>Il n'y a pas encore de tours dans ce tournois.</p>
                                @endforelse
                            </ul>
                        </div>
                </div>
                @role('Organisateur')
                @if ($data['nb_tours_dispo'] > 0)
                    <div class="p-6 bg-white border-b border-gray-200">
                        <a class="waves-effect waves-light btn modal-trigger"
                            href="{{ url('/tournois/' . $data['tournois']->id . '/tour/create') }}">
                            <x-button name="createJoueur" class="createJoueur" type="button">
                                Créer un tour
                            </x-button>
                        </a>
                    </div>
                @endif
                @endrole
            @else
            @role('Organisateur')
                <p class="text-red-500"><strong>Vous ne pouvez pas créer de tours car vous n'avez pas assez de
                        joueurs.</strong> Vous n'avez que {{ count($data['tournois']->joueur) }} joueurs.</p>
                <p class="text-red-500">Veuillez enlever ou ajouter des joueurs.</p>
            </div>
            <div class="p-6 bg-white border-b border-gray-200">
                <a class="waves-effect waves-light btn modal-trigger"
                    href="{{ url('/tournois/' . $data['tournois']->id . '/joueurs') }}">
                    <x-button name="createJoueur" class="createJoueur" type="button">
                        Modifier mon nombre de joueur
                    </x-button>
                </a>
            </div>
            @endrole
            @endif
        </div>
    </div>
    </div>
</x-app-layout>
