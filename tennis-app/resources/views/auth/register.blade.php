<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Bienvenue -->
            <div class="flex items-center justify-center mt-4">
                <p class="text-gray-900 hover:text-gray-900">
                    {{ __('Bienvenue sur TTP') }}
                </p>
            </div>
            <div class="flex items-center justify-center mt-4">
                <p class="text-sm text-gray-900 hover:text-gray-900">
                    {{ __('Veuillez vous inscrire') }}
                </p>
            </div>
            
            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Nom')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-label for="roles" :value="__('Rôles')" />
                <div class="relative inline-block w-full text-gray-700">
                    <select class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Regular input">
                        @foreach ($roles as $role)
                            <option>{{$role->name}}</option>
                        @endforeach
                    </select>
                    
                </div>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Mot de passe')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirmer le mot de passe')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Déjà inscrit ?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('S\'inscrire') }}
                </x-button>
            </div>
            
            {{--Ici pour l'instant le lien renvoie à la connexion, il faudra juste changer la route quand elle aura été créée--}}
            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Continuer sans s\'inscrire') }}
                </a>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
