<div>
    <h4 class="font-semibold text-xl text-gray-800 leading-tight mb-2 mt-4 ml-2">
        Vos favoris
    </h4>
    <ul>
        @foreach ($data['favoris'] as $favoris)
            <li>
                <p>
                    <a class="underline" href="{{ url('/joueurs/'.$favoris->id) }}">{{ $favoris->nom }} {{ $favoris->prenom }}</a>
                </p>
            </li>
        @endforeach
    </ul>
</div>