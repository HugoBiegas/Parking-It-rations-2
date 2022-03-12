<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utilisateurs extends Model
{
    protected $fillable = ['admin','email', 'mot_de_passe','nom','prénom','rangfile','valider', 'date_demande'];
}
