@extends('model.ModeleConnection')
@section('header')
  <li><img src="{{ asset('image/logo.png') }}"></li>
  <li class="centre"><a href="/">Se connecter</a></li>
  <li class="centre"><a href="/inscription">Inscription</a></li>
@endsection
@section('contenu')
<div class="column1">
<p align="center"> Votre demande pour un nouveau</p>
<p align="center"> mot de passe à bien été envoyé.</p>  
</div>

@endsection