@extends('layouts.app')

@section('title', "T'chukudu | Accueil")
@section('description', 'Connectez transporteurs et expéditeurs avec notre plateforme innovante. Géolocalisation, suivi en temps réel et gestion simplifiée de vos livraisons.')

@section('content')

    <!-- start hero section -->
    <section class="py-0 cover-background overflow-visible wow animate__fadeIn  bg-medium-purple" style="background-image: url('https://via.placeholder.com/1920x1038');">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-5 col-lg-6 col-md-7 col-sm-8 text-center text-md-start d-flex flex-column justify-content-center full-screen md-h-650px padding-10-rem-bottom padding-6-rem-top lg-padding-10-rem-top lg-padding-8-rem-bottom md-padding-6-rem-top md-padding-10-rem-bottom sm-h-auto sm-padding-5-rem-bottom">
                    <span class="align-self-center align-self-md-start alt-font font-weight-600 text-medium letter-spacing-1px line-height-24px text-gradient-light-purple-light-red border-bottom border-width-1px border-gradient-light-purple-light-red d-inline-block text-uppercase margin-45px-bottom sm-margin-35px-bottom">Votre Partenaire Logistic Intelligent</span>
                    <h1 class="alt-font text-white font-weight-700 letter-spacing-minus-3px text-uppercase margin-2-half-rem-bottom">T'chukudu</h1>
                    <p class="text-large text-white opacity-6 line-height-30px font-weight-300 w-85 sm-w-100">Votre partenaire logistic intelligent, Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem neque animi, dicta, aperiam repudiandae ipsum nemo saepe ipsam voluptatem dignissimos dolore? Delectus quae repudiandae perferendis vitae </p>

                    <div class="flex">
                        <a href="#download" class="section-link align-self-center align-self-md-start btn btn-fancy btn-round-edge-small btn-large btntussock btn-outline-warning b margin-1-half-rem-top">Je Suis Client</i></a>
                        <a href="#download" class="section-link align-self-center align-self-md-start btn btn-fancy btn-round-edge-small btn-large btn-gradient-light-purple-light-red margin-1-half-rem-top">Inscription transporteur</a>
                    </div>
                </div>
                <div class="col-lg-6 offset-xl-1 col-md-5 z-index-0 align-self-center align-self-lg-end text-end banner-bottom-right-images">
                    <img src="{{ asset('images/phone-car.png') }}" class="tilt-box" alt="" data-tilt-options='{ "maxTilt": 20, "perspective": 1000, "easing": "cubic-bezier(.03,.98,.52,.99)", "scale": 1, "speed": 500, "transition": true, "reset": true, "glare": false, "maxGlare": 1 }' />
                </div>
            </div>
        </div>
    </section>
    <!-- end hero section -->

    <!-- start section -->
    <section class="overflow-visible cover-background wow animate__fadeIn py-2">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6 col-md-10 position-relative margin-20px-bottom md-margin-8-rem-bottom sm-margin-10-rem-bottom wow animate__fadeIn" data-wow-delay="0.2s">
                    <div class="w-70 margin-4-rem-bottom sm-no-margin-bottom">
                        <img src="{{ asset('images/delivery.png') }}" alt="">
                    </div>
                    <div class="position-absolute right-25px bottom-minus-50px w-55 md-right-15px md-bottom-minus-5px" data-parallax-layout-ratio="1.1">
                        <img src="{{ asset('images/chauffeur.png') }}" alt="">
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1 col-md-10 wow animate__fadeIn" data-wow-delay="0.5s">
                    <div class="alt-font text-medium font-weight-500 margin-30px-bottom d-flex"><span class="w-40px h-1px bg-tussock opacity-7 align-self-center margin-20px-right flex-shrink-0"></span><div class="media-body flex-grow-1"><span class="text-gradient-light-purple-light-red text-uppercase">À Propos de T'chukudu</span></div></div>
                    <h4 class="alt-font text-extra-dark-gray font-weight-600 w-85 margin-35px-bottom lg-w-100 sm-margin-25px-bottom">Branche de la société Africa Transport & Logistique Group</h4>
                    <p class="w-80 lg-w-100">Lorem ipsum dolor sit amet consectetur adipiscing do eiusmod tempor incididunt ut labore dolore magna enim veniam nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    <a href="#specialization" class="btn btn-fancy btn-medium btn-dark-gray margin-20px-top section-link">En Savoir Plus</a>
                </div>
            </div>
        </div>
    </section>
    <!-- end section -->

    <!-- start section -->
    <section class="border-bottom border-color-medium-gray md-no-padding-top wow animate__fadeIn pb-2">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-sm-8 text-center margin-5-rem-bottom md-margin-4-rem-bottom sm-margin-2-rem-bottom">
                    <span class="alt-font font-weight-500 text-medium text-gradient-light-purple-light-red letter-spacing-1-half text-uppercase d-inline-block margin-20px-bottom sm-margin-10px-bottom">FAITES-NOUS CONFIANCE</span>
                    <h4 class="alt-font font-weight-300 text-extra-dark-gray letter-spacing-minus-1px">Pourquoi les autrres nous font confiance ?</h4>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-lg-4 row-cols-sm-2">
                <!-- start feature box item -->
                <div class="col wow animate__fadeIn">
                    <div class="feature-box padding-1-half-rem-all sm-padding-2-rem-tb xs-padding-4-rem-lr md-margin-15px-bottom">
                        <div class="feature-box-icon">
                            <i class="line-icon-Talk-Man icon-medium text-gradient-light-purple-light-red margin-35px-bottom md-margin-15px-bottom sm-margin-10px-bottom"></i>
                        </div>
                        <div class="feature-box-content last-paragraph-no-margin">
                            <span class="alt-font font-weight-500 margin-10px-bottom d-block text-extra-dark-gray">Capacité et couverture inégalées</span>
                            <p>Nos services sont assurés par plus de 10 000 propriétaires de camions et partenaires de livraison désireux de livrer votre marchandise là où elle doit être...</p>
                        </div>
                    </div>
                </div>
                <!-- end feature box item -->
                <!-- start feature box item -->
                <div class="col wow animate__fadeIn" data-wow-delay="0.2s">
                    <div class="feature-box padding-1-half-rem-all sm-padding-2-rem-tb xs-padding-4-rem-lr md-margin-15px-bottom">
                        <div class="feature-box-icon">
                            <i class="line-icon-Gear-2 icon-medium text-gradient-light-purple-light-red margin-35px-bottom md-margin-15px-bottom sm-margin-10px-bottom"></i>
                        </div>
                        <div class="feature-box-content last-paragraph-no-margin">
                            <span class="alt-font font-weight-500 margin-10px-bottom d-block text-extra-dark-gray">Innovation et automatisation qui changent la donne</span>
                            <p>Notre technologie crée de la valeur pour les clients et les propriétaires de camions grâce à un écosystème numérique simplifié ...</p>
                        </div>
                    </div>
                </div>
                <!-- end feature box item -->
                <!-- start feature box item -->
                <div class="col wow animate__fadeIn" data-wow-delay="0.4s">
                    <div class="feature-box padding-1-half-rem-all sm-padding-2-rem-tb xs-padding-4-rem-lr sm-margin-15px-bottom">
                        <div class="feature-box-icon">
                            <i class="line-icon-Navigation-LeftWindow icon-medium text-gradient-light-purple-light-red margin-35px-bottom md-margin-15px-bottom sm-margin-10px-bottom"></i>
                        </div>
                        <div class="feature-box-content last-paragraph-no-margin">
                            <span class="alt-font font-weight-500 margin-10px-bottom d-block text-extra-dark-gray">Suivi et visibilité avancés</span>
                            <p>Peu importe ce que vous transportez, kobo vous offre une visibilité à 360 degrés et des informations en temps réel sur l'état de votre transport à chaque livraison.</p>
                        </div>
                    </div>
                </div>
                <!-- end feature box item -->
                <!-- start feature box item -->
                <div class="col wow animate__fadeIn" data-wow-delay="0.6s">
                    <div class="feature-box padding-1-half-rem-all sm-padding-2-rem-tb xs-padding-4-rem-lr">
                        <div class="feature-box-icon">
                            <i class="line-icon-Cursor-Click2 icon-medium text-gradient-light-purple-light-red margin-35px-bottom md-margin-15px-bottom sm-margin-10px-bottom"></i>
                        </div>
                        <div class="feature-box-content last-paragraph-no-margin">
                            <span class="alt-font font-weight-500 margin-10px-bottom d-block text-extra-dark-gray">Vitesse</span>
                            <p>Nos clients disent que nous livrons 3 fois plus vite que les normes de l'industrie.</p>
                        </div>
                    </div>
                </div>
                <!-- end feature box item -->
            </div>
        </div>
    </section>
    <!-- end section -->

    <!-- start section -->
    <section class="wow animate__fadeIn">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-4 col-lg-5 col-sm-6 text-center margin-4-rem-bottom">
                    <span class="alt-font font-weight-500 text-medium text-gradient-light-purple-light-red letter-spacing-1-half text-uppercase d-inline-block margin-20px-bottom sm-margin-10px-bottom">Ce que vous gagnez</span>
                    <h5 class="alt-font font-weight-300 text-extra-dark-gray letter-spacing-minus-1px mx-auto mx-sm-0 xs-w-80">Avantages pour nos clients et transporteurs</h5>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-4 text-center text-md-end sm-margin-30px-bottom">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-1 justify-content-center">
                        <!-- start feature box item -->
                        <div class="col margin-5-rem-bottom last-paragraph-no-margin wow animate__fadeInLeft" data-wow-delay="0.4s">
                            <i class="line-icon-Favorite-Window text-gradient-light-purple-light-red icon-medium margin-20px-bottom"></i>
                            <span class="alt-font font-weight-500 text-slate-blue d-block margin-5px-bottom">Client</span>
                            <p class="d-inline-block xs-w-75">Transport de fret rapide, efficace et Visibilité en temps réel</p>
                        </div>
                        <!-- end feature box item -->
                        <!-- start feature box item -->
                        <div class="col margin-5-rem-bottom last-paragraph-no-margin wow animate__fadeInLeft" data-wow-delay="0.6s">
                            <i class="line-icon-Talk-Man text-gradient-light-purple-light-red icon-medium margin-20px-bottom"></i>
                            <span class="alt-font font-weight-500 text-slate-blue d-block margin-5px-bottom">Client</span>
                            <p class="d-inline-block xs-w-75">Vaste réseau de partenaires pour l'entreposage, le dédouanement et l'expédition de fret</p>
                        </div>
                        <!-- end feature box item -->
                        <!-- start feature box item -->
                        <div class="col last-paragraph-no-margin wow animate__fadeInLeft" data-wow-delay="0.8s">
                            <i class="line-icon-Gear-2 text-gradient-light-purple-light-red icon-medium margin-20px-bottom"></i>
                            <span class="alt-font font-weight-500 text-slate-blue d-block margin-5px-bottom">Client</span>
                            <p class="d-inline-block xs-w-75">Financement des fournisseurst</p>
                        </div>
                        <!-- end feature box item -->
                    </div>
                </div>
                <div class="col-md-4 offset-lg-1 px-lg-0 sm-margin-20px-bottom wow animate__zoomIn">
                    <img src="{{ asset('images/phone-car-2.png') }}" alt="" />
                </div>
                <div class="col-lg-3 offset-lg-1 col-md-4 text-center text-md-start">
                    <div class="row row-cols-1 row-cols-md-1 row-cols-sm-2 justify-content-center">
                        <!-- start feature box item -->
                        <div class="col margin-5-rem-bottom last-paragraph-no-margin wow animate__fadeInRight" data-wow-delay="0.4s">
                            <i class="line-icon-Sound text-gradient-light-purple-light-red icon-medium margin-20px-bottom"></i>
                            <span class="alt-font font-weight-500 text-slate-blue d-block margin-5px-bottom">Transporteur</span>
                            <p class="d-inline-block xs-w-75">Augmentation des revenus au-dessus du taux moyen du marché</p>
                        </div>
                        <!-- end feature box item -->
                        <!-- start feature box item -->
                        <div class="col margin-5-rem-bottom last-paragraph-no-margin wow animate__fadeInRight" data-wow-delay="0.6s">
                            <i class="line-icon-Download-fromCloud text-gradient-light-purple-light-red icon-medium margin-20px-bottom"></i>
                            <span class="alt-font font-weight-500 text-slate-blue d-block margin-5px-bottom">Transporteur</span>
                            <p class="d-inline-block xs-w-75">Capacité à développer votre entreprise de camionnage</p>
                        </div>
                        <!-- end feature box item -->
                        <!-- start feature box item -->
                        <div class="col last-paragraph-no-margin wow animate__fadeInRight" data-wow-delay="0.8s">
                            <i class="line-icon-Archery-2 text-gradient-light-purple-light-red icon-medium margin-20px-bottom"></i>
                            <span class="alt-font font-weight-500 text-slate-blue d-block margin-5px-bottom">Transporteur</span>
                            <p class="d-inline-block xs-w-75">Financement de voyage</p>
                        </div>
                        <!-- end feature box item -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end section -->

    <!-- start section -->
    <section id="download" class="big-section cover-background wow animate__fadeIn bg-medium-purple" style="background-image: url('https://via.placeholder.com/1920x388');">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 col-md-6 text-center text-md-start sm-margin-30px-bottom wow animate__fadeIn">
                    <span class="alt-font font-weight-500 text-medium text-gradient-light-purple-light-red letter-spacing-1-half d-inline-block text-uppercase margin-15px-bottom sm-margin-10px-bottom">Téléchargez l'application</span>
                    <h4 class="alt-font font-weight-600 text-white letter-spacing-minus-1px text-uppercase mb-0">Obtenez-le Gratuitement</h4>
                </div>
                <div class="col-md-6 offset-lg-1 ps-lg-0 d-flex text-center wow animate__fadeIn">
                    <a href="https://www.apple.com/ios/app-store/" target="_blank" class="margin-30px-right md-margin-15px-right"><img class="w-100" src="images/application-img-11.png" alt="" /></a>
                    <a href="https://play.google.com/" target="_blank" class=""><img class="w-100" src="images/application-img-12.png" alt="" /></a>
                </div>
            </div>
        </div>
    </section>
    <!-- end section -->

    <!-- start section -->
    {{-- <section>
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-11 col-md-12 col-xl-4 col-lg-5 position-relative last-paragraph-no-margin padding-7-rem-bottom md-margin-4-half-rem-bottom md-padding-6-rem-bottom xs-padding-7-rem-bottom wow animate__fadeIn">
                    <span class="alt-font font-weight-500 text-medium text-gradient-light-purple-light-red letter-spacing-1-half text-uppercase d-inline-block margin-25px-bottom sm-margin-15px-bottom">Mobile experience</span>
                    <h5 class="alt-font font-weight-300 text-slate-blue letter-spacing-minus-1-half margin-30px-bottom md-margin-15px-bottom">We enhance visual display and promote</h5>
                    <p class="w-75 sm-w-100">Lorem ipsum dolor sit amet consectetur do eiusmod tempor incididunt ut labore ut enim ad minim veniam nostrud.</p>
                    <div class="swiper-button-next-nav swiper-button-next slider-navigation-style-03 rounded-circle bottom-0px"><i class="feather icon-feather-arrow-right"></i></div>
                    <div class="swiper-button-previous-nav swiper-button-prev slider-navigation-style-03 rounded-circle bottom-0px"><i class="feather icon-feather-arrow-left"></i></div>
                </div>
                <div class="col-lg-7 offset-xl-1 wow animate__fadeInRight" data-wow-delay="0.2s">
                    <div class="testimonials-carousel-style-01 swiper-simple-arrow-style-1">
                        <div class="swiper" data-slider-options='{ "loop": true, "slidesPerView": 1, "spaceBetween": 30, "observer": true, "observeParents": true, "navigation": { "nextEl": ".swiper-button-next-nav", "prevEl": ".swiper-button-previous-nav" }, "keyboard": { "enabled": true, "onlyInViewport": true }, "autoplay": { "delay": 3000, "disableOnInteraction": false }, "breakpoints": { "992": { "slidesPerView": 3 }, "768": { "slidesPerView": 2 } } }'>
                            <div class="swiper-wrapper">
                                <!-- start slider item -->
                                <div class="swiper-slide text-center">
                                    <img src="https://via.placeholder.com/353x681" alt=""/>
                                </div>
                                <!-- end slider item -->
                                <!-- start slider item -->
                                <div class="swiper-slide text-center">
                                    <img src="https://via.placeholder.com/353x681" alt=""/>
                                </div>
                                <!-- end slider item -->
                                <!-- start slider item -->
                                <div class="swiper-slide text-center">
                                    <img src="https://via.placeholder.com/353x681" alt=""/>
                                </div>
                                <!-- end slider item -->
                                <!-- start slider item -->
                                <div class="swiper-slide text-center">
                                    <img src="https://via.placeholder.com/353x681" alt=""/>
                                </div>
                                <!-- end slider item -->
                                <!-- start slider item -->
                                <div class="swiper-slide text-center">
                                    <img src="https://via.placeholder.com/353x681" alt=""/>
                                </div>
                                <!-- end slider item -->
                                <!-- start slider item -->
                                <div class="swiper-slide text-center">
                                    <img src="https://via.placeholder.com/353x681" alt=""/>
                                </div>
                                <!-- end slider item -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- end section -->

    <!-- start section -->
    <section class="bg-gradient-white-light-gray border-top border-color-medium-gray">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-5 col-md-6 text-center margin-3-rem-bottom sm-margin-1-rem-bottom wow animate__fadeIn">
                    <span class="alt-font font-weight-500 text-medium text-gradient-light-purple-light-red letter-spacing-1-half text-uppercase d-inline-block margin-20px-bottom sm-margin-10px-bottom">Clients satisfaits</span>
                    <h5 class="alt-font font-weight-300 text-extra-dark-gray letter-spacing-minus-1px d-inline-block w-90 md-w-100 xs-w-80">Aimé parmi nos clients les plus précieux</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <div class="swiper black-move swiper-horizontal-3d swiper-pagination-bottom padding-7-rem-tb"  data-slider-options='{ "loop": true, "slidesPerView": 1, "centeredSlides":true,"effect":"coverflow","coverflowEffect":{"rotate":0,"stretch":100,"depth":150,"modifier":1.5,"slideShadows":true}, "keyboard": { "enabled": true, "onlyInViewport": true }, "navigation": { "nextEl": ".swiper-button-next-nav-2", "prevEl": ".swiper-button-previous-nav-2" }, "autoplay": { "delay": 3000, "disableOnInteraction": false }, "pagination": { "el": ".swiper-pagination-2", "clickable": true, "dynamicBullets": true }, "breakpoints": { "768": { "slidesPerView": 2 } } }'>
                        <div class="swiper-wrapper">
                            <!-- start slider item -->
                            <div class="swiper-slide bg-white border-radius-4px">
                                <div class="position-relative padding-5-rem-lr md-padding-3-rem-lr padding-4-half-rem-bottom padding-8-rem-top">
                                    <img alt="" src="https://via.placeholder.com/104x125" class="absolute-middle-center top-0px">
                                    <div class="testimonials-content">
                                        <span class="text-extra-medium text-extra-dark-gray margin-10px-bottom d-block font-weight-500">Every element is designed beautifully and perfect!</span>
                                        <p class="margin-30px-bottom">« Grâce à cette application, j'ai enfin pu trouver un transporteur fiable pour livrer mes marchandises entre Kinshasa et Lubumbashi. Tout est transparent, rapide et sécurisé. Je gagne un temps fou ! »</p>
                                    </div>
                                    <div class="testimonials-author text-medium margin-5px-bottom text-gradient-light-purple-light-red text-uppercase font-weight-600 d-inline-block">Jean Marc (client)</div>
                                </div>
                            </div>
                            <!-- end slider item -->
                            <!-- start slider item -->
                            <div class="swiper-slide bg-white border-radius-4px">
                                <div class="position-relative padding-5-rem-lr md-padding-3-rem-lr padding-4-half-rem-bottom padding-8-rem-top">
                                    <img alt="" src="https://via.placeholder.com/104x125" class="absolute-middle-center top-0px">
                                    <div class="testimonials-content">
                                        <span class="text-extra-medium text-extra-dark-gray margin-10px-bottom d-block font-weight-500">Simple and easy to integrate and build the website!</span>
                                        <p class="margin-30px-bottom">« Avant, je passais des journées à chercher des clients. Maintenant, je reçois des demandes directement sur mon téléphone. L'application m’a vraiment aidé à mieux organiser mon travail et à augmenter mes revenus. »</p>
                                    </div>
                                    <div class="testimonials-author text-medium margin-5px-bottom text-gradient-light-purple-light-red text-uppercase font-weight-600 d-inline-block"> Patrick K (transporeur)</div>
                                </div>
                            </div>
                            <!-- end slider item -->
                            <!-- start slider item -->
                            <div class="swiper-slide bg-white border-radius-4px">
                                <div class="position-relative padding-5-rem-lr md-padding-3-rem-lr padding-4-half-rem-bottom padding-8-rem-top">
                                    <img alt="" src="https://via.placeholder.com/104x125" class="absolute-middle-center top-0px">
                                    <div class="testimonials-content">
                                        <span class="text-extra-medium text-extra-dark-gray margin-10px-bottom d-block font-weight-500">Every element is designed beautifully and perfect!</span>
                                        <p class="margin-30px-bottom">« En tant que startup dans la logistique, cette application m’a permis de lancer mon activité avec peu de moyens. L’interface est intuitive et le suivi des trajets est un vrai plus pour mes clients. Bravo à l'équipe ! </p>
                                    </div>
                                    <div class="testimonials-author text-medium margin-5px-bottom text-gradient-light-purple-light-red text-uppercase font-weight-600 d-inline-block">Déborah N. (propriétaire)</div>
                                </div>
                            </div>
                            <!-- end slider item -->
                            <!-- start slider item -->
                            <div class="swiper-slide bg-white border-radius-4px">
                                <div class="position-relative padding-5-rem-lr md-padding-3-rem-lr padding-4-half-rem-bottom padding-8-rem-top">
                                    <img alt="" src="https://via.placeholder.com/104x125" class="absolute-middle-center top-0px">
                                    <div class="testimonials-content">
                                        <span class="text-extra-medium text-extra-dark-gray margin-10px-bottom d-block font-weight-500">Every element is designed beautifully and perfect!</span>
                                        <p class="margin-30px-bottom">« J’avais du mal à trouver quelqu’un de confiance pour transporter mes meubles après un déménagement. Grâce à l’application, j’ai trouvé un transporteur en quelques minutes. Tout s’est bien passé, et j’ai pu suivre le trajet en temps réel. Je recommande à 100 % ! »</p>
                                    </div>
                                    <div class="testimonials-author text-medium margin-5px-bottom text-gradient-light-purple-light-red text-uppercase font-weight-600 d-inline-block">Mireille B. (Client)</div>
                                </div>
                            </div>
                            <!-- end slider item -->
                        </div>
                        <!-- start slider pagination -->
                        <!--<div class="swiper-pagination swiper-pagination-2"></div>-->
                        <!-- end slider pagination -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end section -->

    <!-- start section -->
    <section>
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-11 col-md-12 col-xl-4 col-lg-5 position-relative last-paragraph-no-margin padding-7-rem-bottom md-margin-4-half-rem-bottom md-padding-6-rem-bottom xs-padding-7-rem-bottom wow animate__fadeIn">
                    <span class="alt-font font-weight-500 text-medium text-gradient-light-purple-light-red letter-spacing-1-half text-uppercase d-inline-block margin-25px-bottom sm-margin-15px-bottom">Nous sommes dans plusieurs secteur</span>
                    <h5 class="alt-font font-weight-300 text-slate-blue letter-spacing-minus-1-half margin-30px-bottom md-margin-15px-bottom">Notre domaine d'expértise</h5>
                    <p class="w-75 sm-w-100">Afirca Transport & Logiststic group est plus qu'une société lorem ipsum dolor icume ekdk care.</p>
                    <div class="swiper-button-next-nav swiper-button-next slider-navigation-style-03 rounded-circle bottom-0px"><i class="feather icon-feather-arrow-right"></i></div>
                    <div class="swiper-button-previous-nav swiper-button-prev slider-navigation-style-03 rounded-circle bottom-0px"><i class="feather icon-feather-arrow-left"></i></div>
                </div>
                <div class="col-lg-7 offset-xl-1 wow animate__fadeInRight" data-wow-delay="0.2s">
                    <div class="testimonials-carousel-style-01 swiper-simple-arrow-style-1">
                        <div class="swiper" data-slider-options='{ "loop": true, "slidesPerView": 1, "spaceBetween": 30, "observer": true, "observeParents": true, "navigation": { "nextEl": ".swiper-button-next-nav", "prevEl": ".swiper-button-previous-nav" }, "keyboard": { "enabled": true, "onlyInViewport": true }, "autoplay": { "delay": 3000, "disableOnInteraction": false }, "breakpoints": { "992": { "slidesPerView": 3 }, "768": { "slidesPerView": 2 } } }'>
                            <div class="swiper-wrapper">
                                <!-- start slider item -->
                                <div class="swiper-slide text-center">
                                    <img src="{{ asset('images/icon.png') }}" width="200"/>
                                </div>
                                <!-- end slider item -->
                                <!-- start slider item -->
                                <div class="swiper-slide text-center">
                                    <img src="{{ asset('images/logo.png') }}" width="200"/>
                                </div>
                                <!-- end slider item -->
                                <!-- start slider item -->
                                <div class="swiper-slide text-center">
                                    <img src="{{ asset('images/icon.png') }}" width="200"/>
                                </div>
                                <!-- end slider item -->
                                <!-- start slider item -->
                                <div class="swiper-slide text-center">
                                    <img src="{{ asset('images/logo.png') }}" width="200"/>
                                </div>
                                <!-- end slider item -->
                                <!-- start slider item -->
                                <div class="swiper-slide text-center">
                                    <img src="{{ asset('images/icon.png') }}" width="200"/>
                                </div>
                                <!-- end slider item -->
                                <!-- start slider item -->
                                <div class="swiper-slide text-center">
                                    <img src="{{ asset('images/logo.png') }}" width="200"/>
                                </div>
                                <!-- end slider item -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end section -->

@endsection
