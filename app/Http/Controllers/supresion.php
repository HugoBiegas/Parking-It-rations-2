<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\place;
use App\Models\Utilisateurs;
use App\Models\Historique;
use App\Utilisateur;

class supresion extends Controller
{
        public function retoure(){
        return redirect('/');
    }
        public function détruire()
    {
        $place = $_POST['place'];
        $détruire = $_POST['BD'];
        //couper le début de la chaine 
        $substring ='email":';
        $firstIndex = stripos($détruire, $substring);
        //recoupage de la chaine pour récup l'email
        $chainDébut = substr($détruire, $firstIndex+8,120);
        $substring ='"';
        $firstIndex = stripos($chainDébut, $substring);
        //coupage préci de la chaine 
        $emailFinal = substr($chainDébut, 0,$firstIndex);
        $BD = Utilisateur::where('email','=', $emailFinal)->get();
        $substring ='id":';
        $firstIndex = stripos($place, $substring);
        //recoupage de la chaine pour récup l'email
        $chainDébut = substr($place, $firstIndex+4,120);
        $substring =',';
        $firstIndex = stripos($chainDébut, $substring);
        //id de la personne 
        $id = substr($chainDébut, 0,$firstIndex);
        $place = place::find($id);
        $histo = Historique::find($place->nomPlace);
        $histo->date_fin_reserve = date('d-m-y');
        $histo->update();
        $place->nomPlace  ='place libre';
        $place->date_debut  ='';
        $place->date_fin  ='';
        $place->update(); 
        $Place = place::all();
        return view('Parking.admin.Admin_Réservation',['BD'=>$BD,'Place'=>$Place,'cpt'=>0]);     
    }

    public function suprimerCompte()
    {
        $id = $_POST['id'];
        $enplacement = Utilisateurs::find($id);        
        $enplacement->delete();

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
        $BD = Utilisateur::where('email','=', $emailFinal)->get();
        $Place = place::all();
        $Compte = utilisateurs::all();
        $cpt=0;
        $cptP=0;
        return view('Parking.admin.Admin_Gerer_Inscription',compact('BD','Place','cpt','Compte','cptP'));   
    }
}
