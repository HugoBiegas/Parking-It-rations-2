@extends('model.ModeleSite')
@section('header')
  <li class="centre"><a href="/page-acueil">Accueil</a></li>
  <li class="centre"><a href="/reservation">Reservation</a></li>
  <li class="centre"><a href="/liste-attente">Liste d'attente</a></li>
  <li><a href="/Compte"><img src="{{ asset('image/compte_info.jpg') }}" href="login"></a></li><!-- lien ver le compte --> 
   <li><a href="/"><img src="{{ asset('image/deconection.jpg') }}" href="active"></a></li><!-- lien pour se déconecter --> 
@endsection
@section('contenu')
<div class="carreCompte">
	<div id="column">
	<p align="center" class="CompteT"><strong>Mon compte</strong></p>
	<p class="ContentCompte"> Identifiant: Ligue Foot Nante</p>
	<p class="ContentCompte"> Nom: Robert </p>
	<p class="ContentCompte"> Prénom: Patrik</p>
	<p class="ContentCompte">Adresse e-mail: foot2rue@gmail.com</p>
	<p class="ContentCompte"><a href="">Modifier adresse e-mail?</a></p>
	<p class="ContentCompte"><a href="">Modifier mot de passe?</a></p>
</div>
</div>
@endsection