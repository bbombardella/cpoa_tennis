<form method="post" action='{{ url("/joueurs/favoris/remove/$joueur->id") }}'>
    <x-button name="Remove" class="addFav" type="submit">
        Retirer des favoris
    </x-button>               
</form>