<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Utilisateurs;
use App\Models\place;


class automatisationListAtt extends Controller
{
        
    public function automatisation()
    {
        //récupérations des gens en file d'att
        $listeatt= Utilisateurs::where("rangfile","!=",0)->get();
        //récupérations des places prise
        $Place = place::where("ProrioActu","!=",0)->get();
        $cpt=0;
        //recherche si des places sont obselette
        $foreach ($Place as $p) {
            //si il sont obselette on les réinitialise (on as pas besoins de changer l'historique car ces la valeur par default)
            if ($p->date_fin == date('d-m-y')) {
                $recal = place::find($p->id);
                $recal->ProrioActu = 0;
                $recal->date_debut = null;
                $recal->date_fin = null;
                $recal->update();
            }else
                $cpt++;
            
        }
        //on regarde si il y a u des suprétions
        if ($cpt < 30) {
            //on prend le nombre de suprétions
            $cpt =  30-$cpt;
            //on prend les place disponible
            $Place = place::where("ProrioActu","=",0)->get();
            $cptFile=0;
            $cptPlace=0;
            //on boucle sur la liste d'attente pour attribuer les place libre
            $foreach ($listeatt as $l) {
                //si une place est libre on l'ubdate si non remais la liste d'att a jour (resette des places)
                if ($cpt !=0) {
                    foreach ($Place as $p) {
                        if($cptPlace == 0){
                            $modif = place::find($p->id);
                            $modif->ProrioActu = $l->id;
                            $modif->date_debut = date('d-m-y');
                            $modif->date_fin = date('d-m-y', strtotime('+7 days'));
                            $modif->update();
                            $cptPlace=1;
                        }
                    }
                    $cptPlace=0;
                    $cpt--;
                }else{
                    $cptFile++;
                    $modif = Utilisateurs::find($l->id);
                    $modif->rangfile = $cptFile;
                    $modif->update();
                }
            }
        }
    }
}
