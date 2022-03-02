<!DOCTYPE HTML>
<!-- TITRE ET MENUS -->
<html lang="fr">
<head>
<title>Parking</title>
<meta http-equiv="Content-Language" content="fr">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="cssGeneral.css" rel="stylesheet" type="text/css">

</head>
<body>
<ul cellpadding=5 >
  <li ><img src="{{ asset('image/logo.png') }}"></li>
  <li class="centre"><a class="active" href="#home">Accueil</a></li>
  <li class="centre"><a href="#news">Reservation</a></li>
  <li class="centre"><a href="#contact">Liste d'attente</a></li>
  <li><a href="active"><img src="{{ asset('image/compt.jpg') }}" href="login"></a></li><!-- lien ver le compte --> 
  <li><a href="active"><img src="{{ asset('image/deconection.jpg') }}" href="active"></a></li><!-- lien pour se déconecter --> 
  <li></li>
</ul>
   @yield('contenu')
</body>

</html>