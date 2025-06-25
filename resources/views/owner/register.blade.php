@extends('layouts.app')

@section('title', 'Inscription Propriétaire - LogiConnect')
@section('description', 'Inscrivez-vous en tant que propriétaire de véhicule sur LogiConnect et commencez à générer des revenus avec votre flotte.')

@section('content')
<section class="registration-section py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white text-center py-4">
                        <h2 class="mb-0">
                            <i class="fas fa-truck me-2"></i>
                            Inscription Propriétaire de Véhicule
                        </h2>
                        <p class="mb-0 mt-2">Rejoignez notre réseau de propriétaires et maximisez vos revenus</p>
                    </div>
                    <div class="card-body p-5">
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="fas fa-check-circle me-2"></i>
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="fas fa-exclamation-circle me-2"></i>
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('owner.register') }}">
                            @csrf
                            
                            <!-- Informations Personnelles -->
                            <div class="section-header mb-4">
                                <h4 class="text-primary">
                                    <i class="fas fa-user me-2"></i>
                                    Informations Personnelles
                                </h4>
                                <hr>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="nom" class="form-label">Nom <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('nom') is-invalid @enderror" 
                                           id="nom" name="nom" value="{{ old('nom') }}" required>
                                    @error('nom')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="prenom" class="form-label">Prénom <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('prenom') is-invalid @enderror" 
                                           id="prenom" name="prenom" value="{{ old('prenom') }}" required>
                                    @error('prenom')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">Adresse Email <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                           id="email" name="email" value="{{ old('email') }}" required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="numero_telephone" class="form-label">Numéro de Téléphone <span class="text-danger">*</span></label>
                                    <input type="tel" class="form-control @error('numero_telephone') is-invalid @enderror" 
                                           id="numero_telephone" name="numero_telephone" value="{{ old('numero_telephone') }}" 
                                           placeholder="+243 XXX XXX XXX" required>
                                    @error('numero_telephone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="adresse" class="form-label">Adresse Complète <span class="text-danger">*</span></label>
                                <textarea class="form-control @error('adresse') is-invalid @enderror" 
                                          id="adresse" name="adresse" rows="3" required>{{ old('adresse') }}</textarea>
                                @error('adresse')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Informations du Véhicule -->
                            <div class="section-header mb-4 mt-5">
                                <h4 class="text-primary">
                                    <i class="fas fa-truck me-2"></i>
                                    Informations du Véhicule
                                </h4>
                                <hr>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="type_vehicule" class="form-label">Type de Véhicule <span class="text-danger">*</span></label>
                                    <select class="form-select @error('type_vehicule') is-invalid @enderror" 
                                            id="type_vehicule" name="type_vehicule" required>
                                        <option value="">Sélectionnez le type</option>
                                        <option value="camion" {{ old('type_vehicule') == 'camion' ? 'selected' : '' }}>Camion</option>
                                        <option value="camionnette" {{ old('type_vehicule') == 'camionnette' ? 'selected' : '' }}>Camionnette</option>
                                        <option value="fourgon" {{ old('type_vehicule') == 'fourgon' ? 'selected' : '' }}>Fourgon</option>
                                        <option value="remorque" {{ old('type_vehicule') == 'remorque' ? 'selected' : '' }}>Remorque</option>
                                        <option value="semi-remorque" {{ old('type_vehicule') == 'semi-remorque' ? 'selected' : '' }}>Semi-remorque</option>
                                        <option value="autre" {{ old('type_vehicule') == 'autre' ? 'selected' : '' }}>Autre</option>
                                    </select>
                                    @error('type_vehicule')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="capacite_charge" class="form-label">Capacité de Charge (tonnes) <span class="text-danger">*</span></label>
                                    <input type="number" step="0.1" min="0.1" max="100" 
                                           class="form-control @error('capacite_charge') is-invalid @enderror" 
                                           id="capacite_charge" name="capacite_charge" value="{{ old('capacite_charge') }}" required>
                                    @error('capacite_charge')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="marque_vehicule" class="form-label">Marque <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('marque_vehicule') is-invalid @enderror" 
                                           id="marque_vehicule" name="marque_vehicule" value="{{ old('marque_vehicule') }}" required>
                                    @error('marque_vehicule')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="modele_vehicule" class="form-label">Modèle <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('modele_vehicule') is-invalid @enderror" 
                                           id="modele_vehicule" name="modele_vehicule" value="{{ old('modele_vehicule') }}" required>
                                    @error('modele_vehicule')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="annee_vehicule" class="form-label">Année <span class="text-danger">*</span></label>
                                    <input type="number" min="1990" max="{{ date('Y') + 1 }}" 
                                           class="form-control @error('annee_vehicule') is-invalid @enderror" 
                                           id="annee_vehicule" name="annee_vehicule" value="{{ old('annee_vehicule') }}" required>
                                    @error('annee_vehicule')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="plaque_immatriculation" class="form-label">Plaque d'Immatriculation <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('plaque_immatriculation') is-invalid @enderror" 
                                           id="plaque_immatriculation" name="plaque_immatriculation" 
                                           value="{{ old('plaque_immatriculation') }}" required>
                                    @error('plaque_immatriculation')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="date_expiration_assurance" class="form-label">Date d'Expiration de l'Assurance</label>
                                    <input type="date" class="form-control @error('date_expiration_assurance') is-invalid @enderror" 
                                           id="date_expiration_assurance" name="date_expiration_assurance" 
                                           value="{{ old('date_expiration_assurance') }}">
                                    @error('date_expiration_assurance')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Sécurité -->
                            <div class="section-header mb-4 mt-5">
                                <h4 class="text-primary">
                                    <i class="fas fa-lock me-2"></i>
                                    Sécurité du Compte
                                </h4>
                                <hr>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="mot_de_passe" class="form-label">Mot de Passe <span class="text-danger">*</span></label>
                                    <input type="password" class="form-control @error('mot_de_passe') is-invalid @enderror" 
                                           id="mot_de_passe" name="mot_de_passe" required>
                                    <div class="form-text">Minimum 8 caractères</div>
                                    @error('mot_de_passe')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="mot_de_passe_confirmation" class="form-label">Confirmer le Mot de Passe <span class="text-danger">*</span></label>
                                    <input type="password" class="form-control" 
                                           id="mot_de_passe_confirmation" name="mot_de_passe_confirmation" required>
                                </div>
                            </div>

                            <!-- Notes -->
                            <div class="mb-4">
                                <label for="notes" class="form-label">Notes Supplémentaires</label>
                                <textarea class="form-control" id="notes" name="notes" rows="3" 
                                          placeholder="Informations supplémentaires sur votre véhicule ou vos services...">{{ old('notes') }}</textarea>
                            </div>

                            <!-- Conditions -->
                            <div class="mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="conditions" required>
                                    <label class="form-check-label" for="conditions">
                                        J'accepte les <a href="#" class="text-primary">conditions d'utilisation</a> 
                                        et la <a href="#" class="text-primary">politique de confidentialité</a> <span class="text-danger">*</span>
                                    </label>
                                </div>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="fas fa-user-plus me-2"></i>
                                    Créer Mon Compte Propriétaire
                                </button>
                            </div>
                        </form>

                        <div class="text-center mt-4">
                            <p class="text-muted">
                                Déjà inscrit ? 
                                <a href="{{ route('transporter.login') }}" class="text-primary">Connectez-vous ici</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
.section-header h4 {
    font-weight: 600;
}

.form-label {
    font-weight: 500;
    color: #333;
}

.card {
    border: none;
    border-radius: 15px;
}

.card-header {
    border-radius: 15px 15px 0 0 !important;
}

.btn-primary {
    background: linear-gradient(45deg, #007bff, #0056b3);
    border: none;
    border-radius: 8px;
    font-weight: 500;
}

.btn-primary:hover {
    background: linear-gradient(45deg, #0056b3, #004085);
    transform: translateY(-1px);
}

.form-control:focus,
.form-select:focus {
    border-color: #007bff;
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
}
</style>
@endpush