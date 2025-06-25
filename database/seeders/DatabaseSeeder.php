<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\Auth;
use App\Models\AuthToken;
use App\Models\Configuration;
use App\Models\Merchant;
use App\Models\Message;
use App\Models\User;
use App\Models\Owner;
use App\Models\Transporter;
use App\Models\Contact;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        
        
        // Créer des propriétaires de véhicules
        $owners = [
            [
                'nom' => 'MUKENDI',
                'prenom' => 'Jean-Baptiste',
                'email' => 'jb.mukendi@example.com',
                'numero_telephone' => '+243123456789',
                'adresse' => 'Avenue Kasa-Vubu, Kinshasa',
                'type_vehicule' => 'camion',
                'marque_vehicule' => 'Mercedes',
                'modele_vehicule' => 'Actros',
                'annee_vehicule' => 2020,
                'plaque_immatriculation' => 'CD-001-KIN',
                'capacite_charge' => 15.5,
                'mot_de_passe' => 'password123',
                'statut' => 'actif',
                'date_expiration_assurance' => '2025-12-31',
            ],
            [
                'nom' => 'KABILA',
                'prenom' => 'Marie',
                'email' => 'marie.kabila@example.com',
                'numero_telephone' => '+243987654321',
                'adresse' => 'Boulevard du 30 Juin, Kinshasa',
                'type_vehicule' => 'camionnette',
                'marque_vehicule' => 'Toyota',
                'modele_vehicule' => 'Hiace',
                'annee_vehicule' => 2019,
                'plaque_immatriculation' => 'CD-002-KIN',
                'capacite_charge' => 3.5,
                'mot_de_passe' => 'password123',
                'statut' => 'actif',
                'date_expiration_assurance' => '2025-10-15',
            ],
            [
                'nom' => 'TSHISEKEDI',
                'prenom' => 'Patrick',
                'email' => 'patrick.tshisekedi@example.com',
                'numero_telephone' => '+243555666777',
                'adresse' => 'Avenue Tombalbaye, Kinshasa',
                'type_vehicule' => 'fourgon',
                'marque_vehicule' => 'Iveco',
                'modele_vehicule' => 'Daily',
                'annee_vehicule' => 2021,
                'plaque_immatriculation' => 'CD-003-KIN',
                'capacite_charge' => 7.2,
                'mot_de_passe' => 'password123',
                'statut' => 'actif',
                'date_expiration_assurance' => '2026-03-20',
            ]
        ];

        foreach ($owners as $ownerData) {
            Owner::create($ownerData);
        }

        // Créer des transporteurs
        $transporters = [
            [
                'nom' => 'MBUYI',
                'prenom' => 'Joseph',
                'email' => 'joseph.mbuyi@example.com',
                'numero_telephone' => '+243111222333',
                'adresse' => 'Commune de Lemba, Kinshasa',
                'numero_permis_conduire' => 'PC001234567',
                'type_permis' => 'C',
                'date_expiration_permis' => '2026-08-15',
                'experience_conduite' => 8,
                'mot_de_passe' => 'password123',
                'statut' => 'disponible',
                'owner_id' => 1,
                'references' => 'Ancien chauffeur chez Transport Express (2018-2023)',
            ],
            [
                'nom' => 'KASONGO',
                'prenom' => 'Pierre',
                'email' => 'pierre.kasongo@example.com',
                'numero_telephone' => '+243444555666',
                'adresse' => 'Commune de Matete, Kinshasa',
                'numero_permis_conduire' => 'PC987654321',
                'type_permis' => 'B',
                'date_expiration_permis' => '2025-11-30',
                'experience_conduite' => 5,
                'mot_de_passe' => 'password123',
                'statut' => 'disponible',
                'owner_id' => 2,
                'references' => 'Chauffeur indépendant depuis 2020',
            ],
            [
                'nom' => 'NGOMA',
                'prenom' => 'André',
                'email' => 'andre.ngoma@example.com',
                'numero_telephone' => '+243777888999',
                'adresse' => 'Commune de Ngaliema, Kinshasa',
                'numero_permis_conduire' => 'PC456789123',
                'type_permis' => 'C',
                'date_expiration_permis' => '2027-02-28',
                'experience_conduite' => 12,
                'mot_de_passe' => 'password123',
                'statut' => 'actif',
                'owner_id' => 3,
                'references' => 'Ancien chauffeur militaire, reconverti dans le transport civil',
            ]
        ];

        foreach ($transporters as $transporterData) {
            Transporter::create($transporterData);
        }

        // Créer quelques messages de contact
        $contacts = [
            [
                'name' => 'Lucie MBALA',
                'email' => 'lucie.mbala@example.com',
                'message' => 'Bonjour, je souhaiterais avoir plus d\'informations sur vos services de transport pour les entreprises. Pouvez-vous me contacter ?',
                'created_at' => now()->subDays(2),
            ],
            [
                'name' => 'Emmanuel KALONJI',
                'email' => 'emmanuel.kalonji@example.com',
                'message' => 'Je suis intéressé par votre plateforme pour transporter mes marchandises de Kinshasa vers Lubumbashi. Quels sont vos tarifs ?',
                'created_at' => now()->subDays(1),
            ],
            [
                'name' => 'Sylvie MWAMBA',
                'email' => 'sylvie.mwamba@example.com',
                'message' => 'Excellent service ! J\'ai utilisé votre plateforme la semaine dernière et tout s\'est très bien passé. Félicitations à toute l\'équipe.',
                'created_at' => now()->subHours(6),
            ]
        ];

        foreach ($contacts as $contactData) {
            Contact::create($contactData);
        }
    }
}