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
  @yield('header')
  <li><a href=""><img src="{{ asset('image/deconection.jpg') }}" href="active"></a></li><!-- lien pour se déconecter --> 
</ul>
   @yield('contenu')
</body>

</html>