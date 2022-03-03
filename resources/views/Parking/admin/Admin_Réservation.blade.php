@extends('model.ModeleSite')
@section('header')
  <li class="centre"><a href="/page-acueil">Accueil</a></li>
  <li class="centre"><a class="active" href="/reservation">Reservation</a></li>
  <li class="centre"><a href="/liste-attente">Liste d'attente</a></li>
  <li><a href="/Compte"><img src="{{ asset('image/compte.jpg') }}" href="login"></a></li><!-- lien ver le compte --> 
@endsection
@section('contenu')
<div class="carreReservationAdmin">
		<div id="column1">
		<p align="center">Faire une réservation</p>
        <p align="center"><x-input id="identifiant"  placeholder="identifiant"/></p>
        <p align="center"><x-input id="Date"  placeholder="date"/></p>
        <p align="center"><x-input id="palceN"  placeholder="n°place"/></p>
        <p align="center"><x-input id="DateExpir"  placeholder="Date d'expiration"/></p>
		<p align="center"><input class="favorite styledLA" type="button" value="ajouter"></p>
	    </div>
</div>
<table class="AdminReserve">
  <tr> 
    <td class="bar">Nom</td>
    <td class="bar">Date réservation</td>
    <td class="bar">N°place</td>
    <td class="bar">Date expiration</td>
    <td class="bar">Modifier</td>
    <td class="bar">suprimer</td>
  </tr>
  <tr>
    <td class="autre">Date réservation</td>
    <td class="autre">Jack Russell</td>
    <td class="autre">Poodle</td>
    <td class="autre">Date réservation</td>
    <td class="autre"><a href="">Modifier</a></td>
    <td class="autre">Poodle</td>
  </tr>
  <tr>
    <td >Date réservation</td>
    <td >N°place</td>
    <td >16</td>
    <td >Date réservation</td>
    <td ><a href="/Modifier-admin">Modifier</a></td>
    <td >16</td>
  </tr>
</table>
@endsection