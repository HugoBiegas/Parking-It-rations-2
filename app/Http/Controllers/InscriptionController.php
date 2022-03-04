<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Models\Utilisateurs;
use App\Utilisateur;

class InscriptionController extends Controller
{
    public function formulaire()
    {
        return view('Parking.compte.Inscription');
    }
    public function traitement()
    {
        $BD = Utilisateurs::all();
        //Condition a verifier pour la conformité du formulaire
    request()->validate([
        'email' => ['required', 'email'],
        'password' => ['required', 'confirmed', 'min:8'],
        'password_confirmation' => ['required'],
    ], [
        'password.min' => 'Pour des raisons de sécurité, votre mot de passe doit faire :min caractères.'
    ]);
    if (request()->input('password') == request()->input('password_confirmation')) {
        foreach($BD as $email)
        {
            if($email->email == request()->input('email')){

                return view('Parking.compte.Inscription');
            }

        }
        //Création de l'utilisateur
        $utilisateur = Utilisateur::create([
            'email' => request('email'),
            'mot_de_passe' => Hash::make(request('password')),
            'prénom' => request('prénom'),
            'nom' => request('nom'),
        ]);
        return view('Parking.compte.connection');

    }
    return view('Parking.compte.Inscription');
    
    }
}
