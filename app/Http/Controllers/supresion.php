<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\place;
use App\Models\Utilisateurs;
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
        $emailFinal = substr($chainDébut, 0,$firstIndex);
        $place = place::find($emailFinal);
        $place->delete();
        $Place = place::all();
        return view('Parking.admin.Admin_Réservation',['BD'=>$BD,'Place'=>$Place,'cpt'=>0]);     
    }
}
