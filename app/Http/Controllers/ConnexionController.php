<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Utilisateur;

class ConnexionController extends Controller
{
    public function formulaire()
    {
        return view('Parking.compte.connection');
    }

    public function traitement()
    {
        request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $user = utilisateur::where('email', '=', request()->input('email'))->first();
            // À faire : vérification que l'email et le mot de passe sont corrects.
            if (!$user) {
                return view('Parking.compte.connection');
            }
            if (!Hash::check(request()->input('password'), $user->mot_de_passe)) {
                return view('Parking.compte.connection');
            }

            return route('Parking.Utilisateur_et_admin.aceuil', [ 'email' => request('email')]);
    }
}
