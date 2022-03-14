@extends('model.ModeleConnection')
@section('header')
  <li><img src="{{ asset('image/logo.png') }}"></li>
  <li class="centre"><a href="/">Se connecter</a></li>
  <li class="centre"><a  class="active" href="/inscription">Inscription</a></li>
@endsection
@section('contenu')
    <div class="contenuR" > 
    <x-guest-layout>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="nom" :value="__('Nom')" />

                <x-input id="nom" class="block mt-1 w-full" type="text" name="nom" :value="old('nom')" required autofocus />
            </div>
            <!-- prénom -->
            <div>
                <x-label for="prénom" :value="__('Prénom')" />

                <x-input id="prénom" class="block mt-1 w-full" type="text" name="prénom" :value="old('prénom')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
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
                <x-label for="password_confirmation" :value="__('Confirmer mot de passe')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="/">
                    {{ __('Déjà un compte?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Inscription') }}
                </x-button>
            </div>
        </form>
</x-guest-layout>
</div>
@endsection
