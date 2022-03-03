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
		<p align="center">Modifier réservation</p>
        <p align="center"><x-input id="identifiant"  placeholder="identifiant"/></p>
        <p align="center"><x-input id="Date"  placeholder="date"/></p>
        <p align="center"><x-input id="palceN"  placeholder="n°place"/></p>
        <p align="center"><x-input id="DateExpir"  placeholder="Date d'expiration"/></p>
		<p align="center"><input class="favorite styledLA" type="button" value="Modifier"></p>
		<p><a href="">Retour</a></p>
	    </div>
</div>
@endsection