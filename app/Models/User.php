<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Les attributs pouvant être remplis en masse.
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * Les attributs qui ne doivent pas être affichés.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Conversion automatique de certains attributs.
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Les modérations effectuées par cet utilisateur.
     */
    public function moderations(): HasMany
    {
        return $this->hasMany(Moderation::class, 'moderateur_id');
    }
}