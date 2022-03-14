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
    <li class="centre"><button class="header">Réservation</button></li>
  </form>
  <form method="POST" action="/liste-attente">
  @csrf
    <input type="hidden" name="BD" id="BD" value="{{$BD}}">
    <li class="centre"><button class="headerActife">Liste d'attente</button></li>
  </form>
  <form method="POST" action="/compte">
  @csrf
  <input type="hidden" name="BD" id="BD" value="{{$BD}}">
  <li class="centre"><button class="header">Compte</button></li><!-- lien ver le compte --> 
    </form>
  <li class="deco"><a href="/"><img src="{{ "https://img.icons8.com/ios/50/000000/logout-rounded-up.png" }}" href="active"></a></li><!-- lien pour se déconecter --> 
@endsection
@section('contenu')
<p class="nom">Vous êtes <strong>N°{{$BD[0]->rangfile}}</strong> dans la liste d'attente</p>
<form method="POST" action="/liste-attente-anule">
  @csrf
  <input type="hidden" name="BD" id="BD" value="{{$BD}}">
  <button class="center">annuler ma réservation</button>
  
</form>

<table class="Liste">
  <tr> 
    <td class="bar">Nom</td>
    <td class="bar">Position liste d'attente</td>
    <td class="bar">Date demande réservation</td>
  </tr>
  @foreach($rang as $g)
  @if($cpt%2 == 1)
    <tr>
    <td class="autre">{{$g->nom}}</td>
    <td class="autre">{{$g->rangfile}}</td>
    <td class="autre">{{$g->date_demande}}</td>
  </tr>    
  @else
  <tr>
    <td >{{$g->nom}}</td>
    <td >{{$g->rangfile}}</td>
    <td >{{$g->date_demande}}</td>
  </tr>  
@endif 
<p hidden="true">{{$cpt++}}</p>    
@endforeach
</table>
@endsection