<?php

namespace App\Models;

use App\Models\Maintenance;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Voiture extends Model
{
    use HasFactory;

    protected $fillable = [
        'plaque',
        'marque',
        'modele',
        'etat',
        'utilisateur'
    ];

    public function maintenances()
    {
        return $this->hasMany(Maintenance::class);
    }
}
