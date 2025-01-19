<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{
    use HasFactory;
    protected $fillable = ['prenom', 'nom', 'telephone', 'ville', 'date_naissance'];

    public function commandes(){
        return $this->hasMany(Commande::class);
    }
}
