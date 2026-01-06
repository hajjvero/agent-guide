<?php
include __DIR__ . '/../../template/layaout/header.php';
?>

    <!-- Hero Section avec fond animé -->
    <section class="hero-section">
        <div class="hero-bg">
            <!-- Images de fond qui changent automatiquement -->
            <div class="hero-slide active"
                style="background-image: url('https://www.marocmarrakech.com/wp-content/uploads/2024/06/Place-Jemaa-el-Fna-1.jpg');">
            </div>
            <div class="hero-slide"
                style="background-image: url('https://cdn.getyourguide.com/img/location/5cf66d50915c1.jpeg/99.jpg');">
            </div>
            <div class="hero-slide"
                style="background-image: url('https://www.rjtravelagency.com/wp-content/uploads/2023/03/Bab-Bou-Jeloud-Blue-Gate-Fes-1.jpg');">
            </div>
            <div class="hero-slide"
                style="background-image: url('https://ledesk.ma/wp-content/uploads/2024/12/Kasbah-Udayas-Rabat.jpg');">
            </div>
            <div class="hero-slide"
                style="background-image: url('https://stayhere.ma/wp-content/uploads/2023/08/Explorez-le-Cap-Spartel-Tanger-Guide-Complet-pour-un-Sejour-Inoubliable-1140x760.webp');">
            </div>
        </div>

        <div class="container">
            <div class="hero-content">
                <div class="row">
                    <div class="col-lg-8">
                        <h1 class="hero-title animate-text">Découvrez la Beauté du Maroc</h1>
                        <h2 class="hero-slogan animate-text" style="animation-delay: 0.2s">One Platform. <span>One
                                Country.</span> Endless Experiences.</h2>
                        <p class="hero-subtitle animate-text" style="animation-delay: 0.4s">
                            Composez votre voyage marocain de rêve : hébergements d'exception, transports sur mesure et
                            expériences authentiques.
                            Tout réuni sur une seule plateforme, avec l'expertise de nos partenaires locaux.
                        </p>
                        <div class="animate-text" style="animation-delay: 0.6s">
                            <a href="/accommodations" class="btn btn-custom btn-lg me-3">Explorer maintenant</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="services-section">
        <div class="container">
            <div class="section-title">
                <h2>Nos Services Complets</h2>
                <p class="lead">Tout ce dont vous avez besoin pour un séjour inoubliable au Maroc</p>
            </div>

            <div class="row g-4">
                <div class="col-md-6 col-lg-4">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-hotel"></i>
                        </div>
                        <h4>Hébergement</h4>
                        <p>Hôtels, riads authentiques, maisons d'hôtes et villas de luxe dans toutes les villes du
                            Maroc.</p>
                        <a href="/accommodations" class="text-decoration-none" style="color: var(--maroon-red); font-weight: 500;">
                            Découvrir <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-car"></i>
                        </div>
                        <h4>Transport</h4>
                        <p>Chauffeurs certifiés, location de voitures, transferts aéroport et excursions organisées.</p>
                        <a href="/transport" class="text-decoration-none" style="color: var(--maroon-red); font-weight: 500;">
                            Réserver <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-map-marked-alt"></i>
                        </div>
                        <h4>Visites Guidées</h4>
                        <p>Guides francophones expérimentés pour découvrir les trésors cachés du Maroc.</p>
                        <a href="/activities" class="text-decoration-none" style="color: var(--maroon-red); font-weight: 500;">
                            Explorer <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-utensils"></i>
                        </div>
                        <h4>Restaurants & Gastronomie</h4>
                        <p>Trouvez et réservez les meilleurs restaurants du Maroc. Cuisine traditionnelle et adresses
                            authentiques</p>
                        <a href="/restaurants" class="text-decoration-none" style="color: var(--maroon-red); font-weight: 500;">
                            Goûter <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-store"></i>
                        </div>
                        <h4>Shopping Traditionnel</h4>
                        <p>Accès direct aux artisans locaux et produits authentiques du terroir marocain.</p>
                        <a href="/shop" class="text-decoration-none" style="color: var(--maroon-red); font-weight: 500;">
                            Acheter <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-calendar-alt"></i>
                        </div>
                        <h4>Événements & Festivals</h4>
                        <p>Accédez aux événements culturels et sportifs marocains. Réservez vos billets ici .</p>
                        <a href="#" class="text-decoration-none" style="color: var(--maroon-red); font-weight: 500;">
                            Participer <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Destinations Section -->
    <section id="destinations" class="cities-section">
        <div class="container">
            <div class="section-title">
                <h2>Destinations Populaires</h2>
                <p class="lead">Explorez les joyaux du Maroc</p>
            </div>

            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="city-card">
                        <img src="https://www.en-vols.com/wp-content/uploads/afmm/2022/12/GettyImages-1294321554_HEADER_Marrakech_local_Michelin.jpg"
                            alt="Marrakech">
                        <div class="city-overlay">
                            <h3>Marrakech</h3>
                            <p>La ville rouge et ses souks légendaires</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="city-card">
                        <img src="https://unsacsurledos.com/wp-content/uploads/2025/01/bab-bujloud-1536x1028.jpg"
                            alt="Fès">
                        <div class="city-overlay">
                            <h3>Fès</h3>
                            <p>La capitale spirituelle et sa médina historique</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="city-card">
                        <img src="https://th.bing.com/th/id/R.5d8b1af22ce1b5310fdb19d8d6c3c7c9?rik=ICanwWaQwg3u1A&riu=http%3a%2f%2farchaeoadventures.com%2fwp-content%2fuploads%2f2015%2f10%2fGenevieve-Hathaway_Morocco_Chefchaouen_Medina-streets_1.jpg&ehk=%2bLz62iPuhcISuDD9HG3HkZVPKaqY1j7GPunuaGIsSJM%3d&risl=&pid=ImgRaw&r=0"
                            alt="Chefchaouen">
                        <div class="city-overlay">
                            <h3>Chefchaouen</h3>
                            <p>La perle bleue des montagnes du Rif</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="city-card">
                        <img src="https://www.reisjunk.nl/wp-content/uploads/2019/11/haven-essaouira-marokko.jpg"
                            alt="Essaouira">
                        <div class="city-overlay">
                            <h3>Essaouira</h3>
                            <p>Ville côtière aux influences portugaises</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-5">
                <button class="btn btn-custom btn-lg">
                    <i class="fas fa-globe-africa me-2"></i> Voir toutes les destinations
                </button>
            </div>
        </div>
    </section>

    <!-- Traditional Shopping Section -->
    <section id="shopping" class="shopping-section">
        <div class="container">
            <div class="section-title">
                <h2>Artisanat Marocain</h2>
                <p class="lead">Découvrez l'authenticité des produits traditionnels</p>
            </div>

            <div class="row align-items-center mb-5">
                <div class="col-lg-5">
                    <h3 class="mb-4" style="color: var(--moroccan-green);">Soutenez les artisans locaux</h3>
                    <p class="mb-4">Notre boutique en ligne propose une sélection exclusive de produits artisanaux
                        marocains directement des ateliers d'artisans. Chaque achat contribue à préserver notre
                        patrimoine culturel.</p>
                    <p class="mb-4">Tapis berbères, céramiques de Fès, caftans brodés, lanternes en métal et produits de
                        beauté naturels - découvrez l'authenticité du Maroc.</p>
                    <button class="btn btn-custom">
                        <i class="fas fa-shopping-bag me-2"></i> Visiter la boutique
                    </button>
                </div>

                <div class="col-lg-7">
                    <div class="row g-3">
                        <div class="col-6">
                            <div class="shopping-card">
                                <img src="https://tse2.mm.bing.net/th/id/OIP.fiZqMNimYM0R4Ii-4rRVMwHaIG?rs=1&pid=ImgDetMain&o=7&rm=3"
                                    alt="Tapis marocain">
                                <div class="shopping-card-overlay">
                                    <h4 class="text-white">Tapis Berbères</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="shopping-card">
                                <img src="https://i.pinimg.com/736x/fe/c9/4c/fec94ce1330cc05761e63c3ed31dddce.jpg"
                                    alt="Caftan marocain">
                                <div class="shopping-card-overlay">
                                    <h4 class="text-white">Caftans Brodés</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="shopping-card">
                                <img src="https://www.chouiamaison.com/wp-content/uploads/2024/12/les-ceramiques-de-fes-scaled-e1733849318935-1024x636.webp"
                                    alt="Poterie marocaine">
                                <div class="shopping-card-overlay">
                                    <h4 class="text-white">Céramiques de Fès</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="shopping-card">
                                <img src="https://pucesdoc.fr/wp-content/uploads/2020/04/2020-03-30-17.27.20.jpeg"
                                    alt="Lanternes marocaines">
                                <div class="shopping-card-overlay">
                                    <h4 class="text-white">Lanternes en Métal</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php
include __DIR__ . '/../../template/layaout/footer.php';
?>