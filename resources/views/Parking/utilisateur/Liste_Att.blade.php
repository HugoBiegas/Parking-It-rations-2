@extends('model.ModeleSite')
@section('header')
  <li class="centre"><a href="/page-acueil">Accueil</a></li>
  <li class="centre"><a href="/reservation">Reservation</a></li>
  <li class="centre"><a class="active" href="">Liste d'attente</a></li>
  <li><a href="/Compte"><img src="{{ asset('image/compte.jpg') }}" href="login"></a></li><!-- lien ver le compte --> 
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
    <td class="bar">Date réservation</td>
    <td class="bar">Date réservation</td>
  </tr>
  <tr>
    <td class="autre">Date réservation</td>
    <td class="autre">Jack Russell</td>
    <td class="autre">Poodle</td>

  </tr>
  <tr>
    <td >Date réservation</td>
    <td >N°place</td>
    <td >16</td>
  </tr>
</table>
@endsection