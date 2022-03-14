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
    <li class="centre"><button class="header">Réservation</button></li>
  </form>
  <form method="POST" action="/liste-attente">
  @csrf
    <input type="hidden" name="BD" id="BD" value="{{$BD}}">
    <li class="centre"><button class="header">Liste d'attente</button></li>
  </form>
  <form method="POST" action="/compte">
  @csrf
  <input type="hidden" name="BD" id="BD" value="{{$BD}}">
  <li class="centre"><button class="header">Compte</button></li><!-- lien ver le compte --> 
    </form>
  <li class="deco"><a href="/"><img src="{{ "https://img.icons8.com/ios/50/000000/logout-rounded-up.png" }}" href="active" ></a></li><!-- lien pour se déconecter --> 

  @endsection

@section('contenu')
<div class="carre">
    <div align="center"><img src="{{asset('image/Bienvenut.png')}}"></div>
    <div id="column1">
    <h1>Bienvenue {{$BD[0]->prénom}} {{$BD[0]->nom}} ! </h1> 
    <p>Sur le site de réservation de places de parking.</p>
    <p><strong>L’application Parking vous permet de réserver et vous attribuer une place de parking immédiatement.</strong> Si votre demande ne peut pas être satisfaite vous serez placé en liste d’attente.</p>
    </div>
</div>
@endsection
