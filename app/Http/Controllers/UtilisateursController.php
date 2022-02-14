<?php

namespace App\Http\Controllers;

use App\Utilisateur;

class UtilisateursController extends Controller
{
    public function listetest()
    {
        $utilisateurs = Utilisateur::all(); //Récupération de TOUS les utilisateurs
    //Affichage de la page exemple_liste_users avec les utilisateurs recupéré
    //exemple_liste_users.blade.php --> Page test pour afficher la liste des utilisateurs
    return view('exemple_liste_users', [
        'utilisateurs' => $utilisateurs
    ]);
    }
}
