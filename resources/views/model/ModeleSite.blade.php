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
      <span id="texteNiveau2" class="texteNiveau2">
      Parking</span><br>&nbsp;
      </td>
   </tr>
</table>


<!--  Tableau contenant les menus -->
<table width="80%" cellpadding="0" cellspacing="0" class="tabMenu" align="center">
   <tr>
      <td class="menu"><a href="accueil">Accueil</a></td>
      <td class="menu"><a href="">
      Gestion d'équipes</a></td>
      <td class="menu"><a href="">
      Gestion établissements</a></td>
      <td class="menu"><a href="">
      Attributions chambres</a></td>
   </tr>
</table>
   @yield('contenu')
</body>

</html>