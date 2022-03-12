<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Utilisateurs;
use App\Models\place;
use App\Models\Historique;

class Reservation extends Controller
{
    public function retoure(){
        return redirect('/');
    }
    
    public function ReservationMiseEnPlace()
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
        $histo = Historique::where('ProrioActuHisto','=', $BD[0]->id)->get();;
        if($BD[0]->admin == 0){
            return view('Parking.utilisateur.Reservation',['BD' => $BD, 'histo' =>$histo, 'cpt'=>0]);
        }else if ($BD[0]->admin == 1) {
            return view('Parking.admin.Admin_Réservation',['BD' => $BD,'histo' =>$histo, 'cpt'=>0]);
        }
        return view('Parking.compte.connection');
    }
        public function ReservationMiseEnPlaceAdmin()
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
        $Place = place::all();
        if($BD[0]->admin == 0){
            return view('Parking.utilisateur.Reservation',['BD' => $BD, 'Place' =>$Place, 'cpt'=>0]);
        }else if ($BD[0]->admin == 1) {
            return view('Parking.admin.Admin_Réservation',['BD' => $BD,'Place' =>$Place, 'cpt'=>0]);
        }
        return view('Parking.compte.connection');
    }

}
