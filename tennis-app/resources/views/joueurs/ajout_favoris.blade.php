<div class="mt-3 bg-white">
    <form method="post" action='{{ url("/joueurs/favoris/add/".$data['joueur']->id) }}'>
        <x-button name="Add" class="addFav" type="submit">
            Ajouter aux favoris
        </x-button>               
    </form>
</div>