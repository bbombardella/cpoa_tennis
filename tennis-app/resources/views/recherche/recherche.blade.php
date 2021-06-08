<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Effectuer une recherche') }}
        </h2>
    </x-slot>
    

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ url('recherche') }}">
                        <input type='text' name='item_search' placeholder='Rechercher...'>

                        <select name="search" class="form-control">
                            <option>Joueurs</option>
                            <option>Tournois</option> 
                        </select>

                        <button type='submit' class='btn btn-info'>
                            Rechercher
                        </button>
                        <i class="fas fa-search"></i>
                    </form>
                </div>
                @isset($joueurs)
                    @include('recherche/joueurs')
                @endisset
                @isset($tournois)
                    @include('recherche/tournois')
                @endisset
            </div>
        </div>
    </div>
</x-app-layout>