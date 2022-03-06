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
    <li class="centre"><button class="headerActife">Reservation</button></li>
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
<div class="carreReservation">
    <div id="column1">
    <h1 align="center">Faire une réservation</h1> 
    <p align="center">Cliquer ici</p>
    <form method="POST" action="/reservation-ajou">
      @csrf    
      <input type="hidden" name="BD" id="BD" value="{{$BD}}">
      <p align="center"><button><input class="favorite styled"
       type="button"
       value="Réserver">
     </button></p>
    </form >
    </div>
</div>
<table class="Reservation">
  <tr>
    <td class="bar">Nom</td>
    <td class="bar">Date réservation</td>
    <td class="bar">N°place</td>
  </tr>
  @foreach($Place as $p)
  @if($cpt%2 == 1)
    <tr>
    <td class="autre">{{$p->nomPlace}}</td>
    <td class="autre">{{$p->date_debut}}</td>
    <td class="autre">{{$p->id}}</td>
  </tr>    
  @else
  <tr>
    <td >{{$p->nomPlace}}</td>
    <td >{{$p->date_debut}}</td>
    <td >{{$p->id}}</td>
  </tr>  
@endif
<p hidden="true">{{$cpt++}}</p>
@endforeach
</table>

@endsection