<?php

namespace App\Http\Controllers;
use App\Utilisateur;

class ConnexionController extends Controller
{
    public function formulaire()
    {
        return view('connexion');
    }

    public function traitement()
    {
        request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
    
        // À faire : vérification que l'email et le mot de passe sont corrects.
    
        return 'Traitement formulaire connexion';
    }
}
