<div>
    <h4 class="font-semibold text-xl text-gray-800 leading-tight mb-2 mt-4 ml-2">
        Vos favoris
    </h4>
    <ul>
        @forelse ($data['favoris'] as $favoris)
            <li>
                <p>
                    <a class="underline" href="{{ url('/joueurs/'.$favoris->id) }}">{{ $favoris->nom }} {{ $favoris->prenom }}</a>
                </p>
            </li>
        @empty
            <p>Vous n'avez aucun favoris.</p>
        @endforelse
    </ul>
</div>