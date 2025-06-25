@extends('layouts.app')

@section('title', "T'chukudu | A Propos")
@section('description', 'Découvrez LogiConnect, votre partenaire de confiance pour le transport et la logistique en RDC. Notre mission, notre vision et nos valeurs.')

@section('content')
<!-- Hero Section -->
<section class="hero-section bg-primary text-white py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold mb-4">À Propos de LogiConnect</h1>
                <p class="lead">
                    Nous révolutionnons le secteur du transport et de la logistique en République Démocratique du Congo
                    grâce à notre plateforme innovante de mise en relation.
                </p>
            </div>
            <div class="col-lg-6">
                <img src="https://images.pexels.com/photos/1427541/pexels-photo-1427541.jpeg?auto=compress&cs=tinysrgb&w=800"
                     alt="À propos de LogiConnect" class="img-fluid rounded shadow">
            </div>
        </div>
    </div>
</section>

<!-- Mission Section -->
<section class="mission-section py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h2 class="section-title mb-4">Notre Mission</h2>
                <p class="lead">
                    Faciliter et optimiser le transport de marchandises en RDC en connectant efficacement
                    les propriétaires de véhicules avec les expéditeurs, tout en offrant une transparence
                    totale grâce à la géolocalisation et au suivi en temps réel.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Values Section -->
<section class="values-section py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center mb-5">
                <h2 class="section-title">Nos Valeurs</h2>
                <p class="section-subtitle">Les principes qui guident notre action quotidienne</p>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="value-card text-center p-4 bg-white rounded shadow h-100">
                    <div class="value-icon mb-3">
                        <i class="fas fa-handshake fa-3x text-primary"></i>
                    </div>
                    <h4>Confiance</h4>
                    <p>Nous construisons des relations durables basées sur la transparence et la fiabilité.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="value-card text-center p-4 bg-white rounded shadow h-100">
                    <div class="value-icon mb-3">
                        <i class="fas fa-rocket fa-3x text-primary"></i>
                    </div>
                    <h4>Innovation</h4>
                    <p>Nous utilisons les dernières technologies pour améliorer continuellement nos services.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="value-card text-center p-4 bg-white rounded shadow h-100">
                    <div class="value-icon mb-3">
                        <i class="fas fa-users fa-3x text-primary"></i>
                    </div>
                    <h4>Communauté</h4>
                    <p>Nous créons un écosystème où chaque acteur peut prospérer et grandir ensemble.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Story Section -->
<section class="story-section py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <img src="https://images.pexels.com/photos/1427541/pexels-photo-1427541.jpeg?auto=compress&cs=tinysrgb&w=800"
                     alt="Notre histoire" class="img-fluid rounded shadow">
            </div>
            <div class="col-lg-6">
                <h2 class="section-title mb-4">Notre Histoire</h2>
                <p class="mb-4">
                    LogiConnect est née d'un constat simple : le secteur du transport en RDC manquait
                    d'une plateforme moderne permettant de connecter efficacement l'offre et la demande.
                </p>
                <p class="mb-4">
                    Fondée par une équipe d'entrepreneurs passionnés par la technologie et le développement
                    économique de la RDC, notre entreprise s'est donnée pour mission de digitaliser
                    et moderniser le secteur du transport.
                </p>
                <p>
                    Aujourd'hui, nous sommes fiers de contribuer à l'amélioration de la chaîne logistique
                    congolaise et de participer au développement économique de notre pays.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="team-section py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center mb-5">
                <h2 class="section-title">Notre Équipe</h2>
                <p class="section-subtitle">Des professionnels dévoués à votre service</p>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="team-card text-center p-4 bg-white rounded shadow">
                    <div class="team-photo mb-3">
                        <img src="https://images.pexels.com/photos/1222271/pexels-photo-1222271.jpeg?auto=compress&cs=tinysrgb&w=300"
                             alt="CEO" class="rounded-circle" style="width: 120px; height: 120px; object-fit: cover;">
                    </div>
                    <h5>Jean-Baptiste MUKENDI</h5>
                    <p class="text-muted">Directeur Général</p>
                    <p class="small">Expert en logistique avec plus de 15 ans d'expérience dans le secteur du transport en Afrique.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="team-card text-center p-4 bg-white rounded shadow">
                    <div class="team-photo mb-3">
                        <img src="https://images.pexels.com/photos/1239291/pexels-photo-1239291.jpeg?auto=compress&cs=tinysrgb&w=300"
                             alt="CTO" class="rounded-circle" style="width: 120px; height: 120px; object-fit: cover;">
                    </div>
                    <h5>Marie KABILA</h5>
                    <p class="text-muted">Directrice Technique</p>
                    <p class="small">Ingénieure en informatique spécialisée dans le développement d'applications mobiles et web.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="team-card text-center p-4 bg-white rounded shadow">
                    <div class="team-photo mb-3">
                        <img src="https://images.pexels.com/photos/1181686/pexels-photo-1181686.jpeg?auto=compress&cs=tinysrgb&w=300"
                             alt="COO" class="rounded-circle" style="width: 120px; height: 120px; object-fit: cover;">
                    </div>
                    <h5>Patrick TSHISEKEDI</h5>
                    <p class="text-muted">Directeur des Opérations</p>
                    <p class="small">Spécialiste en gestion des opérations et optimisation des processus logistiques.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="stats-section py-5 bg-primary text-white">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-3">
                <div class="stat-item">
                    <h3 class="display-4 fw-bold">500+</h3>
                    <p>Transporteurs Inscrits</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-item">
                    <h3 class="display-4 fw-bold">1000+</h3>
                    <p>Livraisons Réussies</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-item">
                    <h3 class="display-4 fw-bold">50+</h3>
                    <p>Villes Couvertes</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-item">
                    <h3 class="display-4 fw-bold">98%</h3>
                    <p>Satisfaction Client</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h2 class="mb-4">Rejoignez Notre Communauté</h2>
                <p class="lead mb-4">
                    Faites partie de la révolution du transport en RDC.
                    Inscrivez-vous dès aujourd'hui et découvrez tous nos avantages.
                </p>
                <div class="d-flex gap-3 justify-content-center flex-wrap">
                    <a href="{{ route('owner.register') }}" class="btn btn-primary btn-lg">
                        Devenir Propriétaire
                    </a>
                    <a href="{{ route('transporter.register') }}" class="btn btn-outline-primary btn-lg">
                        Devenir Transporteur
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
.value-card:hover,
.team-card:hover {
    transform: translateY(-5px);
    transition: transform 0.3s ease;
}

.stat-item h3 {
    color: #fff;
    margin-bottom: 0.5rem;
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
</style>
@endpush
