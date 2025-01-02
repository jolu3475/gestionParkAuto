<?php

namespace App\Models;

use App\Models\Voiture;
use App\Models\Reparation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Maintenance extends Model
{
    use HasFactory;

    protected $fillable = [
        'voiture_id',
        'reparation_id',
        'debut',
    ];

    public function voiture()
    {
        return $this->belongsTo(Voiture::class);
    }

    public function reparation()
    {
        return $this->belongsTo(Reparation::class);
    }
}
