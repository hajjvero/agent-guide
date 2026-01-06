<?php
include __DIR__ . '/../../template/layaout/header.php';
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

        body {
            font-family: 'Poppins', sans-serif;
            color: var(--dark-gray);
            background-color: var(--light-gray);
        }

        h1,
        h2,
        h3,
        h4,
        h5 {
            font-family: 'Playfair Display', serif;
            font-weight: 600;
        }

        /* Navbar personnalisée */
        .navbar-custom {
            background-color: var(--white);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            padding: 12px 0;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 24px;
            color: var(--maroon-red) !important;
        }

        .navbar-brand span {
            color: var(--moroccan-green);
        }

        .btn-custom {
            background-color: var(--maroon-red);
            color: var(--white);
            border-radius: 30px;
            padding: 8px 20px;
            font-weight: 500;
            border: none;
            transition: all 0.3s ease;
        }

        .btn-custom:hover {
            background-color: #7a1a38;
            color: var(--white);
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(139, 30, 63, 0.2);
        }

        .btn-outline-custom {
            background-color: transparent;
            color: var(--maroon-red);
            border: 2px solid var(--maroon-red);
            border-radius: 30px;
            padding: 8px 20px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-outline-custom:hover {
            background-color: var(--maroon-red);
            color: var(--white);
        }

        /* Hero Section Booking */
        .booking-hero {
            background: linear-gradient(135deg,
                    rgba(139, 30, 63, 1) 0%,
                    rgba(165, 42, 78, 1) 50%,
                    rgba(139, 30, 63, 1) 100%);
            color: var(--white);
            padding: 80px 0 40px;
            margin-bottom: 30px;
            box-shadow: inset 0 0 80px rgba(0, 0, 0, 0.2);
        }

        .booking-title {
            font-size: 2.5rem;
            margin-bottom: 15px;
        }

        /* Type de service */
        .service-type-section {
            padding: 30px 0;
        }

        .service-card {
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            border: 2px solid var(--medium-gray);
            background-color: var(--white);
            height: 100%;
        }

        .service-card:hover {
            border-color: var(--maroon-red);
            transform: translateY(-3px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
        }

        .service-card.selected {
            border-color: var(--maroon-red);
            background-color: rgba(139, 30, 63, 0.05);
        }

        .service-icon {
            width: 60px;
            height: 60px;
            background-color: rgba(139, 30, 63, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            color: var(--maroon-red);
            font-size: 24px;
        }

        /* Formulaire de réservation */
        .booking-form-section {
            padding: 30px 0;
        }

        .booking-form {
            background-color: var(--white);
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        }

        .form-label {
            font-weight: 600;
            color: var(--moroccan-green);
            margin-bottom: 8px;
        }

        .form-control,
        .form-select {
            border-radius: 8px;
            padding: 10px 12px;
            border: 1px solid var(--medium-gray);
            transition: all 0.3s;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--maroon-red);
            box-shadow: 0 0 0 0.25rem rgba(139, 30, 63, 0.25);
        }

        /* Section des chauffeurs disponibles */
        .drivers-section {
            padding: 30px 0;
        }

        .driver-card {
            background-color: var(--white);
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            border: 1px solid var(--medium-gray);
            transition: all 0.3s ease;
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.05);
        }

        .driver-card:hover {
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            transform: translateY(-2px);
        }

        .driver-card.selected {
            border-color: var(--maroon-red);
            border-width: 2px;
            background-color: rgba(139, 30, 63, 0.03);
        }

        .driver-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .driver-name {
            font-size: 1.2rem;
            color: var(--moroccan-green);
            margin-bottom: 5px;
        }

        .driver-rating {
            color: var(--gold);
            font-weight: 600;
            font-size: 0.9rem;
        }

        .driver-info {
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
            font-size: 1.3rem;
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

        .badge-taxi {
            background-color: rgba(41, 128, 185, 0.1);
            color: #2980b9;
        }

        .badge-private {
            background-color: rgba(139, 30, 63, 0.1);
            color: var(--maroon-red);
        }

        /* Résumé de réservation */
        .booking-summary {
            background-color: var(--white);
            border-radius: 10px;
            padding: 20px;
            border: 1px solid var(--medium-gray);
            position: sticky;
            top: 15px;
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

        /* Footer */
        .footer {
            background-color: var(--moroccan-green);
            color: var(--white);
            padding: 50px 0 20px;
            margin-top: 60px;
        }

        .copyright {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 25px;
            margin-top: 40px;
            text-align: center;
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.9rem;
        }

        /* Heure de départ personnalisée */
        .time-input-group {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .time-input {
            flex: 1;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .booking-title {
                font-size: 2rem;
            }

            .booking-hero {
                padding: 60px 0 30px;
            }

            .driver-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 8px;
            }

            .price-tag {
                text-align: left;
            }

            .driver-info {
                flex-direction: column;
                gap: 12px;
            }

            .service-card {
                padding: 15px;
            }

            .service-icon {
                width: 50px;
                height: 50px;
                font-size: 20px;
            }

            .time-input-group {
                flex-direction: column;
            }
        }

        @media (max-width: 480px) {
            .booking-title {
                font-size: 1.8rem;
            }

            .booking-hero {
                padding: 50px 0 25px;
            }
        }
    </style>

    <!-- Hero Section Booking -->
    <section class="booking-hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <h1 class="booking-title">Réservez votre chauffeur au Maroc</h1>
                    <p class="lead">Taxi ou chauffeur privé - Parcourez le Maroc en toute sérénité avec nos conducteurs
                        certifiés</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Type de service -->
    <section class="service-type-section">
        <div class="container">
            <h2 class="text-center mb-4" style="color: var(--moroccan-green);">Choisissez votre type de service</h2>

            <div class="row justify-content-center">
                <div class="col-md-5 mb-3">
                    <div class="service-card" id="taxi-service">
                        <div class="service-icon">
                            <i class="fas fa-taxi"></i>
                        </div>
                        <h3>Taxi</h3>
                        <p>Service de taxi traditionnel pour vos déplacements en ville. Parfait pour les trajets courts
                            et moyens.</p>
                        <div class="mt-2">
                            <span class="badge-custom badge-taxi">Disponible immédiatement</span>
                        </div>
                    </div>
                </div>

                <div class="col-md-5 mb-3">
                    <div class="service-card selected" id="private-driver">
                        <div class="service-icon">
                            <i class="fas fa-car"></i>
                        </div>
                        <h3>Chauffeur Privé</h3>
                        <p>Service avec chauffeur dédié pour vos excursions, voyages longue distance ou visites
                            touristiques.</p>
                        <div class="mt-2">
                            <span class="badge-custom badge-private">Voiture privée</span>
                            <span class="badge-custom badge-private ms-2">Flexible</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Formulaire de réservation et résultats -->
    <div class="container">
        <div class="row">
            <!-- Formulaire et liste des chauffeurs -->
            <div class="col-lg-8">
                <!-- Formulaire de recherche -->
                <section class="booking-form-section">
                    <div class="booking-form">
                        <h3 class="mb-3" style="color: var(--moroccan-green);">Détails de votre réservation</h3>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="ville" class="form-label">Ville</label>
                                <select class="form-select" id="ville">
                                    <option selected>Sélectionnez une ville</option>
                                    <option value="marrakech">Marrakech</option>
                                    <option value="fes">Fès</option>
                                    <option value="casablanca">Casablanca</option>
                                    <option value="rabat">Rabat</option>
                                    <option value="agadir">Agadir</option>
                                    <option value="tanger">Tanger</option>
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="date" class="form-label">Date de prise en charge</label>
                                <input type="date" class="form-control" id="date">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="departure-time" class="form-label">Heure de départ</label>
                                <div class="time-input-group">
                                    <select class="form-select time-input" id="departure-hour">
                                        <option value="08">08</option>
                                        <option value="09">09</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        <option value="13">13</option>
                                        <option value="14">14</option>
                                        <option value="15">15</option>
                                        <option value="16">16</option>
                                        <option value="17">17</option>
                                        <option value="18">18</option>
                                        <option value="19">19</option>
                                        <option value="20">20</option>
                                    </select>
                                    <span>:</span>
                                    <select class="form-select time-input" id="departure-minute">
                                        <option value="00">00</option>
                                        <option value="15">15</option>
                                        <option value="30">30</option>
                                        <option value="45">45</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="duration-hours" class="form-label">Durée (heures)</label>
                                <select class="form-select" id="duration-hours">
                                    <option value="1">1 heure</option>
                                    <option value="2">2 heures</option>
                                    <option value="3">3 heures</option>
                                    <option value="4">4 heures</option>
                                    <option value="5">5 heures</option>
                                    <option value="6">6 heures</option>
                                    <option value="8">8 heures</option>
                                    <option value="10">10 heures</option>
                                    <option value="12">12 heures</option>
                                    <option value="24">24 heures (journée complète)</option>
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="vehicle-type" class="form-label">Type de véhicule</label>
                                <select class="form-select" id="vehicle-type">
                                    <option selected>Tous types</option>
                                    <option value="berline">Berline</option>
                                    <option value="suv">SUV / 4x4</option>
                                    <option value="van">Van / Minibus</option>
                                    <option value="luxe">Véhicule de luxe</option>
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="passengers" class="form-label">Nombre de passagers</label>
                                <select class="form-select" id="passengers">
                                    <option value="1">1 passager</option>
                                    <option value="2">2 passagers</option>
                                    <option value="3">3 passagers</option>
                                    <option value="4">4 passagers</option>
                                    <option value="5">5 passagers</option>
                                    <option value="6">6+ passagers</option>
                                </select>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="special-request" class="form-label">Demandes spéciales (optionnel)</label>
                                <textarea class="form-control" id="special-request" rows="2"
                                    placeholder="Siège bébé, guide parlant anglais, arrêts spécifiques..."></textarea>
                            </div>

                            <div class="col-12">
                                <button class="btn btn-custom w-100" id="search-drivers">
                                    <i class="fas fa-search me-2"></i> Rechercher des chauffeurs
                                </button>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Message d'information -->
                <div class="info-message">
                    <i class="fas fa-info-circle me-2" style="color: var(--moroccan-green);"></i>
                    <span id="filter-info">Affichage des chauffeurs privés. Cliquez sur "Taxi" pour voir les services de
                        taxi disponibles.</span>
                </div>

                <!-- Section des chauffeurs disponibles -->
                <section class="drivers-section">
                    <h3 class="mb-3" style="color: var(--moroccan-green);">Chauffeurs disponibles</h3>

                    <!-- Chauffeur 1 - Chauffeur privé uniquement -->
                    <div class="driver-card" data-driver-id="1" data-driver-type="private">
                        <div class="driver-header">
                            <div>
                                <h4 class="driver-name">Ahmed Benali</h4>
                                <div class="driver-rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <span class="ms-2">4.7/5 (124 avis)</span>
                                </div>
                            </div>
                            <div class="price-tag">
                                80 <span class="price-period">DH/heure</span>
                            </div>
                        </div>

                        <div class="driver-info">
                            <div class="info-item">
                                <i class="fas fa-car" style="color: var(--moroccan-green);"></i>
                                <div>
                                    <div class="info-label">Véhicule</div>
                                    <div class="info-value">Toyota Prado (SUV)</div>
                                </div>
                            </div>

                            <div class="info-item">
                                <i class="fas fa-map-marker-alt" style="color: var(--moroccan-green);"></i>
                                <div>
                                    <div class="info-label">Ville</div>
                                    <div class="info-value">Marrakech</div>
                                </div>
                            </div>

                            <div class="info-item">
                                <i class="fas fa-comments" style="color: var(--moroccan-green);"></i>
                                <div>
                                    <div class="info-label">Langues</div>
                                    <div class="info-value">Français, Arabe, Anglais</div>
                                </div>
                            </div>

                            <div class="info-item">
                                <i class="fas fa-id-badge" style="color: var(--moroccan-green);"></i>
                                <div>
                                    <div class="info-label">Expérience</div>
                                    <div class="info-value">8 ans</div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <span class="badge-custom badge-private">Chauffeur privé uniquement</span>
                                <span class="badge-custom ms-2"><i class="fas fa-wifi"></i> WiFi gratuit</span>
                                <span class="badge-custom ms-2"><i class="fas fa-snowflake"></i> Climatisation</span>
                            </div>
                            <button class="btn btn-custom btn-sm select-driver" data-driver-id="1">
                                Sélectionner
                            </button>
                        </div>
                    </div>

                    <!-- Chauffeur 2 - Taxi & Privé -->
                    <div class="driver-card" data-driver-id="2" data-driver-type="both">
                        <div class="driver-header">
                            <div>
                                <h4 class="driver-name">Karim El Fassi</h4>
                                <div class="driver-rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <span class="ms-2">4.2/5 (89 avis)</span>
                                </div>
                            </div>
                            <div class="price-tag">
                                60 <span class="price-period">DH/heure</span>
                            </div>
                        </div>

                        <div class="driver-info">
                            <div class="info-item">
                                <i class="fas fa-car" style="color: var(--moroccan-green);"></i>
                                <div>
                                    <div class="info-label">Véhicule</div>
                                    <div class="info-value">Mercedes Classe C (Berline)</div>
                                </div>
                            </div>

                            <div class="info-item">
                                <i class="fas fa-map-marker-alt" style="color: var(--moroccan-green);"></i>
                                <div>
                                    <div class="info-label">Ville</div>
                                    <div class="info-value">Casablanca</div>
                                </div>
                            </div>

                            <div class="info-item">
                                <i class="fas fa-comments" style="color: var(--moroccan-green);"></i>
                                <div>
                                    <div class="info-label">Langues</div>
                                    <div class="info-value">Français, Arabe, Espagnol</div>
                                </div>
                            </div>

                            <div class="info-item">
                                <i class="fas fa-id-badge" style="color: var(--moroccan-green);"></i>
                                <div>
                                    <div class="info-label">Expérience</div>
                                    <div class="info-value">5 ans</div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <span class="badge-custom badge-taxi me-2">Service Taxi</span>
                                <span class="badge-custom badge-private">Service Privé</span>
                                <span class="badge-custom ms-2"><i class="fas fa-snowflake"></i> Climatisation</span>
                            </div>
                            <button class="btn btn-custom btn-sm select-driver" data-driver-id="2">
                                Sélectionner
                            </button>
                        </div>
                    </div>

                    <!-- Chauffeur 3 - Chauffeur privé uniquement -->
                    <div class="driver-card" data-driver-id="3" data-driver-type="private">
                        <div class="driver-header">
                            <div>
                                <h4 class="driver-name">Fatima Zahra</h4>
                                <div class="driver-rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <span class="ms-2">5.0/5 (67 avis)</span>
                                </div>
                            </div>
                            <div class="price-tag">
                                120 <span class="price-period">DH/heure</span>
                            </div>
                        </div>

                        <div class="driver-info">
                            <div class="info-item">
                                <i class="fas fa-car" style="color: var(--moroccan-green);"></i>
                                <div>
                                    <div class="info-label">Véhicule</div>
                                    <div class="info-value">Range Rover (Luxe 4x4)</div>
                                </div>
                            </div>

                            <div class="info-item">
                                <i class="fas fa-map-marker-alt" style="color: var(--moroccan-green);"></i>
                                <div>
                                    <div class="info-label">Ville</div>
                                    <div class="info-value">Fès</div>
                                </div>
                            </div>

                            <div class="info-item">
                                <i class="fas fa-comments" style="color: var(--moroccan-green);"></i>
                                <div>
                                    <div class="info-label">Langues</div>
                                    <div class="info-value">Français, Arabe, Anglais, Allemand</div>
                                </div>
                            </div>

                            <div class="info-item">
                                <i class="fas fa-id-badge" style="color: var(--moroccan-green);"></i>
                                <div>
                                    <div class="info-label">Expérience</div>
                                    <div class="info-value">12 ans</div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <span class="badge-custom badge-private">Chauffeur privé uniquement</span>
                                <span class="badge-custom ms-2"><i class="fas fa-wifi"></i> WiFi gratuit</span>
                                <span class="badge-custom ms-2"><i class="fas fa-glass-cheers"></i> Boissons
                                    incluses</span>
                            </div>
                            <button class="btn btn-custom btn-sm select-driver" data-driver-id="3">
                                Sélectionner
                            </button>
                        </div>
                    </div>

                    <!-- Chauffeur 4 - Taxi uniquement -->
                    <div class="driver-card" data-driver-id="4" data-driver-type="taxi">
                        <div class="driver-header">
                            <div>
                                <h4 class="driver-name">Youssef Alami</h4>
                                <div class="driver-rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <span class="ms-2">4.5/5 (203 avis)</span>
                                </div>
                            </div>
                            <div class="price-tag">
                                40 <span class="price-period">DH/heure</span>
                            </div>
                        </div>

                        <div class="driver-info">
                            <div class="info-item">
                                <i class="fas fa-car" style="color: var(--moroccan-green);"></i>
                                <div>
                                    <div class="info-label">Véhicule</div>
                                    <div class="info-value">Peugeot 208 (Compact)</div>
                                </div>
                            </div>

                            <div class="info-item">
                                <i class="fas fa-map-marker-alt" style="color: var(--moroccan-green);"></i>
                                <div>
                                    <div class="info-label">Ville</div>
                                    <div class="info-value">Marrakech</div>
                                </div>
                            </div>

                            <div class="info-item">
                                <i class="fas fa-comments" style="color: var(--moroccan-green);"></i>
                                <div>
                                    <div class="info-label">Langues</div>
                                    <div class="info-value">Français, Arabe</div>
                                </div>
                            </div>

                            <div class="info-item">
                                <i class="fas fa-id-badge" style="color: var(--moroccan-green);"></i>
                                <div>
                                    <div class="info-label">Expérience</div>
                                    <div class="info-value">6 ans</div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <span class="badge-custom badge-taxi">Service Taxi uniquement</span>
                                <span class="badge-custom ms-2"><i class="fas fa-bolt"></i> Disponible 24/7</span>
                            </div>
                            <button class="btn btn-custom btn-sm select-driver" data-driver-id="4">
                                Sélectionner
                            </button>
                        </div>
                    </div>
                </section>
            </div>

            <!-- Résumé de réservation -->
            <div class="col-lg-4">
                <div class="booking-summary">
                    <h4 class="summary-title">Résumé de votre réservation</h4>

                    <div class="summary-item">
                        <span class="summary-label">Type de service</span>
                        <span class="summary-value" id="summary-service-type">Chauffeur privé</span>
                    </div>

                    <div class="summary-item">
                        <span class="summary-label">Ville</span>
                        <span class="summary-value" id="summary-city">-</span>
                    </div>

                    <div class="summary-item">
                        <span class="summary-label">Date</span>
                        <span class="summary-value" id="summary-date">-</span>
                    </div>

                    <div class="summary-item">
                        <span class="summary-label">Heure de départ</span>
                        <span class="summary-value" id="summary-departure-time">-</span>
                    </div>

                    <div class="summary-item">
                        <span class="summary-label">Durée</span>
                        <span class="summary-value" id="summary-duration">-</span>
                    </div>

                    <div class="summary-item">
                        <span class="summary-label">Chauffeur</span>
                        <span class="summary-value" id="summary-driver">Non sélectionné</span>
                    </div>

                    <div class="summary-item">
                        <span class="summary-label">Type de véhicule</span>
                        <span class="summary-value" id="summary-vehicle">-</span>
                    </div>

                    <div class="summary-item">
                        <span class="summary-label">Prix par heure</span>
                        <span class="summary-value" id="summary-price-hour">-</span>
                    </div>

                    <div class="summary-item">
                        <span class="summary-label">Nombre d'heures</span>
                        <span class="summary-value" id="summary-hours">0</span>
                    </div>

                    <div class="summary-item">
                        <span class="summary-label">Frais de service</span>
                        <span class="summary-value">20 DH</span>
                    </div>

                    <div class="summary-total">
                        <span>Total:</span>
                        <span id="summary-total">0 DH</span>
                    </div>

                    <div class="mt-4">
                        <button class="btn btn-custom w-100 mb-2" id="confirm-booking" disabled>
                            <i class="fas fa-check-circle me-2"></i> Confirmer la réservation
                        </button>
                        <button class="btn btn-outline-custom w-100" id="cancel-booking">
                            <i class="fas fa-times-circle me-2"></i> Annuler la réservation
                        </button>
                    </div>

                    <div class="mt-3">
                        <p class="small text-muted">
                            <i class="fas fa-info-circle me-1"></i>
                            Annulation gratuite jusqu'à 2h avant le service. Paiement sécurisé.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include __DIR__ . '/../../template/layaout/footer.php'; ?>