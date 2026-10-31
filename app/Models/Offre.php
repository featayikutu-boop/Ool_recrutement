<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Offre extends Model
{
    protected $fillable = [
        'besoin_id',
        'titre',
        'description',
        'date_publication',
        'date_cloture',
        'statut',
    ];

    protected function casts(): array
    {
        return [
            'date_publication' => 'date',
            'date_cloture' => 'date',
        ];
    }

    public function besoin(): BelongsTo
    {
        return $this->belongsTo(Besoin::class);
    }

    public function candidatures(): HasMany
    {
        return $this->hasMany(Candidature::class);
    }

    public function moderations(): HasMany
    {
        return $this->hasMany(Moderation::class);
    }
}