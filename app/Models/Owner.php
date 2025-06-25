<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Owner extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'numero_telephone',
        'adresse',
        'type_vehicule',
        'marque_vehicule',
        'modele_vehicule',
        'annee_vehicule',
        'plaque_immatriculation',
        'capacite_charge',
        'mot_de_passe',
        'statut',
        'document_identite',
        'document_vehicule',
        'assurance_vehicule',
        'date_expiration_assurance',
        'notes'
    ];

    protected $hidden = [
        'mot_de_passe',
    ];

    protected $casts = [
        'date_expiration_assurance' => 'date',
        'annee_vehicule' => 'integer',
        'capacite_charge' => 'decimal:2',
    ];

    // Relation avec les transporteurs
    public function transporters()
    {
        return $this->hasMany(Transporter::class);
    }

    // Scope pour les propriétaires actifs
    public function scopeActive($query)
    {
        return $query->where('statut', 'actif');
    }

    // Mutateur pour hasher le mot de passe
    public function setMotDePasseAttribute($value)
    {
        $this->attributes['mot_de_passe'] = bcrypt($value);
    }
}