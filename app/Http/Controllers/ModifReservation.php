<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Utilisateurs;
use App\Utilisateur;
class ModifReservation extends Controller
{
    public function retoure(){
        return redirect('/');
    }
    public function ModifReser(){
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
    if ($BD[0]->admin == 1) {
        return view('Parking.admin.Admin_Modif_Réservations',['BD' => $BD]);
    }
    return view('Parking.compte.connection');        
    }

}
