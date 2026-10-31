<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Candidature extends Model
{
    protected $fillable = [
        'offre_id',
        'nom',
        'prenom',
        'email',
        'telephone',
        'cv',
        'lettre_motivation',
        'message',
        'statut',
        'date_candidature',
    ];

    protected function casts(): array
    {
        return [
            'date_candidature' => 'datetime',
        ];
    }

    public function offre(): BelongsTo
    {
        return $this->belongsTo(Offre::class);
    }
}