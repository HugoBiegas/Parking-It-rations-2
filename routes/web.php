<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controleur_site;

//Page de test et routes de test pour tous les collaborateurs
//Ces dernières peuvent tester leur routes sur leurs pages dédiées et tester les routes ici avant de les mettre definitevement dans le reste des routes

//test Valentin
Route::get('/valentin', function () {
    return view('PageTestValentin');
});

//Créer un users
Route::post('/valentin', function () {
    $utilisateur = App\Utilisateur::create([
        'email' => request('email'),
        'mot_de_passe' => bcrypt(request('password')),
        'prénom' => request('prénom'),
        'nom' => request('nom'),
    ]);

    return "Nous avons reçu votre email qui est " . request('email') . ' et votre mot de passe est ' . request('password');
});
//test Adeline
Route::get('/adeline', function () {
    return view('PageTestAdeline');
});

//test Hugo
Route::get('/hugo', function () {
    return view('PageTestHugo');
});
//Fin de TEST
//Exemple


//Afficher users
//exemple_liste_users.blade.php --> Page test pour afficher la liste des utilisateurs
Route::get('/exemple_liste_users', function () {
    $utilisateurs = App\Utilisateur::all();

    return view('exemple_liste_users', [
        'utilisateurs' => $utilisateurs
    ]);
});



/* 
Valentin : Pas compris à quoi ça sert donc pour l'instant je le mets en commentaire jusqu'à une explication
Route::get('/',[Controleur_site::class,'accueil'])->name('accueil');
*/

//Page de démarrage
Route::get('/', function () {
    return view('compte/connection');
});

