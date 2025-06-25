<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    /**
     * Affiche le formulaire de contact
     */
    public function index()
    {
        return view('contact');
    }

    /**
     * Traite l'envoi du formulaire de contact
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|min:10',
        ], [
            'name.required' => 'Le nom est obligatoire.',
            'email.required' => 'L\'adresse email est obligatoire.',
            'email.email' => 'Veuillez saisir une adresse email valide.',
            'message.required' => 'Le message est obligatoire.',
            'message.min' => 'Le message doit contenir au moins 10 caractères.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            Contact::create([
                'name' => $request->name,
                'email' => $request->email,
                'message' => $request->message,
            ]);

            return redirect()->back()
                ->with('success', 'Votre message a été envoyé avec succès ! Nous vous répondrons dans les plus brefs délais.');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Une erreur est survenue lors de l\'envoi de votre message. Veuillez réessayer.')
                ->withInput();
        }
    }
}