@extends('model.ModeleConnection')
@section('header')
  <li><img src="{{ asset('image/logo.png') }}"></li>
  <li class="centre"><a href="/">Se connecter</a></li>
  <li class="centre"><a href="/register">Inscription</a></li>
@endsection
@section('contenu')
<x-guest-layout>
        <x-slot name="logo">
        </x-slot>
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <div class="contenuFP">
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <!-- Email Address -->
                <div>
                    <x-label for="email" :value="__('Email')" />

                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                </div>
                <div class="flex items-center justify-end mt-4">
                    <x-button>
                        {{ __('changer son mot de passe') }}
                    </x-button>
                </div>
            </form>            
        </div>

</x-guest-layout>

@endsection

