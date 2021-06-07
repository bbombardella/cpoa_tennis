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
                        Les matchs du tour {{ $data['id_tournois'] }}
                    </h3>
                    <div>
                        <ul>
                            @foreach ($data['tours'] as $tour)
                                <li>
                                    <p>
                                        <a class="underline" href="{{ url('/joueurs/') }}"></a>
                                    </p>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <a class="waves-effect waves-light btn modal-trigger" href="{{ url('/joueurs/create') }}">
                        <x-button name="createJoueur" class="createJoueur" type="button">
                            Créer un tour
                        </x-button> 
                    </a>  
                </div>
            </div>
        </div>
    </div>
</x-app-layout>