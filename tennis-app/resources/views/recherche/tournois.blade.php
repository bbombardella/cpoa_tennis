<div class="p-6 bg-white border-b border-gray-200">
                <div>
                        <ul>
                            @forelse ($tournois as $tournoi)
                                <li>
                                    <p>
                                        <a class="underline" href="{{ url('/tournois/'.$tournoi->id) }}">{{ $tournoi->id }} {{ $tournoi->lieu }}</a>
                                    </p>
                                </li>
                            @empty
                                <p>Aucun résultat</p>
                            @endforelse
                        </ul>
                    </div>
                </div>