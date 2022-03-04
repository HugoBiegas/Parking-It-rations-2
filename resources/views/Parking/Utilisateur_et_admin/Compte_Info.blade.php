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
    <li class="centre"><button class="header">Liste d'attente</button></li>
  </form>
  <form method="POST" action="/compte">
  @csrf
  <input type="hidden" name="BD" id="BD" value="{{$BD}}">
  <li><button class="image"><img src="{{ asset('image/compte_info.jpg') }}"></button></li><!-- lien ver le compte --> 
    </form>
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