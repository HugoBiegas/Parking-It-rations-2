<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Utilisateurs;
use App\Models\historique;
use App\Models\place;

use App\Utilisateur;
class ListeAtt extends Controller
{
    public function retoure(){
        return redirect('/');
    }
    public function ListeAttApp(){
    $ListeAtt = $_POST['BD'];
    //couper le début de la chaine 
    $substring ='email":';
    $firstIndex = stripos($ListeAtt, $substring);
    //recoupage de la chaine pour récup l'email
    $chainDébut = substr($ListeAtt, $firstIndex+8,120);
    $substring ='"';
    $firstIndex = stripos($chainDébut, $substring);
    //coupage préci de la chaine 
    $emailFinal = substr($chainDébut, 0,$firstIndex);
    $BD = Utilisateur::where('email','=', $emailFinal)->get();
    $Place = place::all();
    $Positions=0;
    foreach ($Place as $p) {
        if ($p->nomPlace == $BD[0]->nom) {
            $Positions= $p->id;
        }
    }
    $rang = Utilisateurs::where('rangfile','!=', 0)->get();

    if($BD[0]->admin == 0){
        return view('Parking.utilisateur.Liste_Att',['BD' => $BD, 'cpt'=>0, 'rang'=>$rang]);
    }else if ($BD[0]->admin == 1) {
        return view('Parking.utilisateur.Liste_Att',['BD' => $BD, 'cpt'=>0, 'rang'=>$rang]);
    }
    return view('Parking.compte.connection');        
    }

}
