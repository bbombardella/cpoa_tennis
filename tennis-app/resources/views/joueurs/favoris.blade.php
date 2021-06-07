<div>
    <h4 class="font-semibold text-xl text-gray-800 leading-tight mb-2 mt-4 ml-2">
        Vos favoris
    </h4>
    <ul>
        @foreach ($joueurs as $joueur)
            <li>
                <p>
                    <a class="underline" href="{{ url('/joueurs/'.$joueur->id) }}">{{ $joueur->nom }} {{ $joueur->prenom }}</a>
                </p>
            </li>
        @endforeach
    </ul>
</div>