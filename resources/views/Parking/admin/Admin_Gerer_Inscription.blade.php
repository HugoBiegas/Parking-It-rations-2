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
  <form method="POST" action="/admin-inscriptions">
  @csrf
  <input type="hidden" name="BD" id="BD" value="{{$BD}}">
  <li><button class="image"><img src="{{ asset('image/admin-active.jpg') }}"></button></li><!-- lien ver le compte --> 
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
    <p align="center">Créer un compte</p>
    <form action="POST" action="/reservation">
      @csrf
        <p align="center"><x-input id="identifiant"  placeholder="identifiant" required /></p>
        <p align="center"><x-input id="nom"  placeholder="nom" required /></p>
        <p align="center"><x-input id="prenom"  placeholder="prenom" required/></p>
        <p align="center"><x-input id="adresse e-mail"  placeholder="adresse e-mail" required/></p>
        <p align="center"><x-input id="Mot de passe"  placeholder="Mot de passe" required/></p>
    <p align="center"><input class="favorite styledLA" type="button" value="ajouter"></p>      
    </form>

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
    <td class="bar">valider</td>
  </tr>
    @foreach($Compte as $C)
    @if($cpt%2 == 1)
    <tr>
      <td class="autre">{{$C->nom}}</td>
        @foreach($Place as $p)
          @if($p->nom == $C->nom)
            <td class="autre">{{$p->date_debut}}</td>
            <td class="autre">{{$p->id}}</td>
            <td class="autre">{{$p->date_debut}}</td>
            <p hidden='true'>{{$cptP++;}}</p>
          @endif
        @endforeach
        @if($cptP==0)
          <td class="autre"></td>
          <td class="autre"></td>
          <td class="autre"> </td>
        @endif
        <p hidden='true'>{{$cptP=0;}}</p>
      <form method="POST" action="/Modifier-admin-compte">
      @csrf
      <input type="hidden" name="id" id="id" value="{{$C->id}}">
      <input type="hidden" name="BD" id="BD" value="{{$BD}}">
      <td class="autre"><button>Modifier</button></td>
    </form>

    @if($C->admin == 0)
      <form method="POST" action="/suprimer-admin">
      @csrf
      <input type="hidden" name="id" id="id" value="{{$C->id}}">
      <input type="hidden" name="BD" id="BD" value="{{$BD}}">
      <td class="autre"><button>suprimer</button></td>
    </form>
      @else
      <td></td>
    @endif

    @if($C->valider == 0)
      <form method="POST" action="/acceptations">
      @csrf
      <input type="hidden" name="BD" id="BD" value="{{$BD}}">
      <input type="hidden" name="nom" id="nom" value="{{$C->nom}}">
      <td><button class="image"><img src="{{ asset('image/croix.jpg') }}"></button></td><!-- lien ver le compte --> 
      </form>
    @else
      <td ><img src="{{ asset('image/valider.jpg') }}"></td>
    @endif

    </tr>

    @else

    <tr>
      <td>{{$C->nom}}</td>
        @foreach($Place as $p)
          @if($p->nom == $C->nom)
            <td >{{$p->date_debut}}</td>
            <td >{{$p->id}}</td>
            <td >{{$p->date_debut}}</td>
            <p hidden='true'>{{$cptP++;}}</p>
          @endif
        @endforeach
        @if($cptP==0)
          <td></td>
          <td></td>
          <td></td>
        @endif
        <p hidden='true'>{{$cptP=0;}}</p>
      <form method="POST" action="/Modifier-admin-compte">
      @csrf
      <input type="hidden" name="id" id="id" value="{{$C->id}}">
      <input type="hidden" name="BD" id="BD" value="{{$BD}}">
      <td ><button >Modifier</button></td>
    </form>

    @if($C->admin == 0)
      <form method="POST" action="/suprimer-admin">
      @csrf
      <input type="hidden" name="id" id="id" value="{{$C->id}}">
      <input type="hidden" name="BD" id="BD" value="{{$BD}}">
      <td ><button>suprimer</button></td>
    </form>
    @else
      <td></td>
    @endif

    @if($C->valider == 0)
      <form method="POST" action="/acceptations">
      @csrf
      <input type="hidden" name="BD" id="BD" value="{{$BD}}">
      <input type="hidden" name="nom" id="nom" value="{{$C->nom}}">
      <td><button class="image"><img src="{{ asset('image/croix.jpg') }}"></button></td><!-- lien ver le compte --> 
      </form>
    @else
      <td ><img src="{{ asset('image/valider.jpg') }}"></td>
    @endif

    </tr>
    @endif
    <p hidden='true'>{{$cpt++;}}</p>

  @endforeach
</table>

@endsection