<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Utilisateurs;
use App\Utilisateur;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request\with;

class acueil extends Controller
{
    public function redirection(Request $request)
    {

        $BD = Utilisateur::where('email','=', $request->email)->get();
        $i=0;
        foreach($BD as $cpt){
            $i++;
        }
        if ($i>0) {
        if ($BD[0]->admin == 0) 
            return view('Parking.Utilisateur_et_admin.aceuil',['BD' => $BD]);
        else if ($BD[0]->admin == 1) 
            return view('Parking.Utilisateur_et_admin.aceuil',['BD' => $BD]); 
        }
        return view('Parking.compte.connection');
    }


}
