@extends('model.ModeleSite')
@section('header')
<form method="POST" action="/page-acueil">
  @csrf
    <input type="hidden" name="BD" id="BD" value="{{$BD}}">
    <li class="centre"><button class="headerActife">Accueil</button></li>
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
  <li><button class="image"><img src="{{ asset('image/compte.jpg') }}"></button></li><!-- lien ver le compte --> 
    </form>
  <li><a href="/"><img src="{{ asset('image/deconection.jpg') }}" href="active"></a></li><!-- lien pour se déconecter --> 
@endsection

@section('contenu')
<div class="carre">
    <div align="center"><img src="{{asset('image/Bienvenut.png')}}"></div>
    <div id="column1">
    <h1>Bienvennue {{$BD[0]->prénom}} {{$BD[0]->nom}} ! </h1> 
    <p>Sur le site de réservation de places de parking.</p>
    <p><strong>L’application Parking vous permet de réserver et vous attribuer une place de parking immédiatement.</strong> Si votre demande ne peut pas être satisfaite vous serez placé en liste d’attente.</p>
    </div>
</div>
@endsection
