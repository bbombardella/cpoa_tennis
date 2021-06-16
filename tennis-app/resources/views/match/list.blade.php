<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Matchs') }}
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
                        Les matchs du tour {{ $data['id_tour'] }}
                    </h3>
                    <div>
                        <ul>
                        @if($data['matchs']!=null)
                            @foreach ($data['matchs'] as $match)
                                <li>
                                    <p>
                                        <a class="underline" href="{{ url('/tournois/'.$data['id_tournois'].'/tour/'.$data['id_tour'].'/match/'.$match->id) }}">Match {{ $match->numeroDeMatch }}</a>
                                    </p>
                                </li>
                            @endforeach
                        @endif
                        </ul>
                    </div>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                @role('Organisateur')
                    <a class="waves-effect waves-light btn modal-trigger" href="{{ url('/tournois/'.$data['id_tournois'].'/tour/'.$data['id_tour'].'/match/create') }}">
                        <x-button name="createMatch" class="createMatch mt-5" type="button">
                            Créer un match
                        </x-button> 
                    </a> 
                @endrole 
                <div class="m-4 float-right">
                    <x-button type="button" class="waves-effect waves-light btn modal-trigger">
                        <a href='{{ url('/tournois/'.$data['id_tournois'].'/tour/'.$data['id_tour']) }}'>
                          Retour
                        </a>
                    </x-button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>