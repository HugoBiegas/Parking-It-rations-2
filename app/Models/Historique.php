<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historique extends Model
{
    protected $fillable = ['nomPlaceHistorique','date_debut_reserve','date_fin_reserve', 'ProrioActuHisto'];
}
