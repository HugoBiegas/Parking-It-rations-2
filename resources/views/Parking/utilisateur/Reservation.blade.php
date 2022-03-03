@extends('model.ModeleSite')
@section('header')
  <li class="centre"><a href="/page-acueil">Accueil</a></li>
  <li class="centre"><a class="active" href="/reservation">Reservation</a></li>
  <li class="centre"><a href="/liste-attente">Liste d'attente</a></li>
  <li><a href="/Compte"><img src="{{ asset('image/compte.jpg') }}" href="login"></a></li><!-- lien ver le compte --> 
@endsection
@section('contenu')
<div class="carreReservation">
    <div id="column1">
    <h1 align="center">Faire une réservation</h1> 
    <p align="center">Cliquer ici</p>
    <p align="center"><input class="favorite styled"
       type="button"
       value="Réserver"></p>
    </div>
</div>
<table class="Reservation">
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