<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Poste extends Model
{
    protected $fillable = [
        'titre',
        'description',
        'competences',
        'niveau_experience',
    ];

    public function besoins(): HasMany
    {
        return $this->hasMany(Besoin::class);
    }
}