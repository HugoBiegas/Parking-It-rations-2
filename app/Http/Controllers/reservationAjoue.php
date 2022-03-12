<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\place;
use App\Models\Utilisateurs;
use App\Models\Historique;


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
        $BD = Utilisateurs::where('email','=', $emailFinal)->get();
        $Info = place::where('nomPlace','=', 'place libre')->get();
        $Place = place::all();
        $cpt=0;
        //tester si il as dejat une place
        foreach ($Place as $p) {
            if ($p->nomPlace == $BD[0]->nom) {
                   $cpt++;
               } 
        }
        $histo = Historique::where('nomPlaceHistorique','=', $BD[0]->nom)->get();

        if ($cpt == 0 ) {
                $cpt=0;
                //prise de la place 

            if (!empty($Info)) {
                $enplacement = place::find($Info[0]->id);
                $enplacement->nomPlace = $BD[0]->nom;
                $enplacement->update(); 
                Historique::create([
                    'nomPlaceHistorique'=>$BD[0]->nom,
                    'date_debut_reserve' => date('d-m-y'),
                    'date_fin_reserve'=> '',
                ]);
                return view('Parking.utilisateur.Reservation',compact('BD','histo','cpt'));     
            }else{
            //si il y as plus de place
                $Info = Utilisateurs::where('rangfile','!=', null)->get();
                foreach ($Info as $I) {
                    $cpt++;
                }
                $enplacement = Utilisateurs::find($BD[0]->id);
                $enplacement->rangfile = $cpt;
                $enplacement->date_demande = date('d-m-y');
                $enplacement->update();
                $cpt=0;
                return view('Parking.utilisateur.Reservation',compact('BD','histo','cpt'));
            }             
        } 
        $cpt=0;  
        //afficher un message
        return view('Parking.utilisateur.Reservation',compact('BD','histo','cpt'));     
    }
}
