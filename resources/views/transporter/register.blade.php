@extends('layouts.app')

@section('title', 'Inscription Transporteur - LogiConnect')
@section('description', 'Inscrivez-vous en tant que transporteur sur LogiConnect et accédez à de nombreuses opportunités de transport.')

@section('content')
<section class="registration-section py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-lg">
                    <div class="card-header bg-success text-white text-center py-4">
                        <h2 class="mb-0">
                            <i class="fas fa-user-tie me-2"></i>
                            Inscription Transporteur
                        </h2>
                        <p class="mb-0 mt-2">Rejoignez notre réseau de transporteurs professionnels</p>
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

                        <form method="POST" action="{{ route('transporter.register') }}">
                            @csrf
                            
                            <!-- Informations Personnelles -->
                            <div class="section-header mb-4">
                                <h4 class="text-success">
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

                            <!-- Informations du Permis -->
                            <div class="section-header mb-4 mt-5">
                                <h4 class="text-success">
                                    <i class="fas fa-id-card me-2"></i>
                                    Informations du Permis de Conduire
                                </h4>
                                <hr>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="numero_permis_conduire" class="form-label">Numéro de Permis <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('numero_permis_conduire') is-invalid @enderror" 
                                           id="numero_permis_conduire" name="numero_permis_conduire" 
                                           value="{{ old('numero_permis_conduire') }}" required>
                                    @error('numero_permis_conduire')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="type_permis" class="form-label">Type de Permis <span class="text-danger">*</span></label>
                                    <select class="form-select @error('type_permis') is-invalid @enderror" 
                                            id="type_permis" name="type_permis" required>
                                        <option value="">Sélectionnez le type</option>
                                        <option value="A" {{ old('type_permis') == 'A' ? 'selected' : '' }}>A - Motocyclettes</option>
                                        <option value="B" {{ old('type_permis') == 'B' ? 'selected' : '' }}>B - Véhicules légers</option>
                                        <option value="C" {{ old('type_permis') == 'C' ? 'selected' : '' }}>C - Poids lourds</option>
                                        <option value="D" {{ old('type_permis') == 'D' ? 'selected' : '' }}>D - Transport de personnes</option>
                                        <option value="E" {{ old('type_permis') == 'E' ? 'selected' : '' }}>E - Remorques</option>
                                    </select>
                                    @error('type_permis')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="date_expiration_permis" class="form-label">Date d'Expiration du Permis <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control @error('date_expiration_permis') is-invalid @enderror" 
                                           id="date_expiration_permis" name="date_expiration_permis" 
                                           value="{{ old('date_expiration_permis') }}" required>
                                    @error('date_expiration_permis')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="experience_conduite" class="form-label">Expérience de Conduite (années) <span class="text-danger">*</span></label>
                                    <input type="number" min="1" max="50" 
                                           class="form-control @error('experience_conduite') is-invalid @enderror" 
                                           id="experience_conduite" name="experience_conduite" 
                                           value="{{ old('experience_conduite') }}" required>
                                    @error('experience_conduite')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Association avec un Propriétaire -->
                            <div class="section-header mb-4 mt-5">
                                <h4 class="text-success">
                                    <i class="fas fa-handshake me-2"></i>
                                    Association (Optionnel)
                                </h4>
                                <hr>
                            </div>

                            <div class="mb-3">
                                <label for="owner_id" class="form-label">Propriétaire de Véhicule</label>
                                <select class="form-select @error('owner_id') is-invalid @enderror" 
                                        id="owner_id" name="owner_id">
                                    <option value="">Sélectionnez un propriétaire (optionnel)</option>
                                    @foreach($owners as $owner)
                                        <option value="{{ $owner->id }}" {{ old('owner_id') == $owner->id ? 'selected' : '' }}>
                                            {{ $owner->prenom }} {{ $owner->nom }} - {{ $owner->type_vehicule }} ({{ $owner->plaque_immatriculation }})
                                        </option>
                                    @endforeach
                                </select>
                                <div class="form-text">
                                    Si vous travaillez déjà avec un propriétaire inscrit, sélectionnez-le dans la liste.
                                </div>
                                @error('owner_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Références -->
                            <div class="mb-3">
                                <label for="references" class="form-label">Références Professionnelles</label>
                                <textarea class="form-control" id="references" name="references" rows="3" 
                                          placeholder="Noms et contacts de vos précédents employeurs ou clients...">{{ old('references') }}</textarea>
                            </div>

                            <!-- Sécurité -->
                            <div class="section-header mb-4 mt-5">
                                <h4 class="text-success">
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
                                          placeholder="Informations supplémentaires sur votre expérience ou vos compétences...">{{ old('notes') }}</textarea>
                            </div>

                            <!-- Conditions -->
                            <div class="mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="conditions" required>
                                    <label class="form-check-label" for="conditions">
                                        J'accepte les <a href="#" class="text-success">conditions d'utilisation</a> 
                                        et la <a href="#" class="text-success">politique de confidentialité</a> <span class="text-danger">*</span>
                                    </label>
                                </div>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-success btn-lg">
                                    <i class="fas fa-user-plus me-2"></i>
                                    Créer Mon Compte Transporteur
                                </button>
                            </div>
                        </form>

                        <div class="text-center mt-4">
                            <p class="text-muted">
                                Déjà inscrit ? 
                                <a href="{{ route('transporter.login') }}" class="text-success">Connectez-vous ici</a>
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

.btn-success {
    background: linear-gradient(45deg, #28a745, #1e7e34);
    border: none;
    border-radius: 8px;
    font-weight: 500;
}

.btn-success:hover {
    background: linear-gradient(45deg, #1e7e34, #155724);
    transform: translateY(-1px);
}

.form-control:focus,
.form-select:focus {
    border-color: #28a745;
    box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25);
}
</style>
@endpush