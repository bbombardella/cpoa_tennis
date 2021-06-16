@include('match/list')

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
        <div
            class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                            Saisie des résultats
                        </h3>
                        <div class="mt-2">
                            <p class="text-sm text-gray-500">
                                Saisissez les scores
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <form method="POST" action="{{ url('tournois/'.$data['id_tournois'].'/tour/'.$data['id_tour'].'/match/'.$data['id_match'].'/resultat') }}">
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row">
                    <div>
                        <x-label for="score1" value="Score de {{ $data['match']->joueur_un->nom }} {{ $data['match']->joueur_un->prenom }}" />
                        <x-input id="score1" class="block mt-1 mr-3" type="number" name="score1" value="0" step="1" min="0" required autofocus />
                    </div>
                    <div>
                        <x-label for="score1" value="Score de {{ $data['match']->joueur_deux->nom }} {{ $data['match']->joueur_deux->prenom }}" />
                        <x-input id="score1" class="block mt-1 mr-3" type="number" name="score2" value="0" step="1" min="0" required autofocus />
                    </div>
                </div>


                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <input type="submit" name="validation" value="Ajouter"
                        class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                    <button type="button"
                        class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        <a href="{{ url('tournois/'.$data['id_tournois'].'/tour/'.$data['id_tour'].'/match/'.$data['id_match']) }}">
                            Annuler
                        </a>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
