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
  <li class="centre"><button class="headerActife">Paramètre compte</button></li><!-- lien ver le compte --> 
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
    <p align="center">Créer un compte</p>
    <form method="POST" action="/ajoue-compte-admin">
      @csrf
        <input type="hidden" name="BD" id="BD" value="{{$BD}}">
        <p align="center"><x-input name="admin" id="admin" type="number" max="1" min="0" placeholder="admin" required /></p>
        <p align="center"><x-input name="nom" id="nom"  placeholder="nom" required /></p>
        <p align="center"><x-input name="prenom" id="prenom"  placeholder="prenom" required/></p>
        <p align="center"><x-input name="email" id="email" class="block mt-1 w-full" type="email" placeholder="adresse e-mail" required/></p>
        <p align="center"><x-input name="MDP" id="MDP"  class="block mt-1 w-full" type="password" placeholder="Mot de passe" required/></p>
    <p align="center"><button>ajouter</button></p>      
    </form>

      </div>
</div>
<table class="AdminReserve">
  <tr> 
    <td class="bar">Nom</td>
    <td class="bar">Modifier</td>
    <td class="bar">Supprimer</td>
    <td class="bar">valider</td>
  </tr>
    @foreach($Compte as $C)
    @if($cpt%2 == 1)
    <tr>
      <td class="autre">{{$C->nom}}</td>
    @if($C->admin == 0)
      <form method="POST" action="/Modifier-admin-compte">
      @csrf
      <input type="hidden" name="id" id="id" value="{{$C->id}}">
      <input type="hidden" name="BD" id="BD" value="{{$BD}}">
      <td class="autre"><button>Modifier</button></td>
    </form>
      <form method="POST" action="/suprimer-admin">
      @csrf
      <input type="hidden" name="id" id="id" value="{{$C->id}}">
      <input type="hidden" name="BD" id="BD" value="{{$BD}}">
      <td class="autre"><button>Supprimer</button></td>
    </form>
      @else
      <td></td>
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
    @if($C->admin == 0)
          <form method="POST" action="/Modifier-admin-compte">
      @csrf
      <input type="hidden" name="id" id="id" value="{{$C->id}}">
      <input type="hidden" name="BD" id="BD" value="{{$BD}}">
      <td ><button >Modifier</button></td>
    </form>
      <form method="POST" action="/suprimer-admin">
      @csrf
      <input type="hidden" name="id" id="id" value="{{$C->id}}">
      <input type="hidden" name="BD" id="BD" value="{{$BD}}">
      <td ><button>Supprimer</button></td>
    </form>
    @else
      <td></td>
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