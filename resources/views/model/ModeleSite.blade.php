<!DOCTYPE HTML>
<!-- TITRE ET MENUS -->
<html lang="fr">
<head>
<title>Parking</title>
<meta http-equiv="Content-Language" content="fr">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="cssGeneral.css" rel="stylesheet" type="text/css">
</head>
<body class="basePage">

<!--  Tableau contenant le titre -->
<table width="100%" cellpadding="0" cellspacing="0">
   <tr> 
      <td class="titre">Parking<br>
      </td>
   </tr>
</table>
<br><br>

<!--  Tableau contenant les menus -->
<table width="90%" cellpadding="0" cellspacing="0" class="tabMenu" align="center">
   <tr>
      <td class="menu"><a href="accueil">Accueil</a></td>
      <td class="menu"><a href="">
      Reservation</a></td>
      <td class="menu"><a href="">
      Liste d'attente</a></td>
      <td class="menu"><a href="">
      Compte</a></td>
   </tr>
</table>
   @yield('contenu')
</body>

</html>