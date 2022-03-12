<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Utilisateurs;
use App\Models\place;


class modifCompte extends Controller
{
    public function retoure(){
        return redirect('/');
    }
    public function adminCompteM(){
    $comptM = $_POST['id'];
    $comptM = Utilisateurs::where('id','=', $comptM)->get();
    $BD = $_POST['BD'];
    //couper le début de la chaine 
    $substring ='email":';
    $firstIndex = stripos($BD, $substring);
    //recoupage de la chaine pour récup l'email
    $chainDébut = substr($BD, $firstIndex+8,120);
    $substring ='"';
    $firstIndex = stripos($chainDébut, $substring);
    //coupage préci de la chaine 
    $emailFinal = substr($chainDébut, 0,$firstIndex);
    $BD = Utilisateurs::where('email','=', $emailFinal)->get();

    return view('Parking.admin.Admin_Modif_Compte',compact('BD','comptM'));     
    }
    public function adminComptUpdate(){
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $recherche = Utilisateurs::find($id);
    $recherche->nom = $nom;
    $recherche->prénom = $prenom;
    $recherche->email = $email;
    $recherche->update();
    $BD = $_POST['BD'];
    //couper le début de la chaine 
    $substring ='email":';
    $firstIndex = stripos($BD, $substring);
    //recoupage de la chaine pour récup l'email
    $chainDébut = substr($BD, $firstIndex+8,120);
    $substring ='"';
    $firstIndex = stripos($chainDébut, $substring);
    //coupage préci de la chaine 
    $emailFinal = substr($chainDébut, 0,$firstIndex);
    $BD = Utilisateurs::where('email','=', $emailFinal)->get();
        $Place = place::all();
        $Compte = utilisateurs::all();
        $cpt=0;
        $cptP=0;
        return view('Parking.admin.Admin_Gerer_Inscription',compact('BD','Place','cpt','Compte','cptP'));
    }

}
