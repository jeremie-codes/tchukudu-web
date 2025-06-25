@extends('layouts.app')

@section('title', 'Connexion Transporteur - LogiConnect')
@section('description', 'Connectez-vous à votre compte transporteur LogiConnect pour accéder à vos courses et gérer votre activité.')

@section('content')
<section class="login-section py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white text-center py-4">
                        <h2 class="mb-0">
                            <i class="fas fa-sign-in-alt me-2"></i>
                            Connexion Transporteur
                        </h2>
                        <p class="mb-0 mt-2">Accédez à votre espace transporteur</p>
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

                        <form method="POST" action="{{ route('transporter.login') }}">
                            @csrf
                            
                            <div class="mb-4">
                                <label for="email" class="form-label">Adresse Email</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-envelope"></i>
                                    </span>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                           id="email" name="email" value="{{ old('email') }}" 
                                           placeholder="votre@email.com" required>
                                </div>
                                @error('email')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="mot_de_passe" class="form-label">Mot de Passe</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                    <input type="password" class="form-control @error('mot_de_passe') is-invalid @enderror" 
                                           id="mot_de_passe" name="mot_de_passe" 
                                           placeholder="Votre mot de passe" required>
                                    <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                                @error('mot_de_passe')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="remember" name="remember">
                                    <label class="form-check-label" for="remember">
                                        Se souvenir de moi
                                    </label>
                                </div>
                            </div>

                            <div class="d-grid gap-2 mb-4">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="fas fa-sign-in-alt me-2"></i>
                                    Se Connecter
                                </button>
                            </div>

                            <div class="text-center">
                                <a href="#" class="text-primary text-decoration-none">
                                    <i class="fas fa-key me-1"></i>
                                    Mot de passe oublié ?
                                </a>
                            </div>
                        </form>

                        <hr class="my-4">

                        <div class="text-center">
                            <p class="text-muted mb-3">Pas encore de compte ?</p>
                            <div class="d-grid gap-2">
                                <a href="{{ route('transporter.register') }}" class="btn btn-outline-primary">
                                    <i class="fas fa-user-plus me-2"></i>
                                    Créer un Compte Transporteur
                                </a>
                                <a href="{{ route('owner.register') }}" class="btn btn-outline-success">
                                    <i class="fas fa-truck me-2"></i>
                                    Devenir Propriétaire de Véhicule
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Info Card -->
                <div class="card mt-4 border-info">
                    <div class="card-body text-center">
                        <h6 class="card-title text-info">
                            <i class="fas fa-info-circle me-2"></i>
                            Besoin d'Aide ?
                        </h6>
                        <p class="card-text small text-muted">
                            Contactez notre support client au <strong>+243 123 456 789</strong> 
                            ou envoyez un email à <strong>support@logiconnect.cd</strong>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
document.getElementById('togglePassword').addEventListener('click', function() {
    const passwordInput = document.getElementById('mot_de_passe');
    const toggleIcon = this.querySelector('i');
    
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        toggleIcon.classList.remove('fa-eye');
        toggleIcon.classList.add('fa-eye-slash');
    } else {
        passwordInput.type = 'password';
        toggleIcon.classList.remove('fa-eye-slash');
        toggleIcon.classList.add('fa-eye');
    }
});
</script>
@endpush

@push('styles')
<style>
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

.form-control:focus {
    border-color: #007bff;
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
}

.input-group-text {
    background-color: #f8f9fa;
    border-color: #ced4da;
}

.login-section {
    background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
    min-height: 100vh;
    display: flex;
    align-items: center;
}
</style>
@endpush