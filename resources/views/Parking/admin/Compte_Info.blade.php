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
  <form method="POST" action="/admin-inscriptions">
  @csrf
  <input type="hidden" name="BD" id="BD" value="{{$BD}}">
  <li><button class="image"><img src="{{ asset('image/admin.jpg') }}"></button></li><!-- lien ver le compte --> 
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
	<p class="ContentCompte"> Nom: {{$BD[0]->nom}}</p>
	<p class="ContentCompte"> Prénom: {{$BD[0]->prénom}}</p>
	<p class="ContentCompte">Adresse e-mail: {{$BD[0]->email}}</p>
	<p class="ContentCompte"><a href="">Modifier adresse e-mail?</a></p>
	<p class="ContentCompte"><a href="">Modifier mot de passe?</a></p>
</div>
</div>
@endsection