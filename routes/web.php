<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controleur_site;

//Page de test et routes de test pour tous les collaborateurs
//Ces dernières peuvent tester leur routes sur leurs pages dédiées et tester les routes ici avant de les mettre definitevement dans le reste des routes

//test Valentin
Route::get('/valentin', function () {
    return view('PageTestValentin');
});

//test Adeline
Route::get('/adeline', function () {
    return view('PageTestAdeline');
});

//test Hugo
Route::get('/page-acueil-admin', function () {
    return view('PageTestHugo');
});
////////////////////////////////////////////////////////////////////////

//Exemple

//Formulaire inscription exemple
Route::get('/efi', 'InscriptionController@formulaire');

//Création utilisateur exemple
//Avec récupération des données du formulaire ci dessus
Route::post('/exemple_formulaire_inscription', 'InscriptionController@traitement');

//Liste utilisateurs exemple
//exemple_liste_users.blade.php --> Page test pour afficher la liste des utilisateurs
Route::get('/elu', 'UtilisateursController@listetest');

//Connexion exemple
Route::get('/', 'ConnexionController@formulaire');
Route::post('/connexion', 'ConnexionController@traitement');

/* 
Valentin : Pas compris à quoi ça sert donc pour l'instant je le mets en commentaire jusqu'à une explication
Route::get('/',[Controleur_site::class,'accueil'])->name('accueil');
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Page de démarrage
//Route::get('/', function () {
//    return view('compte/connection');
//});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';



Route::get('/inscription','InscriptionController@formulaire');
Route::post('/register','InscriptionController@traitement');

Route::get('/validation-cacher','validation@retoure');
Route::post('/validation-cacher','validation@formulaire');

Route::get('/suprime-reservent','Reservation@retoure');
Route::post('/suprime-reservent','Reservation@supreserve');

Route::get('/suspendre-reserve','Reservation@retoure');
Route::post('/suspendre-reserve','Reservation@suspentreserve');


Route::get('/mdpPerdu', function () {
    return view('Parking.compte.MdpPerdu');
});
Route::get('/confirm-Mdp', function () {
    return view('Parking.compte.Confirmations-Mdp');
});
Route::get('/confirm-Inscri', function () {
    return view('Parking.compte.Confirmations-Inscriptions');
});


Route::get('/page-acueil','acueil@redirection');
Route::post('/page-acueil','acueil@redirection');

Route::post('/reste', 'Reservation@cacheReste');
Route::get('/reste', 'Reservation@retoure');

Route::post('/reservation', 'Reservation@ReservationMiseEnPlace');
Route::post('/reservation-admin', 'Reservation@ReservationMiseEnPlaceAdmin');
Route::get('/reservation-admin', 'Reservation@retoure');
Route::get('/reservation', 'Reservation@retoure');


Route::post('/liste-attente', 'ListeAtt@ListeAttApp');
Route::get('/liste-attente', 'ListeAtt@retoure');


Route::post('/compte', 'Compte@CompteLoad');
Route::get('/compte', 'Compte@retoure');


Route::post('/Modifier-admin', 'ModifReservation@ModifReser');
Route::get('/Modifier-admin', 'ModifReservation@retoure');



Route::post('/admin-inscriptions', 'GereInscriptions@GereInscri');
Route::get('/admin-inscriptions', 'GereInscriptions@retoure');

Route::post('/reservation-ajou', 'reservationAjoue@ReservationAdd');
Route::get('/reservation-ajou', 'reservationAjoue@retoure');

Route::post('/suprimer', 'supresion@détruire');
Route::get('/suprimer', 'supresion@retoure');
Route::post('/suprimer-admin', 'supresion@suprimerCompte');
Route::get('/suprimer-admin', 'supresion@retoure');

Route::post('/admin-inscriptions', 'ajoueReservationAdmin@adminInscri');
Route::get('/admin-inscriptions', 'ajoueReservationAdmin@retoure');

Route::post('/acceptations', 'validation@adminInscri');
Route::get('/acceptations', 'validation@retoure');

Route::post('/Modifier-admin-compte', 'modifCompte@adminCompteM');
Route::get('/Modifier-admin-compte', 'modifCompte@retoure');

Route::post('/Modifier-admin-modif', 'modifCompte@adminComptUpdate');
Route::get('/Modifier-admin-modif', 'modifCompte@retoure');

Route::post('/historique-admin', 'historiqueControleur@historique');
Route::get('/historique-admin', 'historiqueControleur@retoure');

Route::post('/ajoue-compte-admin', 'Compte@ajouteCompte');
Route::get('/ajoue-compte-admin', 'Compte@retoure');

Route::post('/reservation-ajou-admin', 'ajoueReservationAdmin@ajouteReserve');
Route::get('/reservation-ajou-admin', 'ajoueReservationAdmin@retoure');

Route::post('/anule-reserve', 'supresion@anuleReserve');
Route::get('/anule-reserve', 'supresion@retoure');

Route::post('/liste-attente-anule', 'supresion@anuleListeATT');
Route::get('/liste-attente-anule', 'supresion@retoure');
