<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livraison extends Model
{

    public function commandes()
    {
       return $this->hasMany(Commande::class);
    }

    public function livreur()
    {
       return $this->belongsTo(Livreur::class);
    }



    use HasFactory;
}
