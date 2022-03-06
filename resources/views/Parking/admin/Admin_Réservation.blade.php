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
        <p align="center"><x-input id="identifiant"  placeholder="identifiant"/></p>
        <p align="center"><x-input id="Date"  placeholder="date"/></p>
        <p align="center"><x-input id="palceN"  placeholder="n°place"/></p>
        <p align="center"><x-input id="DateExpir"  placeholder="Date d'expiration"/></p>
		<p align="center"><input class="favorite styledLA" type="button" value="ajouter"></p>
	    </div>
</div>
<table class="AdminReserve">
  <tr> 
    <td class="bar">Nom</td>
    <td class="bar">Date réservation</td>
    <td class="bar">N°place</td>
    <td class="bar">Date expiration</td>
    <td class="bar">Modifier</td>
    <td class="bar">suprimer</td>
  </tr>
  <tr>
    <td class="autre">Date réservation</td>
    <td class="autre">Jack Russell</td>
    <td class="autre">Poodle</td>
    <td class="autre">Date réservation</td>
    <form method="POST" action="/Modifier-admin">
    @csrf
    <input type="hidden" name="BD" id="BD" value="{{$BD}}">
    <td class="autre"><button>Modifier</button></td>
  </form>
    <td class="autre">Poodle</td>
  </tr>
  <tr>
    <td >Date réservation</td>
    <td >N°place</td>
    <td >16</td>
    <td >Date réservation</td>
    <form method="POST" action="/Modifier-admin">
    @csrf
    <input type="hidden" name="BD" id="BD" value="{{$BD}}">
    <td class="autre"><button >Modifier</button></td>
  </form>
    <td >16</td>
  </tr>
</table>
@endsection