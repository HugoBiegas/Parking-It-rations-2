<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Utilisateurs;
use Illuminate\Support\Facades\Hash;
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
    $BD = Utilisateurs::where('email','=', $emailFinal)->get();
    if($BD[0]->admin == 0){
        return view('Parking.utilisateur.Compte_Info',['BD' => $BD]);
    }else if ($BD[0]->admin == 1) {
        return view('Parking.admin.Compte_Info',['BD' => $BD]);
    }
    return view('Parking.compte.connection');        
    }

    public function ajouteCompte(){
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
    $BD = Utilisateurs::where('email','=', $emailFinal)->get();
    Utilisateurs::create([
            'admin'=>$_POST['admin'],
            'email' => $_POST['email'],
            'mot_de_passe' => Hash::make($_POST['MDP']),
            'prénom' => $_POST['prenom'],
            'nom' => $_POST['nom'],
            'ranfile'=>0,
            'valider'=>1,
            'date_demande'=>'',
    ]);   
    $Compte = utilisateurs::all();
    $cpt=0;
    return view('Parking.admin.Admin_Gerer_Inscription',compact('BD','cpt','Compte'));
    }
}
