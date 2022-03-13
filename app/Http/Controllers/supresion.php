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

        $substring ='nomPlace":';
        $firstIndex = stripos($place, $substring);
        //recoupage de la chaine pour récup l'email
        $chainDébut = substr($place, $firstIndex+11,120);
        $substring ='"';
        $firstIndex = stripos($chainDébut, $substring);
        //place de la personne 
        $Nplace = substr($chainDébut, 0,$firstIndex);

        $place = place::find($id);
        $place->ProrioActu = 0;
        $place->date_debut = null;
        $place->date_fin = null;
        $place->update();

        //récup&rations de la place
        $histo = Historique::where('nomPlaceHistorique','=', $Nplace)->get();
        $cpt=0;
        //boucle pour conaitre la serniére ocurence
        foreach ($histo as $k) {
            $cpt++;
        }
        $cpt--;
        $histo = Historique::find($histo[$cpt]->id);
        $histo->date_fin_reserve = date('d-m-y');
        $histo->update();
        $Place = place::all();
        $personne = Utilisateurs::all();
        $nb=0;
        foreach ($personne as $p) {
            $nb++;
        }
        return view('Parking.admin.Admin_Réservation',['BD'=>$BD,'Place'=>$Place,'cpt'=>0, 'nb'=>$nb]);     
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
    public function anuleReserve(){
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

        $histo = $_POST['Histo'];
        $substring ='id":';
        $firstIndex = stripos($histo, $substring);
        //recoupage de la chaine pour récup l'email
        $chainDébut = substr($histo, $firstIndex+4,120);
        $substring =',';
        $firstIndex = stripos($chainDébut, $substring);
        //coupage préci de la chaine 
        $id = substr($chainDébut, 0,$firstIndex);
        $histo = Historique::where('id','=', $id)->get();
        //récupérations de l'historique pour le mettre a jour
        $recher = Historique::find($histo[0]->id);
        $recher->date_fin_reserve = date('d-m-y');
        $recher->update();

        //récupérations de la place pour la resette
        $nice = place::where('nomPlace','=', $histo[0]->nomPlaceHistorique)->get();
        $recher = place::find($nice[0]->id);
        $recher->ProrioActu = 0;
        $recher->date_debut = null;
        $recher->date_fin = null;
        $recher->update();

        $histo = Historique::where('ProrioActuHisto','=', $BD[0]->id)->get();
        $cpt=0;  
        //afficher un message
        return view('Parking.utilisateur.Reservation',compact('BD','histo','cpt'));     
    }
    public function anuleListeATT(){
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
        if ($BD[0]->rangfile !=0) {
            $recher = Utilisateurs::find($BD[0]->id);
            $recher->rangfile =0;
            $recher->date_demande = null;
            $recher->update();
        }

        $Place = place::all();
        $Positions=0;
        foreach ($Place as $p) {
            if ($p->nomPlace == $BD[0]->nom) {
                $Positions= $p->id;
            }
        }
        $rang = Utilisateurs::where('rangfile','!=', 0)->get();
         return view('Parking.utilisateur.Liste_Att',['BD' => $BD, 'cpt'=>0, 'rang'=>$rang]);
    }
}
