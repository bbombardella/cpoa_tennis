<div class="mt-3 bg-white">
    <form method="post" action='{{ url("/joueurs/favoris/remove/".$data['joueur']->id) }}'>
        <x-button name="Remove" class="addFav" type="submit">
            Retirer des favoris
        </x-button>               
    </form>
</div>