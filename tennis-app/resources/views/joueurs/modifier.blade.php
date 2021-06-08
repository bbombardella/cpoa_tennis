<div class="mt-8 bg-white">
    <a class="waves-effect waves-light btn modal-trigger" href='{{ url("/joueurs/".$data['joueur']->id."/edit") }}'>
        <x-button name="editJoueur" class="editJoueur" type="button">
            Modifier
        </x-button> 
    </a>  
</div>