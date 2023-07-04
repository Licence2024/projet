<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
        </x-slot>
        <div class="flex justify-center my-4">
            <a href="/">
                <img src="{{ asset('./logo.png') }}" class="block w-20 h-20 w-auto fill-current text-gray-500"
                    alt="logo west cole">
            </a>
        </div>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Mot de passe oublié ? Pas de soucis. Entrez juste votre adresse email de connexion et nous vous enverrons un lien pour restaurer votre mot de passe ou pour en créer un nouveau.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('RESTAURER LE MOT DE PASSE') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
