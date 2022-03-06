<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Utilisateurs;
use App\Utilisateur;
use App\Models\place;
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
        $BD = Utilisateur::where('email','=', $emailFinal)->get();
        $Place = place::all();
        if($BD[0]->admin == 0){
            return view('Parking.utilisateur.Reservation',['BD' => $BD, 'Place' =>$Place, 'cpt'=>0]);
        }else if ($BD[0]->admin == 1) {
            return view('Parking.admin.Admin_Réservation',['BD' => $BD,'Place' =>$Place, 'cpt'=>0]);
        }
        return view('Parking.compte.connection');
    }
}
