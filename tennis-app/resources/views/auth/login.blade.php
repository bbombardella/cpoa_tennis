<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="flex items-center justify-center mt-4">
                <p class="text-gray-900 hover:text-gray-900">
                    {{ __('Bienvenue sur TTP') }}
                </p>
            </div>
            <div class="flex items-center justify-center mt-4">
                <p class="text-sm text-gray-900 hover:text-gray-900">
                    {{ __('Veuillez vous connecter') }}
                </p>
            </div>

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Mot de passe')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Se souvenir de moi') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-3">
                    {{ __('Se connecter') }}
                </x-button>
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('register') }}">
                    {{ __('S\'inscrire') }}
                </a>
            </div>
            
        </form>
        {{--Ici pour l'instant le lien renvoie ?? la connexion, il faudra juste changer la route quand elle aura ??t?? cr????e--}}
            <div class="flex items-center justify-end mt-4">
                <form method="POST" action="{{ url('coming_without') }}">
                    <x-button class="ml-3" type='submit'>
                        {{ __('Continuer sans se connecter') }}
                    </x-button>
                </form>
            </div>
    </x-auth-card>
</x-guest-layout>
