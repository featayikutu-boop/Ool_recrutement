<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Besoin extends Model
{
    protected $fillable = [
        'societe_id',
        'poste_id',
        'nombre_postes',
        'type_contrat',
        'description',
        'date_limite',
        'statut',
    ];

    protected function casts(): array
    {
        return [
            'date_limite' => 'date',
        ];
    }

    public function societe(): BelongsTo
    {
        return $this->belongsTo(Societe::class);
    }

    public function poste(): BelongsTo
    {
        return $this->belongsTo(Poste::class);
    }

    public function offre(): HasOne
    {
        return $this->hasOne(Offre::class);
    }

    public function moderations(): HasMany
    {
        return $this->hasMany(Moderation::class);
    }
}