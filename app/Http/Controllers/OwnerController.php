<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class OwnerController extends Controller
{
    /**
     * Affiche le formulaire d'inscription pour les propriétaires
     */
    public function showRegistrationForm()
    {
        return view('owner.register');
    }

    /**
     * Traite l'inscription d'un propriétaire
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:owners',
            'numero_telephone' => 'required|string|max:20',
            'adresse' => 'required|string',
            'type_vehicule' => 'required|in:camion,camionnette,fourgon,remorque,semi-remorque,autre',
            'marque_vehicule' => 'required|string|max:255',
            'modele_vehicule' => 'required|string|max:255',
            'annee_vehicule' => 'required|integer|min:1990|max:' . (date('Y') + 1),
            'plaque_immatriculation' => 'required|string|max:255|unique:owners',
            'capacite_charge' => 'required|numeric|min:0.1|max:100',
            'mot_de_passe' => 'required|string|min:8|confirmed',
            'date_expiration_assurance' => 'nullable|date|after:today',
        ], [
            'nom.required' => 'Le nom est obligatoire.',
            'prenom.required' => 'Le prénom est obligatoire.',
            'email.required' => 'L\'adresse email est obligatoire.',
            'email.unique' => 'Cette adresse email est déjà utilisée.',
            'numero_telephone.required' => 'Le numéro de téléphone est obligatoire.',
            'adresse.required' => 'L\'adresse est obligatoire.',
            'type_vehicule.required' => 'Le type de véhicule est obligatoire.',
            'marque_vehicule.required' => 'La marque du véhicule est obligatoire.',
            'modele_vehicule.required' => 'Le modèle du véhicule est obligatoire.',
            'annee_vehicule.required' => 'L\'année du véhicule est obligatoire.',
            'plaque_immatriculation.required' => 'La plaque d\'immatriculation est obligatoire.',
            'plaque_immatriculation.unique' => 'Cette plaque d\'immatriculation est déjà enregistrée.',
            'capacite_charge.required' => 'La capacité de charge est obligatoire.',
            'mot_de_passe.required' => 'Le mot de passe est obligatoire.',
            'mot_de_passe.min' => 'Le mot de passe doit contenir au moins 8 caractères.',
            'mot_de_passe.confirmed' => 'La confirmation du mot de passe ne correspond pas.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $owner = Owner::create([
                'nom' => $request->nom,
                'prenom' => $request->prenom,
                'email' => $request->email,
                'numero_telephone' => $request->numero_telephone,
                'adresse' => $request->adresse,
                'type_vehicule' => $request->type_vehicule,
                'marque_vehicule' => $request->marque_vehicule,
                'modele_vehicule' => $request->modele_vehicule,
                'annee_vehicule' => $request->annee_vehicule,
                'plaque_immatriculation' => $request->plaque_immatriculation,
                'capacite_charge' => $request->capacite_charge,
                'mot_de_passe' => $request->mot_de_passe,
                'date_expiration_assurance' => $request->date_expiration_assurance,
                'notes' => $request->notes,
            ]);

            return redirect()->route('home')
                ->with('success', 'Inscription réussie ! Votre compte est en cours de validation. Vous recevrez un email de confirmation sous peu.');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Une erreur est survenue lors de l\'inscription. Veuillez réessayer.')
                ->withInput();
        }
    }
}