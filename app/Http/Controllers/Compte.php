<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Utilisateurs;
use App\Utilisateur;
class Compte extends Controller
{
    public function retoure(){
        return redirect('/');
    }
    public function CompteLoad(){
    $Compte = $_POST['BD'];
    //couper le début de la chaine 
    $substring ='email":';
    $firstIndex = stripos($Compte, $substring);
    //recoupage de la chaine pour récup l'email
    $chainDébut = substr($Compte, $firstIndex+8,120);
    $substring ='"';
    $firstIndex = stripos($chainDébut, $substring);
    //coupage préci de la chaine 
    $emailFinal = substr($chainDébut, 0,$firstIndex);
    $BD = Utilisateur::where('email','=', $emailFinal)->get();
    if($BD[0]->admin == 0){
        return view('Parking.Utilisateur_et_admin.Compte_Info',['BD' => $BD]);
    }else if ($BD[0]->admin == 1) {
        return view('Parking.Utilisateur_et_admin.Compte_Info',['BD' => $BD]);
    }
    return view('Parking.compte.connection');        
    }
}
