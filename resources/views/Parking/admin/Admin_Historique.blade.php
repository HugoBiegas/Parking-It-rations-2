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
    <li class="centre"><button class="header">Reservation</button></li>
  </form>
    <form method="POST" action="/historique-admin">
  @csrf
    <input type="hidden" name="BD" id="BD" value="{{$BD}}">
    <li class="centre"><button class="headerActife">historique</button></li>
  </form>
  <form method="POST" action="/admin-inscriptions">
  @csrf
  <input type="hidden" name="BD" id="BD" value="{{$BD}}">
  <li><button class="image"><img src="{{ asset('image/admin.jpg') }}"></button></li><!-- lien ver le compte --> 
    </form>
  <form method="POST" action="/compte">
  @csrf
  <input type="hidden" name="BD" id="BD" value="{{$BD}}">
  <li><button class="image"><img src="{{ asset('image/compte.jpg') }}"></button></li><!-- lien ver le compte --> 
    </form>
  <li><a href="/"><img src="{{ asset('image/deconection.jpg') }}" href="active"></a></li><!-- lien pour se déconecter --> 
 
@endsection
@section('contenu')

<table class="Reservation">
  <tr>
    <td class="bar">N°place</td>
    <td class="bar">N°personne reserver</td>
    <td class="bar">date début</td>
    <td class="bar">date fin</td>
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