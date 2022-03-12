<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Utilisateurs;
use App\Models\Historique;

class historiqueControleur extends Controller
{
    public function retoure(){
        return redirect('/');
    }
    public function historique(){
    $histo = $_POST['BD'];
    //couper le début de la chaine 
    $substring ='email":';
    $firstIndex = stripos($histo, $substring);
    //recoupage de la chaine pour récup l'email
    $chainDébut = substr($histo, $firstIndex+8,120);
    $substring ='"';
    $firstIndex = stripos($chainDébut, $substring);
    //coupage préci de la chaine 
    $emailFinal = substr($chainDébut, 0,$firstIndex);
    $BD = Utilisateurs::where('email','=', $emailFinal)->get();
    $histo = Historique::all();
    $cpt=0;
    return view('Parking.admin.Admin_Historique', compact('BD', 'histo','cpt'));
    }
}
