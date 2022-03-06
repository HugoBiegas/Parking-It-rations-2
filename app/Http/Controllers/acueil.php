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
            return view('Parking.utilisateur.aceuil',['BD' => $BD]);
        else if ($BD[0]->admin == 1) 
            return view('Parking.admin.Admin-aceuil',['BD' => $BD]); 
        }else{
            if (empty($_POST['BD']))
            return redirect('/');//si il est pas co on l'envoi sur la connections    
            $arriver = $_POST['BD'];//récupérations de la chéne en post
            //couper le début de la chaine 
            $substring ='email":';
            $firstIndex = stripos($arriver, $substring);
            //recoupage de la chaine pour récup l'email
            $chainDébut = substr($arriver, $firstIndex+8,120);
            $substring ='"';
            $firstIndex = stripos($chainDébut, $substring);
            //coupage préci de la chaine 
            $emailFinal = substr($chainDébut, 0,$firstIndex);

            $BD = Utilisateur::where('email','=', $emailFinal)->get();
            if ($BD[0]->admin == 0) //utilisateur normal
                 return view('Parking.utilisateur.aceuil',['BD' => $BD]);
            else if ($BD[0]->admin == 1) //admin
                return view('Parking.admin.Admin-aceuil',['BD' => $BD]); 

            return view('Parking.compte.connection');//si il est pas co on l'envoi sur la connections     
        }
    }
}
