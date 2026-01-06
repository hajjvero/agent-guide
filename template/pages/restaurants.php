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
            background-color: #FFFCF5;
            background-image: 
                radial-gradient(circle at 10% 20%, rgba(139, 30, 63, 0.03) 0%, transparent 20%),
                radial-gradient(circle at 90% 80%, rgba(45, 90, 39, 0.03) 0%, transparent 20%);
        }

        h1,
        h2,
        h3,
        h4,
        h5 {
            font-family: 'Playfair Display', serif;
            font-weight: 600;
        }

        .cursive-text {
            font-family: 'Dancing Script', cursive;
            font-weight: 500;
        }

        /* Navbar personnalisée */
        .navbar-custom {
            background-color: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            padding: 12px 0;
            border-bottom: 2px solid var(--maroon-red);
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
            background: linear-gradient(135deg, var(--maroon-red) 0%, #C06029 100%);
            color: var(--white);
            border-radius: 30px;
            padding: 10px 25px;
            font-weight: 500;
            border: none;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(139, 30, 63, 0.2);
        }

        .btn-custom:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(139, 30, 63, 0.3);
            color: var(--white);
        }

        .btn-outline-custom {
            background-color: transparent;
            color: var(--maroon-red);
            border: 2px solid var(--maroon-red);
            border-radius: 30px;
            padding: 10px 25px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-outline-custom:hover {
            background-color: var(--maroon-red);
            color: var(--white);
            transform: translateY(-2px);
        }

        /* Hero Section Restaurants */
        .restaurants-hero {
            background: linear-gradient(135deg,
                    rgba(139, 30, 63, 0.9) 0%,
                    rgba(212, 175, 55, 0.85) 50%,
                    rgba(139, 30, 63, 0.8) 100%),
                url('https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: var(--white);
            padding: 80px 0 40px;
            margin-bottom: 30px;
            position: relative;
            overflow: hidden;
        }

        .restaurants-hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: 
                repeating-linear-gradient(45deg, 
                    transparent, 
                    transparent 10px, 
                    rgba(255, 255, 255, 0.05) 10px, 
                    rgba(255, 255, 255, 0.05) 20px);
            pointer-events: none;
        }

        .restaurants-title {
            font-size: 2.8rem;
            margin-bottom: 15px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .hero-subtitle {
            font-size: 1.2rem;
            margin-bottom: 25px;
            opacity: 0.95;
        }

        .hero-slogan {
            font-size: 2rem;
            font-family: 'Dancing Script', cursive;
            color: var(--gold);
            margin-bottom: 25px;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.3);
        }

        /* Filtres améliorés */
        .filters-section {
            padding: 30px 0;
            background: linear-gradient(135deg, #FFFCF5 0%, #FEF9F3 100%);
            border-radius: 15px;
            margin-bottom: 40px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.05);
        }

        .filter-card {
            background: var(--white);
            border-radius: 12px;
            padding: 15px;
            margin-bottom: 15px;
            border: 2px solid transparent;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            position: relative;
            overflow: hidden;
        }

        .filter-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: linear-gradient(to bottom, var(--maroon-red), var(--gold));
            transition: width 0.3s ease;
        }

        .filter-card:hover {
            transform: translateY(-3px);
            border-color: rgba(139, 30, 63, 0.2);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        .filter-card:hover::before {
            width: 6px;
        }

        .filter-title {
            color: var(--moroccan-green);
            font-weight: 600;
            margin-bottom: 12px;
            font-size: 1.1rem;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .filter-title i {
            color: var(--gold);
        }

        .form-label {
            font-weight: 600;
            color: var(--dark-gray);
            margin-bottom: 6px;
            font-size: 0.9rem;
        }

        .form-control,
        .form-select {
            border-radius: 10px;
            padding: 10px 12px;
            border: 2px solid var(--medium-gray);
            transition: all 0.3s;
            font-size: 0.9rem;
            background-color: var(--white);
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--maroon-red);
            box-shadow: 0 0 0 0.2rem rgba(139, 30, 63, 0.15);
        }

        /* Badges de type de cuisine */
        .cuisine-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-top: 8px;
        }

        .cuisine-tag {
            padding: 6px 12px;
            background: rgba(139, 30, 63, 0.1);
            color: var(--maroon-red);
            border-radius: 18px;
            font-size: 0.85rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        .cuisine-tag:hover {
            background: var(--maroon-red);
            color: var(--white);
            transform: translateY(-2px);
        }

        .cuisine-tag.active {
            background: var(--maroon-red);
            color: var(--white);
            border-color: var(--maroon-red);
        }

        /* Section des restaurants disponibles */
        .restaurants-section {
            padding: 30px 0;
        }

        .section-title {
            color: var(--moroccan-green);
            margin-bottom: 35px;
            font-size: 2.2rem;
            text-align: center;
            position: relative;
        }

        .section-title::after {
            content: '';
            position: absolute;
            width: 100px;
            height: 3px;
            background: linear-gradient(to right, var(--maroon-red), var(--gold));
            bottom: -15px;
            left: 50%;
            transform: translateX(-50%);
            border-radius: 2px;
        }

        /* Carte de restaurant - PLUS GRANDES - 3 PAR LIGNE */
        .restaurant-card {
            background: var(--white);
            border-radius: 18px;
            margin-bottom: 30px;
            border: none;
            transition: all 0.4s ease;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            position: relative;
            height: 520px; /* Hauteur augmentée */
            display: flex;
            flex-direction: column;
        }

        .restaurant-card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .restaurant-card.selected {
            border: 3px solid var(--maroon-red);
            box-shadow: 0 0 0 3px rgba(139, 30, 63, 0.1), 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .restaurant-image {
            height: 220px; /* Hauteur augmentée */
            overflow: hidden;
            position: relative;
            flex-shrink: 0;
        }

        .restaurant-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s ease;
        }

        .restaurant-card:hover .restaurant-image img {
            transform: scale(1.1);
        }

        .restaurant-rating-badge {
            position: absolute;
            top: 20px;
            right: 20px;
            background: rgba(255, 255, 255, 0.95);
            color: var(--moroccan-green);
            padding: 8px 16px;
            border-radius: 20px;
            font-weight: 700;
            font-size: 1rem;
            display: flex;
            align-items: center;
            gap: 5px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
            z-index: 2;
        }

        .restaurant-rating-badge i {
            color: var(--gold);
        }

        .price-range-badge {
            position: absolute;
            bottom: 20px;
            left: 20px;
            background: rgba(139, 30, 63, 0.9);
            color: var(--white);
            padding: 6px 14px;
            border-radius: 15px;
            font-weight: 500;
            font-size: 0.9rem;
            z-index: 2;
        }

        .restaurant-content {
            padding: 25px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .restaurant-header {
            margin-bottom: 15px;
        }

        .restaurant-name {
            font-size: 1.5rem;
            color: var(--moroccan-green);
            margin-bottom: 8px;
            font-weight: 700;
            line-height: 1.3;
        }

        .restaurant-cuisine {
            color: var(--maroon-red);
            font-weight: 600;
            font-size: 1rem;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .restaurant-cuisine i {
            font-size: 1.1rem;
        }

        .restaurant-description {
            color: var(--dark-gray);
            margin-bottom: 20px;
            font-size: 0.95rem;
            line-height: 1.6;
            flex-grow: 1;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 4; /* Plus de lignes pour la description */
            -webkit-box-orient: vertical;
        }

        .restaurant-info {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-bottom: 20px;
        }

        .info-item {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 8px 12px;
            background: rgba(139, 30, 63, 0.05);
            border-radius: 10px;
            min-width: 120px;
            flex: 1;
        }

        .info-label {
            font-weight: 600;
            color: var(--dark-gray);
            font-size: 0.85rem;
        }

        .info-value {
            color: var(--maroon-red);
            font-weight: 600;
            font-size: 0.9rem;
        }

        .info-item i {
            color: var(--moroccan-green);
            font-size: 1rem;
        }

        /* Bouton de réservation - SANS FORMULAIRE */
        .reservation-btn-container {
            margin-top: auto;
            padding-top: 15px;
            border-top: 1px solid rgba(139, 30, 63, 0.1);
        }

        .btn-reserve {
            width: 100%;
            padding: 12px;
            font-weight: 600;
            font-size: 1rem;
            background: linear-gradient(135deg, var(--maroon-red) 0%, #C06029 100%);
            color: var(--white);
            border: none;
            border-radius: 12px;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            box-shadow: 0 4px 15px rgba(139, 30, 63, 0.2);
        }

        .btn-reserve:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(139, 30, 63, 0.3);
            color: var(--white);
        }

        /* Footer */
        .footer {
            background: linear-gradient(135deg, var(--moroccan-green) 0%, #1e4620 100%);
            color: var(--white);
            padding: 50px 0 25px;
            margin-top: 60px;
            position: relative;
            overflow: hidden;
        }

        .footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(to right, var(--maroon-red), var(--gold));
        }

        .copyright {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 20px;
            margin-top: 30px;
            text-align: center;
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.85rem;
        }

        /* Animation pour les cartes */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .restaurant-card {
            animation: fadeInUp 0.6s ease-out;
        }

        /* Message d'information */
        .info-message {
            background: linear-gradient(135deg, rgba(45, 90, 39, 0.1) 0%, rgba(139, 30, 63, 0.1) 100%);
            border-left: 4px solid var(--gold);
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 30px;
            font-size: 1rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .info-message i {
            color: var(--gold);
            font-size: 1.2rem;
        }

        /* Grille de restaurants - 3 CARTES PAR LIGNE */
        .restaurants-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr); /* 3 colonnes */
            gap: 30px;
        }

        @media (max-width: 1200px) {
            .restaurants-grid {
                grid-template-columns: repeat(2, 1fr); /* 2 colonnes sur tablette */
                gap: 25px;
            }
        }

        @media (max-width: 768px) {
            .restaurants-title {
                font-size: 2.2rem;
            }
            
            .hero-slogan {
                font-size: 1.6rem;
            }
            
            .restaurants-grid {
                grid-template-columns: 1fr; /* 1 colonne sur mobile */
                gap: 20px;
            }
            
            .restaurant-card {
                height: auto;
                min-height: 500px;
            }
            
            .restaurant-image {
                height: 200px;
            }
            
            .restaurant-info {
                flex-direction: column;
                gap: 10px;
            }
            
            .info-item {
                min-width: 100%;
            }
            
            .section-title {
                font-size: 1.8rem;
            }
        }

        @media (max-width: 480px) {
            .restaurants-title {
                font-size: 1.8rem;
            }
            
            .hero-slogan {
                font-size: 1.4rem;
            }
            
            .restaurant-card {
                height: auto;
                min-height: 480px;
            }
            
            .restaurant-image {
                height: 180px;
            }
            
            .section-title {
                font-size: 1.6rem;
            }
        }
    </style>

        <!-- Hero Section Restaurants -->
    <section class="restaurants-hero">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-10">
                    <h1 class="restaurants-title">Découvrez la Gastronomie Marocaine</h1>
                    <div class="hero-slogan cursive-text">Une symphonie de saveurs et d'arômes</div>
                    <p class="hero-subtitle">Explorez les meilleures tables du Maroc, des restaurants traditionnels aux adresses gastronomiques</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Barre de filtres -->
    <section class="filters-section">
        <div class="container">
            <h3 class="mb-4" style="color: var(--moroccan-green);">Affinez votre recherche</h3>
            
            <div class="row g-3">
                <!-- Ville -->
                <div class="col-md-3">
                    <div class="filter-card">
                        <div class="filter-title">
                            <i class="fas fa-city"></i> Ville
                        </div>
                        <select class="form-select" id="filter-ville">
                            <option value="all" selected>Toutes les villes</option>
                            <option value="marrakech">Marrakech</option>
                            <option value="fes">Fès</option>
                            <option value="casablanca">Casablanca</option>
                            <option value="rabat">Rabat</option>
                            <option value="agadir">Agadir</option>
                            <option value="tanger">Tanger</option>
                        </select>
                    </div>
                </div>

                <!-- Type de cuisine -->
                <div class="col-md-3">
                    <div class="filter-card">
                        <div class="filter-title">
                            <i class="fas fa-utensils"></i> Cuisine
                        </div>
                        <select class="form-select" id="filter-cuisine-type">
                            <option value="all" selected>Toutes les cuisines</option>
                            <option value="marocaine">Marocaine</option>
                            <option value="fusion">Fusion</option>
                            <option value="gastronomique">Gastronomique</option>
                            <option value="streetfood">Street Food</option>
                            <option value="vegetarien">Végétarien</option>
                            <option value="internationale">Internationale</option>
                        </select>
                        <div class="cuisine-tags mt-3">
                            <span class="cuisine-tag" data-cuisine="marocaine">Marocain</span>
                            <span class="cuisine-tag" data-cuisine="fusion">Fusion</span>
                            <span class="cuisine-tag" data-cuisine="gastronomique">Gastronomique</span>
                        </div>
                    </div>
                </div>

                <!-- Gamme de prix -->
                <div class="col-md-3">
                    <div class="filter-card">
                        <div class="filter-title">
                            <i class="fas fa-coins"></i> Budget
                        </div>
                        <select class="form-select" id="filter-price-range">
                            <option value="all" selected>Tous les budgets</option>
                            <option value="economique">Économique (50-200 DH)</option>
                            <option value="moyen">Moyen (200-500 DH)</option>
                            <option value="luxe">Luxe (500+ DH)</option>
                        </select>
                    </div>
                </div>

                <!-- Notation -->
                <div class="col-md-3">
                    <div class="filter-card">
                        <div class="filter-title">
                            <i class="fas fa-star"></i> Notation
                        </div>
                        <select class="form-select" id="filter-rating">
                            <option value="0" selected>Toutes les notes</option>
                            <option value="4.5">4.5+ Excellent</option>
                            <option value="4.0">4.0+ Très bon</option>
                            <option value="3.5">3.5+ Bon</option>
                            <option value="3.0">3.0+ Correct</option>
                        </select>
                    </div>
                </div>

                <!-- Boutons d'action -->
                <div class="col-12 mt-3">
                    <div class="d-flex justify-content-between">
                        <button class="btn btn-outline-custom" id="reset-filters">
                            <i class="fas fa-redo me-2"></i> Réinitialiser
                        </button>
                        <button class="btn btn-custom" id="apply-filters">
                            <i class="fas fa-filter me-2"></i> Appliquer les filtres
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contenu principal -->
    <div class="container">
        <!-- Section des restaurants disponibles -->
        <section class="restaurants-section">
            <h3 class="section-title">Nos restaurants sélectionnés</h3>

            <div class="restaurants-grid">
                <!-- Restaurant 1 - Gastronomique -->
                <div class="restaurant-card" data-restaurant-id="1" data-ville="marrakech" data-cuisine="gastronomique" data-price="luxe" data-rating="4.8">
                    <div class="restaurant-image">
                        <img src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80" alt="Le Jardin Secret">
                        <div class="restaurant-rating-badge">
                            <i class="fas fa-star"></i> 4.8
                        </div>
                        <div class="price-range-badge">Luxe</div>
                    </div>
                    <div class="restaurant-content">
                        <div class="restaurant-header">
                            <div>
                                <h4 class="restaurant-name">Le Jardin Secret</h4>
                            </div>
                            <div class="restaurant-cuisine">
                                    <i class="fas fa-mortar-pestle"></i> Traditionnel • Couscous & Tajines
                                </div>
                        </div>
                        <p class="restaurant-description">
                        <div class="restaurant-info">
                            <div class="info-item">
                                <i class="fas fa-map-marker-alt"></i>
                                <div>
                                    <div class="info-label">Lieu</div>
                                    <div class="info-value">Fès - Médina</div>
                                </div>
                            </div>

                            <div class="info-item">
                                <i class="fas fa-clock"></i>
                                <div>
                                    <div class="info-label">Horaires</div>
                                    <div class="info-value">12h - 22h</div>
                                </div>
                            </div>
                        </div>

                        <!-- Bouton de réservation simple -->
                        <div class="reservation-btn-container">
                            <button class="btn-reserve select-restaurant" data-restaurant-id="1">
                                <i class="fas fa-calendar-check me-2"></i> Réserver maintenant
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Restaurant 2 - Traditionnel -->
                <div class="restaurant-card" data-restaurant-id="2" data-ville="fes" data-cuisine="marocaine" data-price="moyen" data-rating="4.6">
                    <div class="restaurant-image">
                        <img src="https://images.unsplash.com/photo-1555939594-58d7cb561ad1?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80" alt="Dar Tajine">
                        <div class="restaurant-rating-badge">
                            <i class="fas fa-star"></i> 4.6
                        </div>
                        <div class="price-range-badge">Moyen</div>
                    </div>
                    <div class="restaurant-content">
                        <div class="restaurant-header">
                            <div>
                                <h4 class="restaurant-name">Dar Tajine</h4>
                                <div class="restaurant-cuisine">
                                    <i class="fas fa-mortar-pestle"></i> Traditionnel • Couscous & Tajines
                                </div>
                            </div>
                        </div>
                        <div class="restaurant-info">
                            <div class="info-item">
                                <i class="fas fa-map-marker-alt"></i>
                                <div>
                                    <div class="info-label">Lieu</div>
                                    <div class="info-value">Fès - Médina</div>
                                </div>
                            </div>

                            <div class="info-item">
                                <i class="fas fa-clock"></i>
                                <div>
                                    <div class="info-label">Horaires</div>
                                    <div class="info-value">12h - 22h</div>
                                </div>
                            </div>
                        </div>

                        <div class="reservation-btn-container">
                            <button class="btn-reserve select-restaurant" data-restaurant-id="2">
                                <i class="fas fa-calendar-check me-2"></i> Réserver maintenant
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Restaurant 3 - Street Food -->
                <div class="restaurant-card" data-restaurant-id="3" data-ville="casablanca" data-cuisine="streetfood" data-price="economique" data-rating="4.4">
                    <div class="restaurant-image">
                        <img src="https://images.unsplash.com/photo-1552566626-52f8b828add9?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80" alt="Souk Street Food">
                        <div class="restaurant-rating-badge">
                            <i class="fas fa-star"></i> 4.4
                        </div>
                        <div class="price-range-badge">Économique</div>
                    </div>
                    <div class="restaurant-content">
                        <div class="restaurant-header">
                            <div>
                                <h4 class="restaurant-name">Souk Street Food</h4>
                                <div class="restaurant-cuisine">
                                    <i class="fas fa-hamburger"></i> Street Food • Brochettes & Msemen
                                </div>
                            </div>
                        </div>
                        <div class="restaurant-info">
                            <div class="info-item">
                                <i class="fas fa-map-marker-alt"></i>
                                <div>
                                    <div class="info-label">Lieu</div>
                                    <div class="info-value">Casablanca </div>
                                </div>
                            </div>

                            <div class="info-item">
                                <i class="fas fa-clock"></i>
                                <div>
                                    <div class="info-label">Horaires</div>
                                    <div class="info-value">11h - Minuit</div>
                                </div>
                            </div>
                        </div>

                        <div class="reservation-btn-container">
                            <button class="btn-reserve select-restaurant" data-restaurant-id="3">
                                <i class="fas fa-shopping-bag me-2"></i> Commander
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Restaurant 4 - Fusion -->
                <div class="restaurant-card" data-restaurant-id="4" data-ville="agadir" data-cuisine="fusion" data-price="moyen" data-rating="4.7">
                    <div class="restaurant-image">
                        <img src="https://images.unsplash.com/photo-1414235077428-338989a2e8c0?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80" alt="Ocean's Fusion">
                        <div class="restaurant-rating-badge">
                            <i class="fas fa-star"></i> 4.7
                        </div>
                        <div class="price-range-badge">Moyen</div>
                    </div>
                    <div class="restaurant-content">
                        <div class="restaurant-header">
                            <div>
                                <h4 class="restaurant-name">Ocean's Fusion</h4>
                                <div class="restaurant-cuisine">
                                    <i class="fas fa-fish"></i> Fusion • Fruits de mer & Méditerranée
                                </div>
                            </div>
                        </div>
                        <div class="restaurant-info">
                            <div class="info-item">
                                <i class="fas fa-map-marker-alt"></i>
                                <div>
                                    <div class="info-label">Lieu</div>
                                    <div class="info-value">Agadir</div>
                                </div>
                            </div>

                            <div class="info-item">
                                <i class="fas fa-clock"></i>
                                <div>
                                    <div class="info-label">Horaires</div>
                                    <div class="info-value">12h - 23h</div>
                                </div>
                            </div>
                        </div>

                        <div class="reservation-btn-container">
                            <button class="btn-reserve select-restaurant" data-restaurant-id="4">
                                <i class="fas fa-calendar-check me-2"></i> Réserver maintenant
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Restaurant 5 - Végétarien -->
                <div class="restaurant-card" data-restaurant-id="5" data-ville="rabat" data-cuisine="vegetarien" data-price="moyen" data-rating="4.5">
                    <div class="restaurant-image">
                        <img src="https://images.unsplash.com/photo-1512621776951-a57141f2eefd?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80" alt="Green Oasis">
                        <div class="restaurant-rating-badge">
                            <i class="fas fa-star"></i> 4.5
                        </div>
                        <div class="price-range-badge">Moyen</div>
                    </div>
                    <div class="restaurant-content">
                        <div class="restaurant-header">
                            <div>
                                <h4 class="restaurant-name">Green Oasis</h4>
                                <div class="restaurant-cuisine">
                                    <i class="fas fa-leaf"></i> Végétarien • Cuisine saine marocaine
                                </div>
                            </div>
                        </div>
                        <div class="restaurant-info">
                            <div class="info-item">
                                <i class="fas fa-map-marker-alt"></i>
                                <div>
                                    <div class="info-label">Lieu</div>
                                    <div class="info-value">Rabat - Hassan</div>
                                </div>
                            </div>

                            <div class="info-item">
                                <i class="fas fa-clock"></i>
                                <div>
                                    <div class="info-label">Horaires</div>
                                    <div class="info-value">11h - 21h</div>
                                </div>
                            </div>
                        </div>

                        <div class="reservation-btn-container">
                            <button class="btn-reserve select-restaurant" data-restaurant-id="5">
                                <i class="fas fa-calendar-check me-2"></i> Réserver maintenant
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Restaurant 6 - International -->
                <div class="restaurant-card" data-restaurant-id="6" data-ville="tanger" data-cuisine="internationale" data-price="luxe" data-rating="4.3">
                    <div class="restaurant-image">
                        <img src="https://images.unsplash.com/photo-1554679665-f5537f187268?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80" alt="Mediterraneo">
                        <div class="restaurant-rating-badge">
                            <i class="fas fa-star"></i> 4.3
                        </div>
                        <div class="price-range-badge">Luxe</div>
                    </div>
                    <div class="restaurant-content">
                        <div class="restaurant-header">
                            <div>
                                <h4 class="restaurant-name">Mediterraneo</h4>
                                <div class="restaurant-cuisine">
                                    <i class="fas fa-globe-europe"></i> International • Fusion méditerranéenne
                                </div>
                            </div>
                        </div>
                        <div class="restaurant-info">
                            <div class="info-item">
                                <i class="fas fa-map-marker-alt"></i>
                                <div>
                                    <div class="info-label">Lieu</div>
                                    <div class="info-value">Tanger - Corniche</div>
                                </div>
                            </div>

                            <div class="info-item">
                                <i class="fas fa-clock"></i>
                                <div>
                                    <div class="info-label">Horaires</div>
                                    <div class="info-value">18h30 - 23h30</div>
                                </div>
                            </div>
                        </div>

                        <div class="reservation-btn-container">
                            <button class="btn-reserve select-restaurant" data-restaurant-id="6">
                                <i class="fas fa-calendar-check me-2"></i> Réserver maintenant
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php include __DIR__ . '/../../template/layaout/footer.php'; ?>