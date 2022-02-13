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
Route::get('/hugo', function () {
    return view('PageTestHugo');
});

////////////////////////////////////////////////////////////////////////

//Exemple

//Formulaire inscription exemple
Route::get('/efi', function () {
    return view('exemple_formulaire_inscription');
});

//Création utilisateur exemple
//Avec récupération des données du formulaire ci dessus
Route::post('/exemple_formulaire_inscription', function () {
    //Condition a verifier pour la conformité du formulaire
    request()->validate([
        'email' => ['required', 'email'],
        'password' => ['required', 'confirmed', 'min:8'],
        'password_confirmation' => ['required'],
    ], [
        'password.min' => 'Pour des raisons de sécurité, votre mot de passe doit faire :min caractères.'
    ]);
    //Création de l'utilisateur
    $utilisateur = App\Utilisateur::create([
        'email' => request('email'),
        'mot_de_passe' => bcrypt(request('password')),
        'prénom' => request('prénom'),
        'nom' => request('nom'),
    ]);

    return "Nous avons reçu votre email qui est " . request('email') . ' et votre mot de passe est ' . request('password');
});

//Liste utilisateurs exemple
//exemple_liste_users.blade.php --> Page test pour afficher la liste des utilisateurs
Route::get('/elu', function () {
    $utilisateurs = App\Utilisateur::all(); //Récupération de TOUS les utilisateurs
    //Affichage de la page exemple_liste_users avec les utilisateurs recupéré
    return view('exemple_liste_users', [
        'utilisateurs' => $utilisateurs
    ]);
});

////////////////////////////////////////////////////////////

/* 
Valentin : Pas compris à quoi ça sert donc pour l'instant je le mets en commentaire jusqu'à une explication
Route::get('/',[Controleur_site::class,'accueil'])->name('accueil');
*/

//Page de démarrage
Route::get('/', function () {
    return view('compte/connection');
});

