<?php

namespace App\Models;

use App\Models\Maintenance;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reparation extends Model
{
    use HasFactory;
    protected $fillable = [
        'type',
    ];

    public function maintenances()
    {
        return $this->hasMany(Maintenance::class);
    }
}
