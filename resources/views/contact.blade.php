@extends('layouts.app')

@section('title', "T'chukudu | Contact")
@section('description', 'Contactez l\'équipe LogiConnect pour toutes vos questions sur nos services de transport et logistique.')

@section('content')
<!-- Hero Section -->
<section class="hero-section bg-primary text-white py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold mb-4">Contactez-Nous</h1>
                <p class="lead">
                    Notre équipe est là pour répondre à toutes vos questions et vous accompagner
                    dans vos projets de transport et de logistique.
                </p>
            </div>
            <div class="col-lg-6">
                <img src="https://images.pexels.com/photos/7688336/pexels-photo-7688336.jpeg?auto=compress&cs=tinysrgb&w=800"
                     alt="Contactez-nous" class="img-fluid rounded shadow">
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section class="contact-section py-5">
    <div class="container">
        <div class="row">
            <!-- Contact Form -->
            <div class="col-lg-8">
                <div class="card shadow-lg">
                    <div class="card-header bg-white py-4">
                        <h3 class="mb-0">
                            <i class="fas fa-envelope me-2 text-primary"></i>
                            Envoyez-nous un Message
                        </h3>
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

                        <form method="POST" action="{{ route('contact.store') }}">
                            @csrf

                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label for="name" class="form-label">Nom Complet <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fas fa-user"></i>
                                        </span>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                               id="name" name="name" value="{{ old('name') }}"
                                               placeholder="Votre nom complet" required>
                                    </div>
                                    @error('name')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="email" class="form-label">Adresse Email <span class="text-danger">*</span></label>
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
                            </div>

                            <div class="mb-4">
                                <label for="message" class="form-label">Message <span class="text-danger">*</span></label>
                                <textarea class="form-control @error('message') is-invalid @enderror"
                                          id="message" name="message" rows="6"
                                          placeholder="Décrivez votre demande ou vos questions..." required>{{ old('message') }}</textarea>
                                @error('message')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="fas fa-paper-plane me-2"></i>
                                    Envoyer le Message
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Contact Info -->
            <div class="col-lg-4">
                <div class="contact-info">
                    <!-- Contact Details -->
                    <div class="card shadow mb-4">
                        <div class="card-body p-4">
                            <h5 class="card-title text-primary mb-4">
                                <i class="fas fa-info-circle me-2"></i>
                                Informations de Contact
                            </h5>

                            <div class="contact-item mb-3">
                                <div class="d-flex align-items-center">
                                    <div class="contact-icon me-3">
                                        <i class="fas fa-map-marker-alt text-primary"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Adresse</h6>
                                        <p class="text-muted mb-0">Avenue Kasa-Vubu, Kinshasa<br>République Démocratique du Congo</p>
                                    </div>
                                </div>
                            </div>

                            <div class="contact-item mb-3">
                                <div class="d-flex align-items-center">
                                    <div class="contact-icon me-3">
                                        <i class="fas fa-phone text-primary"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Téléphone</h6>
                                        <p class="text-muted mb-0">+243 123 456 789</p>
                                    </div>
                                </div>
                            </div>

                            <div class="contact-item mb-3">
                                <div class="d-flex align-items-center">
                                    <div class="contact-icon me-3">
                                        <i class="fas fa-envelope text-primary"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Email</h6>
                                        <p class="text-muted mb-0">contact@logiconnect.cd</p>
                                    </div>
                                </div>
                            </div>

                            <div class="contact-item">
                                <div class="d-flex align-items-center">
                                    <div class="contact-icon me-3">
                                        <i class="fas fa-clock text-primary"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Horaires</h6>
                                        <p class="text-muted mb-0">Lun - Ven: 8h00 - 18h00<br>Sam: 8h00 - 14h00</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Links -->
                    <div class="card shadow mb-4">
                        <div class="card-body p-4">
                            <h5 class="card-title text-primary mb-4">
                                <i class="fas fa-link me-2"></i>
                                Liens Rapides
                            </h5>
                            <ul class="list-unstyled">
                                <li class="mb-2">
                                    <a href="{{ route('owner.register') }}" class="text-decoration-none">
                                        <i class="fas fa-truck me-2"></i>Devenir Propriétaire
                                    </a>
                                </li>
                                <li class="mb-2">
                                    <a href="{{ route('transporter.register') }}" class="text-decoration-none">
                                        <i class="fas fa-user-tie me-2"></i>Devenir Transporteur
                                    </a>
                                </li>
                                <li class="mb-2">
                                    <a href="{{ route('about') }}" class="text-decoration-none">
                                        <i class="fas fa-info-circle me-2"></i>À Propos
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('transporter.login') }}" class="text-decoration-none">
                                        <i class="fas fa-sign-in-alt me-2"></i>Connexion
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Social Media -->
                    <div class="card shadow">
                        <div class="card-body p-4 text-center">
                            <h5 class="card-title text-primary mb-4">
                                <i class="fas fa-share-alt me-2"></i>
                                Suivez-Nous
                            </h5>
                            <div class="social-links">
                                <a href="#" class="btn btn-outline-primary btn-sm me-2 mb-2">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="#" class="btn btn-outline-info btn-sm me-2 mb-2">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="#" class="btn btn-outline-primary btn-sm me-2 mb-2">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                                <a href="#" class="btn btn-outline-danger btn-sm mb-2">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="faq-section py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="text-center mb-5">
                    <h2 class="section-title">Questions Fréquentes</h2>
                    <p class="section-subtitle">Trouvez rapidement les réponses à vos questions</p>
                </div>

                <div class="accordion" id="faqAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faq1">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1">
                                Comment puis-je m'inscrire en tant que transporteur ?
                            </button>
                        </h2>
                        <div id="collapse1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Pour vous inscrire en tant que transporteur, cliquez sur le lien "Devenir Transporteur"
                                et remplissez le formulaire d'inscription avec vos informations personnelles et
                                les détails de votre permis de conduire.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faq2">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2">
                                Quels sont les frais d'utilisation de la plateforme ?
                            </button>
                        </h2>
                        <div id="collapse2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                L'inscription sur notre plateforme est gratuite. Nous prélevons une petite commission
                                uniquement sur les transactions réussies pour maintenir et améliorer nos services.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faq3">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3">
                                Comment fonctionne le suivi en temps réel ?
                            </button>
                        </h2>
                        <div id="collapse3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Notre système de géolocalisation utilise la technologie GPS pour suivre les véhicules
                                en temps réel. Les clients peuvent voir la position exacte de leur colis et
                                recevoir des notifications sur l'état de la livraison.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faq4">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4">
                                Que faire en cas de problème avec une livraison ?
                            </button>
                        </h2>
                        <div id="collapse4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                En cas de problème, contactez immédiatement notre support client au +243 123 456 789
                                ou via le formulaire de contact. Notre équipe interviendra rapidement pour résoudre
                                le problème et assurer la satisfaction de toutes les parties.
                            </div>
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
.contact-icon {
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: rgba(0, 123, 255, 0.1);
    border-radius: 50%;
}

.contact-item {
    padding: 1rem 0;
    border-bottom: 1px solid #eee;
}

.contact-item:last-child {
    border-bottom: none;
}

.card {
    border: none;
    border-radius: 15px;
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

.section-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: #333;
    margin-bottom: 1rem;
}

.section-subtitle {
    font-size: 1.2rem;
    color: #666;
    margin-bottom: 2rem;
}

.accordion-button:not(.collapsed) {
    background-color: rgba(0, 123, 255, 0.1);
    color: #007bff;
}
</style>
@endpush
