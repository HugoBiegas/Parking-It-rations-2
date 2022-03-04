@extends('model.ModeleConnection')
@section('header')
  <li><img src="{{ asset('image/logo.png') }}"></li>
  <li class="centre"><a class="active" href="/">Se connecter</a></li>
  <li class="centre"><a   href="/inscription">Inscription</a></li>
@endsection
@section('contenu')
<div class="contenuR" > 
    <x-guest-layout>
        <x-slot name="logo">
        </x-slot>
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <form method="POST" action="/page-acueil">
            @csrf
            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" name="email"/>

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>
            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('mot de passe')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>
            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="reemmber_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('se rappeler de moi') }}</span>
                </label>
            </div>
            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('mot de passe oublier?') }}
                    </a>
                @endif

                <x-button class="ml-3">
                    {{ __('connection') }}
                </x-button>
            </div>
        </form>
    </x-guest-layout>
</div>
@endsection
