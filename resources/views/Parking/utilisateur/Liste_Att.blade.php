@extends('model.ModeleSite')
@section('header')
<form method="POST" action="/page-acueil">
  @csrf
    <input type="hidden" name="BD" id="BD" value="{{$BD}}">
    <li class="centre"><button class="header">Accueil</button></li>
</form>
<form method="POST" action="/reservation">
  @csrf
    <input type="hidden" name="BD" id="BD" value="{{$BD}}">
    <li class="centre"><button class="header">Reservation</button></li>
  </form>
  <form method="POST" action="/liste-attente">
  @csrf
    <input type="hidden" name="BD" id="BD" value="{{$BD}}">
    <li class="centre"><button class="headerActife">Liste d'attente</button></li>
  </form>
  <form method="POST" action="/compte">
  @csrf
  <input type="hidden" name="BD" id="BD" value="{{$BD}}">
  <li><button class="image"><img src="{{ asset('image/compte.jpg') }}"></button></li><!-- lien ver le compte --> 
    </form>
  <li><a href="/"><img src="{{ asset('image/deconection.jpg') }}" href="active"></a></li><!-- lien pour se déconecter --> 
@endsection
@section('contenu')
<div class="carreReservation">
    <div id="column1">
    <h1 align="center">Voir ma position sur la liste d’attente</h1> 
    <p align="center">Saisissez votre identifiant</p>
    <x-input id="Nom" class="block mt-1 w-full identifient" />
    <p align="center"><input class="favorite styledLA" type="button"value="Regarder"></p>
    </div>
</div>
<p class="nom">Vous êtes <strong>N°10</strong> sur 30 dans la liste d'attente</p>
<table class="Liste">
  <tr> 
    <td class="bar">Nom</td>
    <td class="bar">Date Demande réservation</td>
  </tr>
  <tr>
    <td class="autre">Date réservation</td>
    <td class="autre">Jack Russell</td>
  </tr>
  <tr>
    <td >Date réservation</td>
    <td >N°place</td>
  </tr>
</table>
@endsection