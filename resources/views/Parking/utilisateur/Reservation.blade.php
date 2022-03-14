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
    <li class="centre"><button class="headerActife">Réservation</button></li>
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
  <li class="deco"><a href="/"><img src="{{ "https://img.icons8.com/ios/50/000000/logout-rounded-up.png" }}" href="active"></a></li><!-- lien pour se déconecter --> 
@endsection
@section('contenu')
<div class="carreReservation">
    <div id="column1">
    <h1 align="center">Faire une réservation</h1> 
    <p align="center">Cliquer ici</p>
    <form method="POST" action="/reservation-ajou">
      @csrf    
      <input type="hidden" name="BD" id="BD" value="{{$BD}}">
      <p align="center"><button>Réserver</button></p>
    </form >
    </div>
</div>
<table class="Reservation">
  <tr>
    <td class="bar">NomPlace</td>
    <td class="bar">Date début</td>
    <td class="bar">Date fin</td>
    <td class="bar">Annuler</td>
  </tr>
  @foreach($histo as $h)
  @if($cpt%2 == 1)
    <tr>
    <td class="autre">{{$h->nomPlaceHistorique}}</td>
    <td class="autre">{{$h->date_debut_reserve}}</td>
    <td class="autre">{{$h->date_fin_reserve}}</td>
    @if($h->date_fin_reserve > date('d-m-y'))
      <form method="POST" action="/anule-reserve">
        @csrf
      <input type="hidden" name="Histo" id="Histo" value="{{$h}}">
      <input type="hidden" name="BD" id="BD" value="{{$BD}}">
      <td class="autre"><button>annuler</button></td>        
      </form>
      @else
      <td>dejat fini</td>
    @endif
  </tr>    
  @else
  <tr>
    <td >{{$h->nomPlaceHistorique}}</td>
    <td >{{$h->date_debut_reserve}}</td>
    <td >{{$h->date_fin_reserve}}</td>
    @if($h->date_fin_reserve > date('d-m-y'))
      <form method="POST" action="/anule-reserve">
        @csrf
      <input type="hidden" name="Histo" id="Histo" value="{{$h}}">
      <input type="hidden" name="BD" id="BD" value="{{$BD}}">
      <td><button>annuler</button></td>        
      </form>

      @else
      <td>dejat fini</td>
    @endif
  </tr>  
@endif
<p hidden="true">{{$cpt++}}</p>
@endforeach
</table>

@endsection