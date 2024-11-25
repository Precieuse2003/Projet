<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livreur extends Model
{

    protected $fillable = [
        'nom', 'email', 'telephone', 'adresse',
    ];

    public function livraisons()
    {
       return $this->hasMany(Livraison::class);
    }


    use HasFactory;
}
