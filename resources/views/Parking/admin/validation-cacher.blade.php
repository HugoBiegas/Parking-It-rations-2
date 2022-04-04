@extends('model.ModeleSite')
@section('header')
<form method="POST" action="/page-acueil">
  @csrf
    <input type="hidden" name="BD" id="BD" value="{{$BD}}">
    <li class="centre"><button class="header">Accueil</button></li>
</form>
<form method="POST" action="/reservation-admin">
  @csrf
    <input type="hidden" name="BD" id="BD" value="{{$BD}}">
    <li class="centre"><button class="header">Réservation</button></li>
  </form>
    <form method="POST" action="/historique-admin">
  @csrf
    <input type="hidden" name="BD" id="BD" value="{{$BD}}">
    <li class="centre"><button class="header">Historique</button></li>
  </form>
  <form method="POST" action="/admin-inscriptions">
  @csrf
  <input type="hidden" name="BD" id="BD" value="{{$BD}}">
  <li class="centre"><button class="header">Paramètre compte</button></li><!-- lien ver le compte --> 
    </form>
  <form method="POST" action="/compte">
  @csrf
  <input type="hidden" name="BD" id="BD" value="{{$BD}}">
  <li class="centre"><button class="header">Compte</button></li><!-- lien ver le compte --> 
    </form>
  <li class="deco"><a href="/"><img src="{{ "https://img.icons8.com/ios/50/000000/logout-rounded-up.png" }}" href="active"> </a></li><!-- lien pour se déconecter --> 
@endsection
@section('contenu')
<div class="carreCompte">
  <div id="column">
    <p align="center">Voulez vous suspendre ou enlever la personne</p>
    <form method="POST" action="/suprime-reservent">
    @csrf
    <input type="hidden" name="BD" id="BD" value="{{$BD}}">
    <input type="hidden" name="id" id="id" value="{{$id}}">
    <button class="BTNanul">suprimer</button>
    </form>
    <form method="POST" action="/suspendre-reserve">
    @csrf
    <input type="hidden" name="BD" id="BD" value="{{$BD}}">
    <input type="hidden" name="id" id="id" value="{{$id}}">
    <button class="BTNanul">suspendre</button>
    </form>
</div>
</div>
@endsection