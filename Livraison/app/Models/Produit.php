<?php

namespace App\Models;
use App\Models\Categorie;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;
    protected $fillable = [
      'image',
      'nom',
      'description',
      'categorie_id',
      'prix',
      'en_stock',
      'supermarche_id'
    ];

    public function categorie()
    {

       return $this->belongsTo(Categorie::class);

    }
    public function supermarche()
    {

       return $this->belongsTo(supermarche::class);

    }

    public function paniers()
    {
      return $this->belongsToMany(Panier::class);
    }
}
