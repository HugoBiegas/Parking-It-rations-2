<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Utilisateurs;
use App\Models\place;

class validation extends Controller
{
        public function retoure(){
        return redirect('/');
    }
        public function adminInscri()
    {
        $Reservation = $_POST['BD'];
        $nom = $_POST['nom'];
        $BD = Utilisateurs::where('nom','=', $nom)->get();
        $enplacement = Utilisateurs::findOrFail($BD[0]->id);
        $enplacement->valider = 1;
        $enplacement->update();
        //couper le début de la chaine 
        $substring ='email":';
        $firstIndex = stripos($Reservation, $substring);
        //recoupage de la chaine pour récup l'email
        $chainDébut = substr($Reservation, $firstIndex+8,120);
        $substring ='"';
        $firstIndex = stripos($chainDébut, $substring);
        //coupage préci de la chaine 
        $emailFinal = substr($chainDébut, 0,$firstIndex);
        $BD = Utilisateurs::where('email','=', $emailFinal)->get(); 
        $Place = place::all();
        $Compte = Utilisateurs::all();
        $cpt=0;
        $cptP=0;
        return view('Parking.admin.Admin_Gerer_Inscription',compact('BD','Place','cpt','Compte','cptP'));
    }
    public function formulaire(){
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
    $id = $_POST['id'];
    $emp = place::find($id);
    if ($emp->ProrioActu!=0) 
        return view('Parking.admin.validation-cacher', compact('BD','id'));
    else{
        $emp->cacher = true;
        $emp->update();
        $Place= place::all();
        $personne = Utilisateurs::all();
        $nb=0;
        foreach ($personne as $p) {
            $nb++;
        }
        return view('Parking.admin.Admin_Réservation', ['BD' => $BD,'Place' =>$Place, 'cpt'=>0,'nb'=>$nb]);
    }

    }
}
