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
    <li class="centre"><button class="headerActife">Reservation</button></li>
  </form>
    <form method="POST" action="/historique-admin">
  @csrf
    <input type="hidden" name="BD" id="BD" value="{{$BD}}">
    <li class="centre"><button class="header">historique</button></li>
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
<div class="carreReservationAdmin">
		<div id="column1">
		<p align="center">Faire une réservation</p>
    <form method="POST" action="/reservation-ajou-admin" >
      @csrf
        <input type="hidden" name="BD" id="BD" value="{{$BD}}">
        <p align="center"><x-input name="personne" id="personne" type='number' max="{{$nb}}" min="1" placeholder="Id personne" required/></p>
        <p align="center"><x-input name="palceN" id="palceN" type='number' max="30" min="1" placeholder="n°place" required/></p>
    <p align="center"><button>ajouter</button></p>
    </form>
	    </div>
</div>
<table class="AdminReserve">
  <tr> 
    <td class="bar">Nom</td>
    <td class="bar">Date réservation</td>
    <td class="bar">N°place</td>
    <td class="bar">Date expiration</td>
    <td class="bar">suprimer</td>
  </tr>
  @foreach($Place as $p)
  @if($cpt%2 == 1)
  <tr>
    <td class="autre">{{$p->nomPlace}}</td>
    <td class="autre">{{$p->date_debut}}</td>
    <td class="autre">{{$p->id}}</td>
    <td class="autre">{{$p->date_fin}}</td>
    @if($p->ProrioActu != 0)
      <form method="POST" action="/suprimer">
    @csrf
    <input type="hidden" name="place" id="place" value="{{$p}}">
    <input type="hidden" name="BD" id="BD" value="{{$BD}}">
    <td class="autre"><button>suprimer</button></td>
  </form>
      @else
    <td class="autre">imposible</td>
    @endif
  </tr>
@else
  <tr>
    <td >{{$p->nomPlace}}</td>
    <td >{{$p->date_debut}}</td>
    <td >{{$p->id}}</td>
    <td >{{$p->date_fin}}</td>
    @if($p->ProrioActu != 0)
    <form method="POST" action="/suprimer">
    @csrf
    <input type="hidden" name="place" id="place" value="{{$p}}">
    <input type="hidden" name="BD" id="BD" value="{{$BD}}">
    <td class="autre"><button >suprimer</button></td>
  </form>
    @else
    <td>imposible</td>
    @endif
  </tr>
  @endif
  <p hidden='true'>{{$cpt++;}}</p>
  @endforeach
</table>
@endsection