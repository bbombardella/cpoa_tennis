<form method="post" action='{{ url("/joueurs/$joueur->id") }}'>
    <x-button name="Add" class="addFav" type="submit">
        Ajouter aux favoris
    </x-button>               
</form>