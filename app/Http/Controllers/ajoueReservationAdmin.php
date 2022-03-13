<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Utilisateurs;
use App\Models\Historique;
use App\Models\place;

class ajoueReservationAdmin extends Controller
{
    public function retoure(){
        return redirect('/');
    }

    public function adminInscri()
    {
        $Reservation = $_POST['BD'];
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
        $Compte = utilisateurs::all();
        $cpt=0;
        return view('Parking.admin.Admin_Gerer_Inscription',compact('BD','cpt','Compte'));
    }    
    public function ajouteReserve()
    {
        $Reservation = $_POST['BD'];
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
        $local = place::find($_POST['palceN']);
        if ($local->ProrioActu ==0) {
            $local->ProrioActu = $_POST['personne'];
            $local->date_debut = date('d-m-y');
            $local->date_fin = date('d-m-y', strtotime('+7 days'));
            $local->update();
            $placeF = place::find($_POST['palceN']);
            Historique::create([
                'ProrioActuHisto'=>$_POST['personne'],
                'nomPlaceHistorique'=>$placeF->nomPlace,
                'date_debut_reserve' => date('d-m-y'),
                'date_fin_reserve'=> date('d-m-y', strtotime('+7 days')),
            ]);
        }
        $Place = place::all();
        $cpt = 0;
        $personne = Utilisateurs::all();
        $nb=0;
        foreach ($personne as $p) {
            $nb++;
        }
        return view('Parking.admin.Admin_Réservation',compact('BD','Place','cpt','nb'));
    }              
}
