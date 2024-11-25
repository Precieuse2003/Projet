<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supermarche extends Model
{

    protected $fillable = ['nom_sup', 'email_sup','adresse_sup','image_sup'] ;

    public function produits()
    {
       return $this->hasMany(Produit::class);
    }
    public function categories()
    {
       return $this->hasMany(Categorie::class);
    }
    public function users()
    {
       return $this->hasMany(User::class);
    }


 use HasFactory;
}
