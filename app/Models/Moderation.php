<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Moderation extends Model
{
    protected $fillable = [
        'besoin_id',
        'offre_id',
        'moderateur_id',
        'type',
        'decision',
        'commentaire',
        'date_moderation',
    ];

    protected function casts(): array
    {
        return [
            'date_moderation' => 'datetime',
        ];
    }

    public function besoin(): BelongsTo
    {
        return $this->belongsTo(Besoin::class);
    }

    public function offre(): BelongsTo
    {
        return $this->belongsTo(Offre::class);
    }

    public function moderateur(): BelongsTo
    {
        return $this->belongsTo(User::class, 'moderateur_id');
    }
}