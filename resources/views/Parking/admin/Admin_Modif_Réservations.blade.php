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
		<p align="center">Modifier réservation</p>
        <p align="center"><x-input id="Date"  placeholder="date"/></p>
        <p align="center"><x-input id="palceN"  placeholder="n°place"/></p>
        <p align="center"><x-input id="DateExpir"  placeholder="Date d'expiration"/></p>
		<p align="center"><input class="favorite styledLA" type="button" value="Modifier"></p>
        <form method="POST" action="/reservation-admin">
    @csrf
    <input type="hidden" name="BD" id="BD" value="{{$BD}}">
    <td class="autre"><button >Retour</button></td>
  </form>
	    </div>
</div>
@endsection