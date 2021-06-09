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
                        Les Tournois 
                    </h3>
                    <div>
                        <ul>
                            @for ($i = 0; $i < count($data['tournois']); $i++)
                                <li>
                                    <p>
                                        <a class="underline" href='{{ url("/tournois/".$data['tournois'][$i]->id) }}'> {{ $data['tournois'][$i]->id }} {{ $data['tournois'][$i]->lieu }} {{ $data['tournois'][$i]->date->format('d/m/Y') }} </a>  - {{$data['statut'][$i]->nom}}
                                    </p>
                                </li>
                            @endfor
                        </ul>
                    </div>
                </div>
                @role('Organisateur')
                <div class="p-6 bg-white border-b border-gray-200">
                    <a class="waves-effect waves-light btn modal-trigger" href="{{ url('/tournois/create') }}">
                        <x-button name="createTournoi" class="createTournoi" type="button">
                            Créer un Tournois
                        </x-button> 
                    </a>  
                </div>
                @endrole
            </div>
        </div>
    </div>
</x-app-layout>