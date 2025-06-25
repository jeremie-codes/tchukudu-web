<?php

namespace App\Http\Controllers;

use App\Models\Transporter;
use App\Models\Owner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class TransporterController extends Controller
{
    /**
     * Affiche le formulaire d'inscription pour les transporteurs
     */
    public function showRegistrationForm()
    {
        $owners = Owner::active()->get();
        return view('transporter.register', compact('owners'));
    }

    /**
     * Traite l'inscription d'un transporteur
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:transporters',
            'numero_telephone' => 'required|string|max:20',
            'adresse' => 'required|string',
            'numero_permis_conduire' => 'required|string|max:255|unique:transporters',
            'type_permis' => 'required|in:A,B,C,D,E',
            'date_expiration_permis' => 'required|date|after:today',
            'experience_conduite' => 'required|integer|min:1|max:50',
            'mot_de_passe' => 'required|string|min:8|confirmed',
            'owner_id' => 'nullable|exists:owners,id',
        ], [
            'nom.required' => 'Le nom est obligatoire.',
            'prenom.required' => 'Le prénom est obligatoire.',
            'email.required' => 'L\'adresse email est obligatoire.',
            'email.unique' => 'Cette adresse email est déjà utilisée.',
            'numero_telephone.required' => 'Le numéro de téléphone est obligatoire.',
            'adresse.required' => 'L\'adresse est obligatoire.',
            'numero_permis_conduire.required' => 'Le numéro de permis de conduire est obligatoire.',
            'numero_permis_conduire.unique' => 'Ce numéro de permis est déjà enregistré.',
            'type_permis.required' => 'Le type de permis est obligatoire.',
            'date_expiration_permis.required' => 'La date d\'expiration du permis est obligatoire.',
            'date_expiration_permis.after' => 'Le permis de conduire doit être valide.',
            'experience_conduite.required' => 'L\'expérience de conduite est obligatoire.',
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
            $transporter = Transporter::create([
                'nom' => $request->nom,
                'prenom' => $request->prenom,
                'email' => $request->email,
                'numero_telephone' => $request->numero_telephone,
                'adresse' => $request->adresse,
                'numero_permis_conduire' => $request->numero_permis_conduire,
                'type_permis' => $request->type_permis,
                'date_expiration_permis' => $request->date_expiration_permis,
                'experience_conduite' => $request->experience_conduite,
                'mot_de_passe' => $request->mot_de_passe,
                'owner_id' => $request->owner_id,
                'references' => $request->references,
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

    /**
     * Affiche le formulaire de connexion pour les transporteurs
     */
    public function showLoginForm()
    {
        return view('transporter.login');
    }

    /**
     * Traite la connexion d'un transporteur
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'mot_de_passe' => 'required',
        ], [
            'email.required' => 'L\'adresse email est obligatoire.',
            'email.email' => 'Veuillez saisir une adresse email valide.',
            'mot_de_passe.required' => 'Le mot de passe est obligatoire.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $transporter = Transporter::where('email', $request->email)->first();

        if ($transporter && Hash::check($request->mot_de_passe, $transporter->mot_de_passe)) {
            if ($transporter->statut === 'actif' || $transporter->statut === 'disponible') {
                // Ici vous pouvez implémenter votre logique de session
                session(['transporter_id' => $transporter->id]);
                
                return redirect()->route('home')
                    ->with('success', 'Connexion réussie ! Bienvenue ' . $transporter->nom_complet);
            } else {
                return redirect()->back()
                    ->with('error', 'Votre compte n\'est pas encore activé ou a été suspendu.')
                    ->withInput();
            }
        }

        return redirect()->back()
            ->with('error', 'Identifiants incorrects.')
            ->withInput();
    }

    /**
     * Déconnexion du transporteur
     */
    public function logout()
    {
        session()->forget('transporter_id');
        return redirect()->route('home')
            ->with('success', 'Déconnexion réussie.');
    }
}