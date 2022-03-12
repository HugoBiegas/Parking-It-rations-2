<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Models\Utilisateurs;

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
        $user = utilisateurs::where('email', '=', request('email'))->get();
            // À faire : vérification que l'email et le mot de passe sont corrects.
            if ($user->isEmpty()) {
                return view('Parking.compte.connection');
            }

            if (!Hash::check(request('password'), $user[0]->mot_de_passe)) {
                return view('Parking.compte.connection');
            }
            if ($user[0]->valider == 0) {
                return view('Parking.compte.connection');
            }
            if ($user[0]->admin == 0)
                return view('Parking.utilisateur.aceuil', [ 'email' => request('email'), 'BD'=>$user]);
            else
                 return view('Parking.admin.Admin-aceuil', [ 'email' => request('email'),'BD'=>$user]);            

        return view('Parking.compte.connection');
    }
}
