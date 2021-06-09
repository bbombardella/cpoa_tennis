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

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="font-semibold text-xl text-gray-800 leading-tight mb-2">
                        Informations sur le tournoi {{ $tournoi->id }}
                    </h3>
                    <div>
                        <ul>
                            <li>
                                {{ $tournoi->lieu }}
                            </li>
                            <li>
                                {{ $tournoi->date }}
                            </li>
                            <li>
                                {{ $tournoi->idStatut }}
                            </li>
                        </ul>
                    </div>
                    <a class="waves-effect waves-light btn modal-trigger" href="{{ url('/tournois/'.$tournoi->id.'/tour') }}">
                        <x-button name="createJoueur" class="createJoueur mt-5" type="button">
                            Voir les tours
                        </x-button> 
                    </a> 
                    <a class="waves-effect waves-light btn modal-trigger" href="{{ url('/tournois/'.$tournoi->id.'/tour') }}">
                        <x-button name="changeTournoisState" class="changeTournoisState mt-5" type="button">
                        @if($tournoi -> idStatut == 3)
                            Terminé le tournoi
                        @elseif($tournoi->idStatut == 4)
                            Démarrer le tournoi
                        @else
                            Tournoi Terminé
                        @endif
                        </x-button> 
                    </a> 
                    <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                    <a href="{{ url("/tournois/{$tournoi->id}/joueurs") }}">
                        Voir les joueurs
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>