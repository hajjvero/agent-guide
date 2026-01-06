<?php
include "./layaout/header.php";
?>

    <style>
        :root {
            --maroon-red: #8B1E3F;
            --moroccan-green: #2D5A27;
            --gold: #D4AF37;
            --white: #FFFFFF;
            --light-gray: #F8F9FA;
            --medium-gray: #E9ECEF;
            --dark-gray: #495057;
        }

        /* Hero Section Hébergement */
        .accommodation-hero {
            background: linear-gradient(135deg,
                    rgba(139, 30, 63, 1) 0%,
                    rgba(165, 42, 78, 1) 50%,
                    rgba(139, 30, 63, 1) 100%);
            color: var(--white);
            padding: 80px 0 40px;
            margin-bottom: 30px;
            box-shadow: inset 0 0 80px rgba(0, 0, 0, 0.2);
            margin-top: 76px; /* Offset for fixed navbar */
        }

        .accommodation-title {
            font-size: 2.5rem;
            margin-bottom: 15px;
            font-family: 'Playfair Display', serif;
        }

        /* Barre de filtres */
        .filters-section {
            padding: 30px 0;
            background-color: var(--white);
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            margin-bottom: 30px;
        }

        .filter-card {
            background-color: var(--light-gray);
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 15px;
            border: 1px solid var(--medium-gray);
        }

        .filter-title {
            color: var(--moroccan-green);
            font-weight: 600;
            margin-bottom: 10px;
            font-size: 1.1rem;
        }

        .form-label {
            font-weight: 600;
            color: var(--moroccan-green);
            margin-bottom: 8px;
            font-size: 0.9rem;
        }

        .form-control,
        .form-select {
            border-radius: 8px;
            padding: 10px 12px;
            border: 1px solid var(--medium-gray);
            transition: all 0.3s;
            font-size: 0.9rem;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--maroon-red);
            box-shadow: 0 0 0 0.25rem rgba(139, 30, 63, 0.25);
        }

        /* Section des hébergements disponibles */
        .accommodations-section {
            padding: 30px 0;
        }

        .accommodation-card {
            background-color: var(--white);
            border-radius: 10px;
            margin-bottom: 25px;
            border: 1px solid var(--medium-gray);
            transition: all 0.3s ease;
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.05);
            overflow: hidden;
        }

        .accommodation-card:hover {
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            transform: translateY(-3px);
        }

        .accommodation-card.selected {
            border-color: var(--maroon-red);
            border-width: 2px;
            background-color: rgba(139, 30, 63, 0.03);
        }

        .accommodation-image {
            height: 200px;
            overflow: hidden;
            position: relative;
        }

        .accommodation-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .accommodation-card:hover .accommodation-image img {
            transform: scale(1.05);
        }

        .accommodation-type-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background-color: rgba(139, 30, 63, 0.9);
            color: var(--white);
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .accommodation-content {
            padding: 20px;
        }

        .accommodation-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 15px;
        }

        .accommodation-name {
            font-size: 1.3rem;
            color: var(--moroccan-green);
            margin-bottom: 5px;
        }

        .accommodation-rating {
            color: var(--gold);
            font-weight: 600;
            font-size: 0.9rem;
        }

        .accommodation-description {
            color: var(--dark-gray);
            margin-bottom: 15px;
            font-size: 0.95rem;
            line-height: 1.5;
        }

        .accommodation-info {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin-bottom: 15px;
        }

        .info-item {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .info-label {
            font-weight: 600;
            color: var(--dark-gray);
            font-size: 0.9rem;
        }

        .info-value {
            color: var(--maroon-red);
            font-weight: 500;
            font-size: 0.9rem;
        }

        .price-tag {
            font-size: 1.5rem;
            color: var(--maroon-red);
            font-weight: 700;
            text-align: right;
        }

        .price-period {
            font-size: 0.85rem;
            color: var(--dark-gray);
        }

        /* Badges */
        .badge-custom {
            background-color: rgba(45, 90, 39, 0.1);
            color: var(--moroccan-green);
            padding: 4px 10px;
            border-radius: 20px;
            font-weight: 500;
            font-size: 0.8rem;
        }

        /* Résumé de réservation */
        .booking-summary {
            background-color: var(--white);
            border-radius: 10px;
            padding: 20px;
            border: 1px solid var(--medium-gray);
            position: sticky;
            top: 90px;
        }

        .summary-title {
            color: var(--moroccan-green);
            margin-bottom: 15px;
            padding-bottom: 8px;
            border-bottom: 2px solid var(--maroon-red);
            font-size: 1.1rem;
        }

        .summary-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 12px;
            font-size: 0.95rem;
        }

        .summary-label {
            color: var(--dark-gray);
        }

        .summary-value {
            font-weight: 600;
            color: var(--maroon-red);
        }

        .summary-total {
            font-size: 1.2rem;
            font-weight: 700;
            color: var(--moroccan-green);
            border-top: 2px solid var(--medium-gray);
            padding-top: 12px;
            margin-top: 12px;
        }

        /* Message d'information */
        .info-message {
            background-color: rgba(45, 90, 39, 0.1);
            border-left: 4px solid var(--moroccan-green);
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 0.95rem;
        }

        /* Range slider personnalisé */
        .price-range {
            padding: 10px 0;
        }

        .range-values {
            display: flex;
            justify-content: space-between;
            margin-top: 5px;
            font-size: 0.85rem;
            color: var(--dark-gray);
        }

        /* Étoiles de notation */
        .rating-filter {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .rating-option {
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
        }

        .rating-option input[type="checkbox"] {
            margin: 0;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .accommodation-title {
                font-size: 2rem;
            }

            .accommodation-hero {
                padding: 60px 0 30px;
            }

            .accommodation-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }

            .price-tag {
                text-align: left;
            }

            .accommodation-info {
                flex-direction: column;
                gap: 12px;
            }

            .filters-section .row > div {
                margin-bottom: 15px;
            }
        }

        @media (max-width: 480px) {
            .accommodation-title {
                font-size: 1.8rem;
            }

            .accommodation-hero {
                padding: 50px 0 25px;
            }
        }

        /* Animation pour les cartes */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .accommodation-card {
            animation: fadeIn 0.5s ease-out;
        }
    </style>

    <!-- Hero Section Hébergement -->
    <section class="accommodation-hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <h1 class="accommodation-title">Trouvez l'hébergement parfait au Maroc</h1>
                    <p class="lead">Hôtels, riads, maisons d'hôtes - Découvrez les meilleures adresses pour votre séjour</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Barre de filtres -->
    <section class="filters-section">
        <div class="container">
            <h3 class="mb-4" style="color: var(--moroccan-green);">Filtrer les hébergements</h3>
            
            <div class="row">
                <!-- Ville -->
                <div class="col-md-4 mb-3">
                    <div class="filter-card">
                        <div class="filter-title">Destination</div>
                        <select class="form-select" id="filter-ville">
                            <option value="all" selected>Toutes les villes</option>
                            <option value="marrakech">Marrakech</option>
                            <option value="fes">Fès</option>
                            <option value="casablanca">Casablanca</option>
                            <option value="rabat">Rabat</option>
                            <option value="agadir">Agadir</option>
                            <option value="tanger">Tanger</option>
                            <option value="chefchaouen">Chefchaouen</option>
                            <option value="essaouira">Essaouira</option>
                        </select>
                    </div>
                </div>

                <!-- Type d'hébergement -->
                <div class="col-md-4 mb-3">
                    <div class="filter-card">
                        <div class="filter-title">Type d'hébergement</div>
                        <select class="form-select" id="filter-type">
                            <option value="all" selected>Tous les types</option>
                            <option value="hotel">Hôtel</option>
                            <option value="riad">Riad</option>
                            <option value="maison_hote">Maison d'hôtes</option>
                            <option value="villa">Villa</option>
                            <option value="appartement">Appartement</option>
                            <option value="auberge">Auberge</option>
                        </select>
                    </div>
                </div>

                <!-- Prix par nuit -->
                <div class="col-md-4 mb-3">
                    <div class="filter-card">
                        <div class="filter-title">Prix par nuit</div>
                        <input type="range" class="form-range" id="price-range" min="100" max="5000" step="100" value="5000">
                        <div class="range-values">
                            <span>100 DH</span>
                            <span id="price-range-value">5000 DH</span>
                        </div>
                    </div>
                </div>

                <!-- Dates de séjour -->
                <div class="col-md-6 mb-3">
                    <div class="filter-card">
                        <div class="filter-title">Dates de séjour</div>
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <label for="checkin-date" class="form-label">Arrivée</label>
                                <input type="date" class="form-control" id="checkin-date">
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="checkout-date" class="form-label">Départ</label>
                                <input type="date" class="form-control" id="checkout-date">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Nombre de voyageurs -->
                <div class="col-md-3 mb-3">
                    <div class="filter-card">
                        <div class="filter-title">Voyageurs</div>
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <label for="adults" class="form-label">Adultes</label>
                                <select class="form-select" id="adults">
                                    <option value="1">1</option>
                                    <option value="2" selected>2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5+</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="children" class="form-label">Enfants</label>
                                <select class="form-select" id="children">
                                    <option value="0" selected>0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Notation -->
                <div class="col-md-3 mb-3">
                    <div class="filter-card">
                        <div class="filter-title">Notation minimum</div>
                        <div class="rating-filter">
                            <div class="rating-option">
                                <input type="checkbox" id="rating-5" value="5">
                                <label for="rating-5">
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <span>5 étoiles</span>
                                </label>
                            </div>
                            <div class="rating-option">
                                <input type="checkbox" id="rating-4" value="4" checked>
                                <label for="rating-4">
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="far fa-star text-warning"></i>
                                    <span>4+ étoiles</span>
                                </label>
                            </div>
                            <div class="rating-option">
                                <input type="checkbox" id="rating-3" value="3">
                                <label for="rating-3">
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="far fa-star text-warning"></i>
                                    <i class="far fa-star text-warning"></i>
                                    <span>3+ étoiles</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Bouton de recherche -->
                <div class="col-12">
                    <div class="d-flex justify-content-between">
                        <button class="btn btn-outline-custom" id="reset-filters">
                            <i class="fas fa-redo me-2"></i> Réinitialiser les filtres
                        </button>
                        <button class="btn btn-custom" id="apply-filters">
                            <i class="fas fa-search me-2"></i> Appliquer les filtres
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contenu principal -->
    <div class="container">
        <div class="row">
            <!-- Liste des hébergements -->
            <div class="col-lg-8">
                <!-- Message d'information -->
                <div class="info-message">
                    <i class="fas fa-info-circle me-2" style="color: var(--moroccan-green);"></i>
                    <span id="filter-info">6 hébergements trouvés. Utilisez les filtres pour affiner votre recherche.</span>
                </div>

                <!-- Section des hébergements disponibles -->
                <section class="accommodations-section">
                    <h3 class="mb-4" style="color: var(--moroccan-green);">Hébergements disponibles</h3>
                    <!-- Hébergement 2 - Hôtel 5 étoiles -->
                    <div class="accommodation-card" data-accommodation-id="2" data-type="hotel" data-ville="casablanca" data-price="1800" data-rating="4.9">
                        <div class="accommodation-image">
                            <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80" alt="Hôtel Royal Casablanca">
                            <div class="accommodation-type-badge">Hôtel 5★</div>
                        </div>
                        <div class="accommodation-content">
                            <div class="accommodation-header">
                                <div>
                                    <h4 class="accommodation-name">Hôtel Royal Casablanca</h4>
                                    <div class="accommodation-rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <span class="ms-2">4.9/5 (512 avis)</span>
                                    </div>
                                </div>
                                <div class="price-tag">
                                    1 800 <span class="price-period">DH/nuit</span>
                                </div>
                            </div>

                            <p class="accommodation-description">
                                Hôtel de luxe 5 étoiles avec vue sur l'océan Atlantique. Centre d'affaires complet, 
                                restaurants gastronomiques, spa wellness et suites avec balcon privé.
                            </p>

                            <div class="accommodation-info">
                                <div class="info-item">
                                    <i class="fas fa-map-marker-alt" style="color: var(--moroccan-green);"></i>
                                    <div>
                                        <div class="info-label">Ville</div>
                                        <div class="info-value">Casablanca - Corniche</div>
                                    </div>
                                </div>

                                <div class="info-item">
                                    <i class="fas fa-bed" style="color: var(--moroccan-green);"></i>
                                    <div>
                                        <div class="info-label">Chambres</div>
                                        <div class="info-value">120 chambres</div>
                                    </div>
                                </div>

                                <div class="info-item">
                                    <i class="fas fa-wifi" style="color: var(--moroccan-green);"></i>
                                    <div>
                                        <div class="info-label">Équipements</div>
                                        <div class="info-value">WiFi, Gym, Business</div>
                                    </div>
                                </div>

                                <div class="info-item">
                                    <i class="fab fa-whatsapp" style="color: var(--moroccan-green);"></i>
                                    <div>
                                        <div class="info-label">Contact</div>
                                        <div class="info-value">+212 5XX XX XX XX</div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <span class="badge-custom"><i class="fas fa-concierge-bell"></i> Service 24/7</span>
                                    <span class="badge-custom ms-2"><i class="fas fa-dumbbell"></i> Fitness</span>
                                    <span class="badge-custom ms-2"><i class="fas fa-glass-cheers"></i> Bar</span>
                                </div>
                                <button class="btn btn-custom btn-sm select-accommodation" data-accommodation-id="2">
                                    Sélectionner
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Hébergement 3 - Maison d'hôtes -->
                    <div class="accommodation-card" data-accommodation-id="3" data-type="maison_hote" data-ville="fes" data-price="650" data-rating="4.5">
                        <div class="accommodation-image">
                            <img src="https://images.unsplash.com/photo-1584132967334-10e028bd69f7?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80" alt="Dar Fès Authentique">
                            <div class="accommodation-type-badge">Maison d'hôtes</div>
                        </div>
                        <div class="accommodation-content">
                            <div class="accommodation-header">
                                <div>
                                    <h4 class="accommodation-name">Dar Fès Authentique</h4>
                                    <div class="accommodation-rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <span class="ms-2">4.5/5 (189 avis)</span>
                                    </div>
                                </div>
                                <div class="price-tag">
                                    650 <span class="price-period">DH/nuit</span>
                                </div>
                            </div>

                            <p class="accommodation-description">
                                Maison d'hôtes traditionnelle dans la médina de Fès. Accueil chaleureux, décoration 
                                artisanale, cours de cuisine marocaine et visites guidées personnalisées.
                            </p>

                            <div class="accommodation-info">
                                <div class="info-item">
                                    <i class="fas fa-map-marker-alt" style="color: var(--moroccan-green);"></i>
                                    <div>
                                        <div class="info-label">Ville</div>
                                        <div class="info-value">Fès - Médina</div>
                                    </div>
                                </div>

                                <div class="info-item">
                                    <i class="fas fa-bed" style="color: var(--moroccan-green);"></i>
                                    <div>
                                        <div class="info-label">Chambres</div>
                                        <div class="info-value">5 chambres</div>
                                    </div>
                                </div>

                                <div class="info-item">
                                    <i class="fas fa-wifi" style="color: var(--moroccan-green);"></i>
                                    <div>
                                        <div class="info-label">Équipements</div>
                                        <div class="info-value">WiFi, Terrasse</div>
                                    </div>
                                </div>

                                <div class="info-item">
                                    <i class="fab fa-whatsapp" style="color: var(--moroccan-green);"></i>
                                    <div>
                                        <div class="info-label">Contact</div>
                                        <div class="info-value">+212 6XX XX XX XX</div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <span class="badge-custom"><i class="fas fa-home"></i> Familial</span>
                                    <span class="badge-custom ms-2"><i class="fas fa-utensils"></i> Cuisine maison</span>
                                    <span class="badge-custom ms-2"><i class="fas fa-hands-helping"></i> Guide local</span>
                                </div>
                                <button class="btn btn-custom btn-sm select-accommodation" data-accommodation-id="3">
                                    Sélectionner
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Hébergement 4 - Villa de luxe -->
                    <div class="accommodation-card" data-accommodation-id="4" data-type="villa" data-ville="agadir" data-price="3200" data-rating="4.7">
                        <div class="accommodation-image">
                            <img src="https://images.unsplash.com/photo-1613977257363-707ba9348227?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80" alt="Villa Océane Agadir">
                            <div class="accommodation-type-badge">Villa</div>
                        </div>
                        <div class="accommodation-content">
                            <div class="accommodation-header">
                                <div>
                                    <h4 class="accommodation-name">Villa Océane Agadir</h4>
                                    <div class="accommodation-rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <span class="ms-2">4.7/5 (94 avis)</span>
                                    </div>
                                </div>
                                <div class="price-tag">
                                    3 200 <span class="price-period">DH/nuit</span>
                                </div>
                            </div>

                            <p class="accommodation-description">
                                Villa privée avec piscine à débordement face à la mer. 4 chambres avec salle de bain 
                                privée, jardin tropical, service de chef à domicile et accès direct à la plage.
                            </p>

                            <div class="accommodation-info">
                                <div class="info-item">
                                    <i class="fas fa-map-marker-alt" style="color: var(--moroccan-green);"></i>
                                    <div>
                                        <div class="info-label">Ville</div>
                                        <div class="info-value">Agadir - Taghazout</div>
                                    </div>
                                </div>

                                <div class="info-item">
                                    <i class="fas fa-bed" style="color: var(--moroccan-green);"></i>
                                    <div>
                                        <div class="info-label">Chambres</div>
                                        <div class="info-value">4 chambres</div>
                                    </div>
                                </div>

                                <div class="info-item">
                                    <i class="fas fa-wifi" style="color: var(--moroccan-green);"></i>
                                    <div>
                                        <div class="info-label">Équipements</div>
                                        <div class="info-value">Piscine, Jardin, Plage</div>
                                    </div>
                                </div>

                                <div class="info-item">
                                    <i class="fab fa-whatsapp" style="color: var(--moroccan-green);"></i>
                                    <div>
                                        <div class="info-label">Contact</div>
                                        <div class="info-value">+212 6XX XX XX XX</div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <span class="badge-custom"><i class="fas fa-swimming-pool"></i> Piscine privée</span>
                                    <span class="badge-custom ms-2"><i class="fas fa-umbrella-beach"></i> Plage privée</span>
                                    <span class="badge-custom ms-2"><i class="fas fa-car"></i> Parking</span>
                                </div>
                                <button class="btn btn-custom btn-sm select-accommodation" data-accommodation-id="4">
                                    Sélectionner
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Hébergement 5 - Appartement -->
                    <div class="accommodation-card" data-accommodation-id="5" data-type="appartement" data-ville="tanger" data-price="450" data-rating="4.2">
                        <div class="accommodation-image">
                            <img src="https://images.unsplash.com/photo-1512918728675-ed5a9ecdebfd?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80" alt="Appartement Vue Mer Tanger">
                            <div class="accommodation-type-badge">Appartement</div>
                        </div>
                        <div class="accommodation-content">
                            <div class="accommodation-header">
                                <div>
                                    <h4 class="accommodation-name">Appartement Vue Mer Tanger</h4>
                                    <div class="accommodation-rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <span class="ms-2">4.2/5 (76 avis)</span>
                                    </div>
                                </div>
                                <div class="price-tag">
                                    450 <span class="price-period">DH/nuit</span>
                                </div>
                            </div>

                            <p class="accommodation-description">
                                Appartement moderne entièrement équipé avec vue panoramique sur le détroit de Gibraltar. 
                                Idéal pour les voyageurs en solo ou les couples. Centre-ville à 10 minutes à pied.
                            </p>

                            <div class="accommodation-info">
                                <div class="info-item">
                                    <i class="fas fa-map-marker-alt" style="color: var(--moroccan-green);"></i>
                                    <div>
                                        <div class="info-label">Ville</div>
                                        <div class="info-value">Tanger - Centre</div>
                                    </div>
                                </div>

                                <div class="info-item">
                                    <i class="fas fa-bed" style="color: var(--moroccan-green);"></i>
                                    <div>
                                        <div class="info-label">Chambres</div>
                                        <div class="info-value">Studio</div>
                                    </div>
                                </div>

                                <div class="info-item">
                                    <i class="fas fa-wifi" style="color: var(--moroccan-green);"></i>
                                    <div>
                                        <div class="info-label">Équipements</div>
                                        <div class="info-value">Cuisine, WiFi, TV</div>
                                    </div>
                                </div>

                                <div class="info-item">
                                    <i class="fab fa-whatsapp" style="color: var(--moroccan-green);"></i>
                                    <div>
                                        <div class="info-label">Contact</div>
                                        <div class="info-value">+212 6XX XX XX XX</div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <span class="badge-custom"><i class="fas fa-utensils"></i> Cuisine équipée</span>
                                    <span class="badge-custom ms-2"><i class="fas fa-tv"></i> Netflix</span>
                                    <span class="badge-custom ms-2"><i class="fas fa-walking"></i> Centre-ville</span>
                                </div>
                                <button class="btn btn-custom btn-sm select-accommodation" data-accommodation-id="5">
                                    Sélectionner
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Hébergement 6 - Auberge -->
                    <div class="accommodation-card" data-accommodation-id="6" data-type="auberge" data-ville="chefchaouen" data-price="350" data-rating="4.6">
                        <div class="accommodation-image">
                            <img src="https://images.unsplash.com/photo-1551632811-561732d1e306?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80" alt="Auberge Bleue Chefchaouen">
                            <div class="accommodation-type-badge">Auberge</div>
                        </div>
                        <div class="accommodation-content">
                            <div class="accommodation-header">
                                <div>
                                    <h4 class="accommodation-name">Auberge Bleue Chefchaouen</h4>
                                    <div class="accommodation-rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <span class="ms-2">4.6/5 (203 avis)</span>
                                    </div>
                                </div>
                                <div class="price-tag">
                                    350 <span class="price-period">DH/nuit</span>
                                </div>
                            </div>

                            <p class="accommodation-description">
                                Auberge traditionnelle dans la ville bleue de Chefchaouen. Ambiance conviviale, 
                                terrasse avec vue sur les montagnes du Rif, randonnées organisées et cuisine locale.
                            </p>

                            <div class="accommodation-info">
                                <div class="info-item">
                                    <i class="fas fa-map-marker-alt" style="color: var(--moroccan-green);"></i>
                                    <div>
                                        <div class="info-label">Ville</div>
                                        <div class="info-value">Chefchaouen</div>
                                    </div>
                                </div>

                                <div class="info-item">
                                    <i class="fas fa-bed" style="color: var(--moroccan-green);"></i>
                                    <div>
                                        <div class="info-label">Chambres</div>
                                        <div class="info-value">10 chambres</div>
                                    </div>
                                </div>

                                <div class="info-item">
                                    <i class="fas fa-wifi" style="color: var(--moroccan-green);"></i>
                                    <div>
                                        <div class="info-label">Équipements</div>
                                        <div class="info-value">Terrasse, Jardin</div>
                                    </div>
                                </div>

                                <div class="info-item">
                                    <i class="fab fa-whatsapp" style="color: var(--moroccan-green);"></i>
                                    <div>
                                        <div class="info-label">Contact</div>
                                        <div class="info-value">+212 6XX XX XX XX</div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <span class="badge-custom"><i class="fas fa-mountain"></i> Vue montagne</span>
                                    <span class="badge-custom ms-2"><i class="fas fa-hiking"></i> Randonnées</span>
                                    <span class="badge-custom ms-2"><i class="fas fa-users"></i> Convivial</span>
                                </div>
                                <button class="btn btn-custom btn-sm select-accommodation" data-accommodation-id="6">
                                    Sélectionner
                                </button>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <!-- Résumé de réservation -->
            <div class="col-lg-4">
                <div class="booking-summary">
                    <h4 class="summary-title">Résumé de votre réservation</h4>

                    <div class="summary-item">
                        <span class="summary-label">Hébergement</span>
                        <span class="summary-value" id="summary-accommodation">Non sélectionné</span>
                    </div>

                    <div class="summary-item">
                        <span class="summary-label">Ville</span>
                        <span class="summary-value" id="summary-city">-</span>
                    </div>

                    <div class="summary-item">
                        <span class="summary-label">Type</span>
                        <span class="summary-value" id="summary-type">-</span>
                    </div>

                    <div class="summary-item">
                        <span class="summary-label">Dates</span>
                        <span class="summary-value" id="summary-dates">-</span>
                    </div>

                    <div class="summary-item">
                        <span class="summary-label">Voyageurs</span>
                        <span class="summary-value" id="summary-guests">-</span>
                    </div>

                    <div class="summary-item">
                        <span class="summary-label">Nuits</span>
                        <span class="summary-value" id="summary-nights">0</span>
                    </div>

                    <div class="summary-item">
                        <span class="summary-label">Prix par nuit</span>
                        <span class="summary-value" id="summary-price-night">-</span>
                    </div>

                    <div class="summary-item">
                        <span class="summary-label">Frais de service</span>
                        <span class="summary-value">100 DH</span>
                    </div>

                    <div class="summary-item">
                        <span class="summary-label">Taxes</span>
                        <span class="summary-value">50 DH</span>
                    </div>

                    <div class="summary-total">
                        <span>Total:</span>
                        <span id="summary-total">0 DH</span>
                    </div>

                    <div class="mt-4">
                        <button class="btn btn-custom w-100 mb-2" id="confirm-booking" disabled>
                            <i class="fas fa-check-circle me-2"></i> Réserver maintenant
                        </button>
                        <button class="btn btn-outline-custom w-100" id="cancel-booking">
                            <i class="fas fa-times-circle me-2"></i> Annuler
                        </button>
                    </div>

                    <div class="mt-3">
                        <p class="small text-muted">
                            <i class="fas fa-info-circle me-1"></i>
                            Annulation gratuite jusqu'à 48h avant l'arrivée. Paiement sécurisé.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
