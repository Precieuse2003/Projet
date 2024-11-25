<?php

namespace App\Models;

use App\Models\Produit;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Categorie extends Model
{
    use HasFactory;

    protected $fillable =[
     'nom',
     'supermarche_id'
    ];

    public function produits()
    {
       return $this->hasMany(Produit::class);
    }
    public function supermarche()
    {
       return $this->belongsTo(Supermarche::class);
    }


}
