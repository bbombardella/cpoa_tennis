<div class="p-6 bg-white border-b border-gray-200">
                <div>
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
                </div>