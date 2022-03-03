@extends('model.ModeleSite')
@section('header')
  <li class="centre"><a class="active" href="/page-acueil">Accueil</a></li>
  <li class="centre"><a href="/reservation">Reservation</a></li>
  <li class="centre"><a href="/liste-attente">Liste d'attente</a></li>
  <li><a href="/Compte"><img src="{{ asset('image/compte.jpg') }}" href="login"></a></li><!-- lien ver le compte --> 
  <li><a href="/"><img src="{{ asset('image/deconection.jpg') }}" href="active"></a></li><!-- lien pour se déconecter --> 
@endsection

@section('contenu')
<div class="carre">
    <div align="center"><img src="{{asset('image/Bienvenut.png')}}"></div>
    <div id="column1">
    <h1>Bienvennue !</h1> 
    <p>Sur le site de réservation de places de parking.</p>
    <p><strong>L’application Parking vous permet de réserver et vous attribuer une place de parking immédiatement.</strong> Si votre demande ne peut pas être satisfaite vous serez placé en liste d’attente.</p>
    </div>
</div>
@endsection
