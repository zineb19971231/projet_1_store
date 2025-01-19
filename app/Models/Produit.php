<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produit extends Model
{
    use HasFactory;
    protected $fillable = ['image','nom', 'prix', 'stock', 'description', 'categorie_id'];

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function commandes(){
        return $this->belongsToMany(Commande::class)->withPivot('quantite');
    }
}
