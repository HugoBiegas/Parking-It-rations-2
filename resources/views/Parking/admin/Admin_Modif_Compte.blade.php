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
  <li><button class="image"><img src="{{ asset('image/compte_info.jpg') }}"></button></li><!-- lien ver le compte --> 
    </form>
  <li><a href="/"><img src="{{ asset('image/deconection.jpg') }}" href="active"></a></li><!-- lien pour se déconecter --> 
@endsection
@section('contenu')
<div class="carreReservationAdmin">
		<div id="column1">
		<p align="center">Modifier Compte</p>
    <form method="POST" action="/Modifier-admin-modif">
      @csrf
    @foreach($comptM as $cm)
    <p align="center" hidden="true"><x-input   name="id"  value="{{$cm->id}}"/></p>
          <p align="center" hidden="true"><x-input   name="BD"  value="{{$BD}}"/></p>
        <p align="center"><x-input   name="nom"  value="{{$cm->nom}}"/></p>
        <p align="center"><x-input   name="prenom"  value="{{$cm->prénom}}"/></p>
        <p align="center"><x-input  name="email"  value="{{$cm->email}}"/></p>
    <p align="center"><button>Modifier</button></p>
    @endforeach      
    </form>

        <form method="POST" action="/admin-inscriptions">
    @csrf
    <input type="hidden" name="BD" id="BD" value="{{$BD}}">
    <td class="autre"><button >Retour</button></td>
  </form>
	    </div>
</div>
@endsection