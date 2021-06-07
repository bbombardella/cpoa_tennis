<form method="post" action='{{ url("/joueurs/favoris/add/$joueur->id") }}'>
    <x-button name="Add" class="addFav" type="submit">
        Ajouter aux favoris
    </x-button>               
</form>