<?php
// This file will be rendered by HomeController
// Variables available: $featuredCities, $popularActivities, $featuredProducts

include "./layaout/header.php";
?>

<!-- HERO SECTION -->
<section class="hero-section">
    <div class="hero-content">
        <h1 class="fade-up">Discover the Magic of Morocco</h1>
        <p class="fade-up delay-1">Explore ancient cities, unforgettable activities, and authentic treasures</p>
        <div class="fade-up delay-2">
            <a href="/cities" class="btn-morocco me-3">Explore Cities</a>
            <a href="/activities" class="btn-gold">Browse Activities</a>
        </div>
    </div>
</section>

<!-- SEARCH BAR -->
<section class="search-section">
    <div class="container">
        <div class="search-box">
            <form action="/search" method="GET" class="row g-3">
                <div class="col-md-4">
                    <select name="type" class="form-select">
                        <option value="">What are you looking for?</option>
                        <option value="cities">Cities</option>
                        <option value="activities">Activities</option>
                        <option value="accommodations">Accommodations</option>
                        <option value="restaurants">Restaurants</option>
                        <option value="products">Products</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <input type="text" name="q" class="form-control" placeholder="Search destinations, activities, products...">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn-gold w-100">
                        <i class="bi bi-search"></i> Search
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

<!-- FEATURED CITIES -->
<section class="section-padding">
    <div class="container">
        <div class="section-header text-center mb-5">
            <h2>Explore Moroccan Cities</h2>
            <p class="text-muted">From imperial cities to coastal gems</p>
        </div>
        
        <div class="row g-4">
            <?php foreach ($featuredCities as $city): ?>
                <div class="col-lg-4 col-md-6">
                    <div class="city-card">
                        <div class="city-image">
                            <img src="<?= htmlspecialchars($city->getImage()) ?>" 
                                 alt="<?= htmlspecialchars($city->{'getName' . ucfirst($lang)}()) ?>">
                            <div class="city-overlay">
                                <h3><?= htmlspecialchars($city->{'getName' . ucfirst($lang)}()) ?></h3>
                                <p><?= substr($city->{'getDescription' . ucfirst($lang)}(), 0, 100) ?>...</p>
                                <a href="/cities/<?= $city->getId() ?>" class="btn-gold">
                                    Explore <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        
        <div class="text-center mt-5">
            <a href="/cities" class="btn-morocco">View All Cities</a>
        </div>
    </div>
</section>

<!-- POPULAR ACTIVITIES -->
<section class="section-padding bg-light">
    <div class="container">
        <div class="section-header text-center mb-5">
            <h2>Popular Activities</h2>
            <p class="text-muted">Create unforgettable memories</p>
        </div>
        
        <div class="row g-4">
            <?php foreach ($popularActivities as $activity): ?>
                <div class="col-lg-3 col-md-6">
                    <div class="activity-card">
                        <div class="activity-image">
                            <img src="<?= htmlspecialchars($activity->getImage()) ?>" 
                                 alt="<?= htmlspecialchars($activity->{'getTitle' . ucfirst($lang)}()) ?>">
                            <span class="activity-price"><?= number_format($activity->getPrice(), 2) ?> MAD</span>
                        </div>
                        <div class="activity-body">
                            <div class="activity-meta">
                                <span><i class="bi bi-clock"></i> <?= $activity->getDuration() ?></span>
                                <span><i class="bi bi-star-fill"></i> <?= $activity->getRating() ?></span>
                            </div>
                            <h5><?= htmlspecialchars($activity->{'getTitle' . ucfirst($lang)}()) ?></h5>
                            <p><?= substr($activity->{'getDescription' . ucfirst($lang)}(), 0, 80) ?>...</p>
                            <a href="/activities/<?= $activity->getId() ?>" class="btn-outline">Learn More</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- FEATURED PRODUCTS -->
<section class="section-padding">
    <div class="container">
        <div class="section-header text-center mb-5">
            <h2>Authentic Moroccan Products</h2>
            <p class="text-muted">Handcrafted with tradition and pride</p>
        </div>
        
        <div class="row g-4">
            <?php foreach ($featuredProducts as $product): ?>
                <div class="col-lg-3 col-md-6">
                    <?php include __DIR__ . '/../components/product-card.php'; ?>
                </div>
            <?php endforeach; ?>
        </div>
        
        <div class="text-center mt-5">
            <a href="/shop" class="btn-morocco">Browse All Products</a>
        </div>
    </div>
</section>

<!-- WHY CHOOSE US -->
<section class="section-padding bg-dark text-white">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-3 text-center">
                <div class="feature-icon">
                    <i class="bi bi-shield-check"></i>
                </div>
                <h5>Verified Guides</h5>
                <p>All our partners are verified and trusted</p>
            </div>
            <div class="col-md-3 text-center">
                <div class="feature-icon">
                    <i class="bi bi-headset"></i>
                </div>
                <h5>24/7 Support</h5>
                <p>We're here to help anytime you need</p>
            </div>
            <div class="col-md-3 text-center">
                <div class="feature-icon">
                    <i class="bi bi-hand-thumbs-up"></i>
                </div>
                <h5>Best Prices</h5>
                <p>Competitive rates with no hidden fees</p>
            </div>
            <div class="col-md-3 text-center">
                <div class="feature-icon">
                    <i class="bi bi-globe"></i>
                </div>
                <h5>Multilingual</h5>
                <p>Service in 5 languages</p>
            </div>
        </div>
    </div>
</section>