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
    <li class="centre"><button class="headerActife">Réservation</button></li>
  </form>
    <form method="POST" action="/historique-admin">
  @csrf
    <input type="hidden" name="BD" id="BD" value="{{$BD}}">
    <li class="centre"><button class="header">Historique</button></li>
  </form>
  <form method="POST" action="/admin-inscriptions">
  @csrf
  <input type="hidden" name="BD" id="BD" value="{{$BD}}">
  <li class="centre"><button class="header">Paramètre compte</button></li><!-- lien ver le compte --> 
    </form>
  <form method="POST" action="/compte">
  @csrf
  <input type="hidden" name="BD" id="BD" value="{{$BD}}">
  <li class="centre"><button class="header">Compte</button></li><!-- lien ver le compte --> 
    </form>
  <li class="deco"><a href="/"><img src="{{ "https://img.icons8.com/ios/50/000000/logout-rounded-up.png"  }}" href="active"></a></li><!-- lien pour se déconecter --> 
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
    <td class="bar">cacher</td>
    <td class="bar">Supprimer</td>
  </tr>
  @foreach($Place as $p)
  @if($cpt%2 == 1)
  <tr>
    <td class="autre">{{$p->nomPlace}}</td>
    <td class="autre">{{$p->date_debut}}</td>
    <td class="autre">{{$p->id}}</td>
    <td class="autre">{{$p->date_fin}}</td>
    @if($p->cacher == 0)
      <form method="POST" action="/validation-cacher">
      @csrf
      <input type="hidden" name="BD" id="BD" value="{{$BD}}">
      <input type="hidden" name="id" id="id" value="{{$p->id}}">
      <td><button class="image"><img src="{{ asset('image/croix.jpg') }}"></button></td><!-- lien ver le compte --> 
      </form>
    @else
          <form method="POST" action="/reste">
      @csrf
      <input type="hidden" name="BD" id="BD" value="{{$BD}}">
      <input type="hidden" name="id" id="id" value="{{$p->id}}">
      <td><button class="image"><img src="{{ asset('image/valider.jpg') }}"></button></td><!-- lien ver le compte --> 
      </form>
    @endif
    @if($p->ProrioActu != 0)
      <form method="POST" action="/suprimer">
    @csrf
    <input type="hidden" name="place" id="place" value="{{$p}}">
    <input type="hidden" name="BD" id="BD" value="{{$BD}}">
    <td class="autre"><button>supprimer</button></td>
  </form>
      @else
    <td class="autre">impossible</td>
    @endif
  </tr>
@else
  <tr>
    <td >{{$p->nomPlace}}</td>
    <td >{{$p->date_debut}}</td>
    <td >{{$p->id}}</td>
    <td >{{$p->date_fin}}</td>
    @if($p->cacher == 0)
      <form method="POST" action="/validation-cacher">
      @csrf
      <input type="hidden" name="BD" id="BD" value="{{$BD}}">
      <input type="hidden" name="id" id="id" value="{{$p->id}}">
      <td><button class="image"><img src="{{ asset('image/croix.jpg') }}"></button></td><!-- lien ver le compte --> 
      </form>
    @else
          <form method="POST" action="/reste">
      @csrf
      <input type="hidden" name="BD" id="BD" value="{{$BD}}">
      <input type="hidden" name="id" id="id" value="{{$p->id}}">
      <td><button class="image"><img src="{{ asset('image/valider.jpg') }}"></button></td><!-- lien ver le compte --> 
      </form>
    @endif
    @if($p->ProrioActu != 0)
    <form method="POST" action="/suprimer">
    @csrf
    <input type="hidden" name="place" id="place" value="{{$p}}">
    <input type="hidden" name="BD" id="BD" value="{{$BD}}">
    <td class="autre"><button >supprimer</button></td>
  </form>
    @else
    <td>impossible</td>
    @endif
  </tr>
  @endif
  <p hidden='true'>{{$cpt++;}}</p>
  @endforeach
</table>
@endsection