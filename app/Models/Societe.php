<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Societe extends Model
{
    protected $fillable = [
        'nom',
        'email',
        'telephone',
        'adresse',
        'description',
        'statut',
    ];

    public function besoins(): HasMany
    {
        return $this->hasMany(Besoin::class);
    }
}