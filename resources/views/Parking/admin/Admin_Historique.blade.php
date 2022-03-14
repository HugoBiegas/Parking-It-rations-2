@extends('model.ModeleSite')
@section('header')
<form method="POST" action="/page-acueil">
  @csrf
    <input type="hidden" name="BD" id="BD" value="{{$BD}}">
    <li class="centre"><button class="header">Accueil</button></li>
</form>
<form method="POST" action="/reservation-admin">
  @csrf
    <input type="hidden" name="BD" id="BD" value="{{$BD}}">
    <li class="centre"><button class="header">Réservation</button></li>
  </form>
    <form method="POST" action="/historique-admin">
  @csrf
    <input type="hidden" name="BD" id="BD" value="{{$BD}}">
    <li class="centre"><button class="headerActife">Historique</button></li>
  </form>
  <form method="POST" action="/admin-inscriptions">
  @csrf
  <input type="hidden" name="BD" id="BD" value="{{$BD}}">
  <li class="centre"><button class="header">Paramètre compte</button></li></button></li><!-- lien ver le compte --> 
    </form>
  <form method="POST" action="/compte">
  @csrf
  <input type="hidden" name="BD" id="BD" value="{{$BD}}">
  <li class="centre"><button class="header">Compte</button></li><!-- lien ver le compte --> 
    </form>
  <li class="deco"><a href="/"><img src="{{ "https://img.icons8.com/ios/50/000000/logout-rounded-up.png"  }}" href="active"></a></li><!-- lien pour se déconecter --> 
 
@endsection
@section('contenu')

<table class="Reservation">
  <tr>
    <td class="bar">N°place</td>
    <td class="bar">N°personne reserver</td>
    <td class="bar">Date début</td>
    <td class="bar">Date fin</td>
  </tr>
  @foreach($histo as $h)
  @if($cpt%2 == 1)
    <tr>
    <td class="autre">{{$h->nomPlaceHistorique}}</td>
    <td class="autre">{{$h->ProrioActuHisto}}</td>
    <td class="autre">{{$h->date_debut_reserve}}</td>
    <td class="autre">{{$h->date_fin_reserve}}</td>
  </tr>    
  @else
  <tr>
    <td >{{$h->nomPlaceHistorique}}</td>
    <td >{{$h->ProrioActuHisto}}</td>
    <td >{{$h->date_debut_reserve}}</td>
    <td >{{$h->date_fin_reserve}}</td>
  </tr>  
@endif
<p hidden="true">{{$cpt++}}</p>
@endforeach
</table>

@endsection