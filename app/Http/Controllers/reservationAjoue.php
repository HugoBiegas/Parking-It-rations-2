<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\place;
use App\Models\Utilisateurs;
use App\Models\Historique;
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
        $Place = place::all();
        $cpt=0;
        foreach ($Place as $p) {
            if ($p->nomPlace == $BD[0]->prénom) {
                   $cpt++;
               }   
        }
        if ($cpt == 0 ) {
            $cpt=0;
            $enplacement='';
            foreach ($Place as $p) {
            if ($p->nomPlace != null && $p->nomPlace != null && $cpt==0) {
                $enplacement = place::findOrFail($p->id);
                $cpt++;
            }
            if($p->id == 30){
                $file = Utilisateurs::findOrFail($BD->id);
                foreach ($BD as $b) {
                if($b->rangfile !=null)
                        $cpt++;
                }
                $file->rangfile = $cpt;
                $file->update(); 
            }
        }
        $enplacement->nomPlace = $BD[0]->nom;
        $enplacement->update(); 
        historique::create([
            'nomPlace'=>$BD[0]->nom6,
            'date_debut' => date('d-m-y h:i:s'),
            'date_fin'=>null,
        ]);
        $Place = place::all();
        $cpt=0;
        return view('Parking.utilisateur.Reservation',compact('BD','Place','cpt'));                  
        }  
        $Place = place::all();
                $cpt=0; 
        //afficher un message
        return view('Parking.utilisateur.Reservation',compact('BD','Place','cpt'));     
    }
}
