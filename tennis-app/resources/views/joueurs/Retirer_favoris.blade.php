<form method="post" action='{{ url("/joueurs/$joueur->id") }}'>
    <x-button name="Remove" class="addFav" type="submit">
        Retirer des favoris
    </x-button>               
</form>