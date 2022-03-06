<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\place;
use App\Models\Utilisateurs;
use App\Utilisateur;


class reservationAjoue extends Controller
{
    public function retoure(){
        return redirect('/');
    }
    
    public function ReservationAdd()
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

        $place = place::create([
            'email' => request('email'),
            'date_debut'=> '06-03-2022',
        ]);
        return redirect('/reservation',[$_POST['DB'], $BD]);
    }
}