include "./layaout/footer.php";
?>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Variables globales
            let selectedAccommodation = null;
            let bookingDetails = {
                ville: 'all',
                type: 'all',
                maxPrice: 5000,
                checkinDate: '',
                checkoutDate: '',
                adults: 2,
                children: 0,
                minRating: 4
            };

            // Éléments DOM
            const accommodationCards = document.querySelectorAll('.accommodation-card');
            const selectAccommodationButtons = document.querySelectorAll('.select-accommodation');
            const confirmBookingBtn = document.getElementById('confirm-booking');
            const cancelBookingBtn = document.getElementById('cancel-booking');
            const filterInfo = document.getElementById('filter-info');
            const priceRange = document.getElementById('price-range');
            const priceRangeValue = document.getElementById('price-range-value');
            const resetFiltersBtn = document.getElementById('reset-filters');
            const applyFiltersBtn = document.getElementById('apply-filters');

            // Initialiser l'affichage du prix
            if (priceRangeValue) priceRangeValue.textContent = priceRange.value + ' DH';

            // Mettre à jour l'affichage du prix range
            if (priceRange) {
                priceRange.addEventListener('input', function () {
                    priceRangeValue.textContent = this.value + ' DH';
                    bookingDetails.maxPrice = parseInt(this.value);
                });
            }

            // Filtrer les hébergements
            function filterAccommodations() {
                const villeElement = document.getElementById('filter-ville');
                if (!villeElement) return;

                const ville = villeElement.value;
                const type = document.getElementById('filter-type').value;
                const maxPrice = parseInt(document.getElementById('price-range').value);
                const checkinDate = document.getElementById('checkin-date').value;
                const checkoutDate = document.getElementById('checkout-date').value;
                const adults = parseInt(document.getElementById('adults').value);
                const children = parseInt(document.getElementById('children').value);
                
                // Récupérer la notation minimum
                let minRating = 0;
                const rating5 = document.getElementById('rating-5').checked;
                const rating4 = document.getElementById('rating-4').checked;
                const rating3 = document.getElementById('rating-3').checked;
                
                if (rating5) minRating = 5;
                else if (rating4) minRating = 4;
                else if (rating3) minRating = 3;

                let visibleCount = 0;

                accommodationCards.forEach(card => {
                    const cardVille = card.getAttribute('data-ville');
                    const cardType = card.getAttribute('data-type');
                    const cardPrice = parseInt(card.getAttribute('data-price'));
                    const cardRating = parseFloat(card.getAttribute('data-rating'));

                    let isVisible = true;

                    // Filtre par ville
                    if (ville !== 'all' && cardVille !== ville) {
                        isVisible = false;
                    }

                    // Filtre par type
                    if (type !== 'all' && cardType !== type) {
                        isVisible = false;
                    }

                    // Filtre par prix
                    if (cardPrice > maxPrice) {
                        isVisible = false;
                    }

                    // Filtre par notation
                    if (cardRating < minRating) {
                        isVisible = false;
                    }

                    // Afficher ou masquer la carte
                    card.style.display = isVisible ? 'block' : 'none';
                    if (isVisible) visibleCount++;

                    // Désélectionner si masqué
                    if (selectedAccommodation && !isVisible && selectedAccommodation.id === card.getAttribute('data-accommodation-id')) {
                        deselectAccommodation();
                    }
                });

                // Mettre à jour le message d'information
                if (filterInfo) filterInfo.textContent = `${visibleCount} hébergement(s) trouvé(s).`;

                // Mettre à jour les détails de filtrage
                bookingDetails = {
                    ville: ville,
                    type: type,
                    maxPrice: maxPrice,
                    checkinDate: checkinDate,
                    checkoutDate: checkoutDate,
                    adults: adults,
                    children: children,
                    minRating: minRating
                };
            }

            // Initialiser les filtres
            filterAccommodations();

            // Appliquer les filtres
            if (applyFiltersBtn) applyFiltersBtn.addEventListener('click', filterAccommodations);

            // Réinitialiser les filtres
            if (resetFiltersBtn) {
                resetFiltersBtn.addEventListener('click', function () {
                    document.getElementById('filter-ville').value = 'all';
                    document.getElementById('filter-type').value = 'all';
                    document.getElementById('price-range').value = '5000';
                    document.getElementById('checkin-date').value = '';
                    document.getElementById('checkout-date').value = '';
                    document.getElementById('adults').value = '2';
                    document.getElementById('children').value = '0';
                    document.getElementById('rating-5').checked = false;
                    document.getElementById('rating-4').checked = true;
                    document.getElementById('rating-3').checked = false;
                    
                    priceRangeValue.textContent = '5000 DH';
                    filterAccommodations();
                });
            }

            // Désélectionner un hébergement
            function deselectAccommodation() {
                accommodationCards.forEach(card => {
                    card.classList.remove('selected');
                });

                document.getElementById('summary-accommodation').textContent = 'Non sélectionné';
                document.getElementById('summary-city').textContent = '-';
                document.getElementById('summary-type').textContent = '-';
                document.getElementById('summary-price-night').textContent = '-';
                document.getElementById('summary-total').textContent = '0 DH';

                selectedAccommodation = null;
                confirmBookingBtn.disabled = true;
            }

            // Réinitialiser tous les champs
            function resetAllFields() {
                // Réinitialiser le résumé
                document.getElementById('summary-dates').textContent = '-';
                document.getElementById('summary-guests').textContent = '-';
                document.getElementById('summary-nights').textContent = '0';

                // Désélectionner l'hébergement
                deselectAccommodation();

                alert('Réservation annulée. Les dates et voyageurs ont été réinitialisés.');
            }

            // Gestion de la sélection des hébergements
            selectAccommodationButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const accommodationId = this.getAttribute('data-accommodation-id');
                    selectAccommodation(accommodationId);
                });
            });

            // Sélectionner un hébergement
            function selectAccommodation(accommodationId) {
                // Retirer la sélection précédente
                deselectAccommodation();

                // Ajouter la sélection actuelle
                const selectedCard = document.querySelector(`.accommodation-card[data-accommodation-id="${accommodationId}"]`);
                selectedCard.classList.add('selected');

                // Récupérer les informations de l'hébergement
                const accommodationName = selectedCard.querySelector('.accommodation-name').textContent;
                const accommodationPrice = selectedCard.querySelector('.price-tag').textContent;
                const accommodationVille = selectedCard.getAttribute('data-ville');
                const accommodationType = selectedCard.getAttribute('data-type');
                const accommodationRating = parseFloat(selectedCard.getAttribute('data-rating'));

                // Formater le type pour l'affichage
                const typeNames = {
                    'hotel': 'Hôtel',
                    'riad': 'Riad',
                    'maison_hote': 'Maison d\'hôtes',
                    'villa': 'Villa',
                    'appartement': 'Appartement',
                    'auberge': 'Auberge'
                };

                const typeName = typeNames[accommodationType] || accommodationType;

                // Mettre à jour le résumé
                document.getElementById('summary-accommodation').textContent = accommodationName;
                document.getElementById('summary-city').textContent = accommodationVille.charAt(0).toUpperCase() + accommodationVille.slice(1);
                document.getElementById('summary-type').textContent = typeName;
                document.getElementById('summary-price-night').textContent = accommodationPrice;

                // Extraire le prix numérique
                const priceMatch = accommodationPrice.match(/([\d\s]+)/);
                const pricePerNight = priceMatch ? parseInt(priceMatch[1].replace(/\s/g, '')) : 0;

                // Mettre à jour l'hébergement sélectionné
                selectedAccommodation = {
                    id: accommodationId,
                    name: accommodationName,
                    pricePerNight: pricePerNight,
                    ville: accommodationVille,
                    type: accommodationType,
                    rating: accommodationRating
                };

                // Activer le bouton de confirmation si les dates sont sélectionnées
                updateBookingSummary();
            }

            // Mettre à jour le résumé de réservation
            function updateBookingSummary() {
                if (!selectedAccommodation) return;

                const checkinDate = document.getElementById('checkin-date').value;
                const checkoutDate = document.getElementById('checkout-date').value;
                const adults = parseInt(document.getElementById('adults').value);
                const children = parseInt(document.getElementById('children').value);

                let canConfirm = true;

                // Mettre à jour les dates
                if (checkinDate && checkoutDate) {
                    const checkin = new Date(checkinDate);
                    const checkout = new Date(checkoutDate);
                    const nights = Math.ceil((checkout - checkin) / (1000 * 60 * 60 * 24));
                    
                    if (nights > 0) {
                        document.getElementById('summary-dates').textContent = `${checkinDate} au ${checkoutDate}`;
                        document.getElementById('summary-nights').textContent = nights;
                        
                        // Mettre à jour les voyageurs
                        let guestsText = `${adults} adulte${adults > 1 ? 's' : ''}`;
                        if (children > 0) {
                            guestsText += `, ${children} enfant${children > 1 ? 's' : ''}`;
                        }
                        document.getElementById('summary-guests').textContent = guestsText;

                        // Calculer le total
                        const serviceFee = 100;
                        const taxes = 50;
                        const total = (selectedAccommodation.pricePerNight * nights) + serviceFee + taxes;
                        document.getElementById('summary-total').textContent = total + ' DH';

                        // Activer le bouton de confirmation
                        confirmBookingBtn.disabled = false;
                    } else {
                        document.getElementById('summary-dates').textContent = 'Dates invalides';
                        canConfirm = false;
                    }
                } else {
                    document.getElementById('summary-dates').textContent = '-';
                    document.getElementById('summary-guests').textContent = '-';
                    canConfirm = false;
                }

                confirmBookingBtn.disabled = !canConfirm;
            }

            // Écouter les changements sur les champs de dates et voyageurs
            const bookingInputs = ['checkin-date', 'checkout-date', 'adults', 'children'];
            bookingInputs.forEach(inputId => {
                const input = document.getElementById(inputId);
                if (input) {
                    input.addEventListener('change', updateBookingSummary);
                }
            });

            // Annulation de réservation
            if (cancelBookingBtn) {
                cancelBookingBtn.addEventListener('click', function () {
                    if (confirm('Voulez-vous vraiment annuler la réservation ?')) {
                        resetAllFields();
                    }
                });
            }

            // Confirmation de réservation
            if (confirmBookingBtn) {
                confirmBookingBtn.addEventListener('click', function () {
                    if (!selectedAccommodation) {
                        alert('Veuillez sélectionner un hébergement');
                        return;
                    }

                    const checkinDate = document.getElementById('checkin-date').value;
                    const checkoutDate = document.getElementById('checkout-date').value;
                    const adults = parseInt(document.getElementById('adults').value);
                    const children = parseInt(document.getElementById('children').value);

                    if (!checkinDate || !checkoutDate) {
                        alert('Veuillez sélectionner les dates de séjour');
                        return;
                    }

                    const checkin = new Date(checkinDate);
                    const checkout = new Date(checkoutDate);
                    const nights = Math.ceil((checkout - checkin) / (1000 * 60 * 60 * 24));

                    if (nights <= 0) {
                        alert('Les dates de séjour sont invalides');
                        return;
                    }

                    // Simulation de confirmation
                    const total = document.getElementById('summary-total').textContent;
                    const typeNames = {
                        'hotel': 'Hôtel',
                        'riad': 'Riad',
                        'maison_hote': 'Maison d\'hôtes',
                        'villa': 'Villa',
                        'appartement': 'Appartement',
                        'auberge': 'Auberge'
                    };

                    const typeName = typeNames[selectedAccommodation.type] || selectedAccommodation.type;

                    const confirmationMessage = `
                        🎉 Réservation confirmée !
                        
                        Détails de votre réservation :
                        • Hébergement : ${selectedAccommodation.name}
                        • Type : ${typeName}
                        • Ville : ${selectedAccommodation.ville.charAt(0).toUpperCase() + selectedAccommodation.ville.slice(1)}
                        • Notation : ${selectedAccommodation.rating}/5
                        • Dates : ${checkinDate} au ${checkoutDate} (${nights} nuit${nights > 1 ? 's' : ''})
                        • Voyageurs : ${adults} adulte${adults > 1 ? 's' : ''}${children > 0 ? `, ${children} enfant${children > 1 ? 's' : ''}` : ''}
                        • Prix par nuit : ${selectedAccommodation.pricePerNight} DH
                        • Total : ${total}
                        
                        Un email de confirmation vous a été envoyé avec les détails de paiement.
                        Merci d'avoir choisi GuideAgent !
                    `;

                    alert(confirmationMessage);
                });
            }

            // Initialiser la date minimale (aujourd'hui)
            const today = new Date().toISOString().split('T')[0];
            const checkinInput = document.getElementById('checkin-date');
            const checkoutInput = document.getElementById('checkout-date');
            
            if (checkinInput) {
                checkinInput.min = today;
                checkinInput.addEventListener('change', function () {
                    if (checkoutInput) checkoutInput.min = this.value;
                });
            }
            if (checkoutInput) checkoutInput.min = today;
        });
    </script>
