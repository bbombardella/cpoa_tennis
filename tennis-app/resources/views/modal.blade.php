<?php use App\Models\Joueur; ?>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Joueurs') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="font-semibold text-xl text-gray-800 leading-tight">
                        Les Joueurs
                    </h3>
                    <div>

                        <?php
                        $joueurs = DB::table('Joueur')->get();
                        echo '<ul>';
                        foreach ($joueurs as $joueur){
                            echo '<li>';
                            echo '<p>';
                            echo $joueur->nom.' '.$joueur->prenom;
                            echo '</p>';
                            echo '</li>';
                        }
                        echo '</ul>';
                        ?>
                        
                    </div>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <a class="waves-effect waves-light btn modal-trigger" href="./modal.blade.php">
                        <x-button name="createJoueur" class="createJoueur" type="button">
                            Créer un joueur
                        </x-button> 
                    </a>  
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<!-- Modal Structure -->
<!-- This example requires Tailwind CSS v2.0+ -->
<div class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
  <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
    <!--
      Background overlay, show/hide based on modal state.

      Entering: "ease-out duration-300"
        From: "opacity-0"
        To: "opacity-100"
      Leaving: "ease-in duration-200"
        From: "opacity-100"
        To: "opacity-0"
    -->
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

    <!-- This element is to trick the browser into centering the modal contents. -->
    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

    <!--
      Modal panel, show/hide based on modal state.

      Entering: "ease-out duration-300"
        From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        To: "opacity-100 translate-y-0 sm:scale-100"
      Leaving: "ease-in duration-200"
        From: "opacity-100 translate-y-0 sm:scale-100"
        To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
    -->
    <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
      <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
        <div class="sm:flex sm:items-start">
          <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
              Ajouter un joueur
            </h3>
            <div class="mt-2">
              <p class="text-sm text-gray-500">
                Veuillez entrer les données du joueur
              </p>
            </div>
          </div>
        </div>
      </div>
      <form method="POST" action="{{ route('joueurs') }}">

      <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
            <div>
                <x-label for="Nom" :value="__('Nom')" />

                <x-input id="Nom" class="block mt-1 mr-3" type="text" name="Nom_joueur" :value="old('Nom')" required autofocus />
            </div>

            <div>
                <x-label for="Prénom" :value="__('Prénom')" />

                <x-input id="Prénom" class="block mt-1 mr-3" type="text" name="Prénom_joueur" :value="old('Prénom')" required autofocus />
            </div>
        </div>

        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
            <div>
                <x-label for="Niveau" :value="__('Niveau')" />

                <x-input id="Niveau" class="block mt-1 mr-3" type="text" name="Niveau_joueur" :value="old('Niveau')" required autofocus />
            </div>

            <div>
                <x-label for="Club" :value="__('Club')" />

                <x-input id="Club" class="block mt-1 mr-3" type="text" name="Club_joueur" :value="old('Club')" required autofocus />
            </div>
        </div>

        </form>
      <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
        <button type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
          Ajouter
        </button>
        <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
        <a href="{{ url('/joueurs') }}">
          Annuler
        </a>
        </button>
      </div>
    </div>
  </div>
</div>