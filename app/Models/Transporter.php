<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transporter extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'numero_telephone',
        'adresse',
        'numero_permis_conduire',
        'type_permis',
        'date_expiration_permis',
        'experience_conduite',
        'mot_de_passe',
        'statut',
        'owner_id',
        'photo_profil',
        'document_identite',
        'document_permis',
        'casier_judiciaire',
        'references',
        'notes'
    ];

    protected $hidden = [
        'mot_de_passe',
    ];

    protected $casts = [
        'date_expiration_permis' => 'date',
        'experience_conduite' => 'integer',
    ];

    // Relation avec le propriétaire
    public function owner()
    {
        return $this->belongsTo(Owner::class);
    }

    // Scope pour les transporteurs actifs
    public function scopeActive($query)
    {
        return $query->where('statut', 'actif');
    }

    // Scope pour les transporteurs disponibles
    public function scopeAvailable($query)
    {
        return $query->where('statut', 'disponible');
    }

    // Mutateur pour hasher le mot de passe
    public function setMotDePasseAttribute($value)
    {
        $this->attributes['mot_de_passe'] = bcrypt($value);
    }

    // Accesseur pour le nom complet
    public function getNomCompletAttribute()
    {
        return $this->prenom . ' ' . $this->nom;
    }
}