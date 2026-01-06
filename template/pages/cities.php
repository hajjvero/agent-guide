<?php
// Variables: $cities, $lang
?>

<!-- PAGE HEADER -->
<section class="page-header">
    <div class="container">
        <h1>Discover Moroccan Cities</h1>
        <p>From imperial cities to coastal gems</p>
    </div>
</section>

<!-- CITIES GRID -->
<section class="section-padding">
    <div class="container">
        <?php if (empty($cities)): ?>
            <div class="text-center py-5">
                <i class="bi bi-geo-alt" style="font-size: 4rem; color: var(--gold);"></i>
                <h3 class="mt-3">No cities available</h3>
                <p class="text-muted">Please check back later</p>
            </div>
        <?php else: ?>
            <div class="row g-4">
                <?php foreach ($cities as $city): ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="city-card">
                            <div class="city-image">
                                <img src="<?= htmlspecialchars($city->getImage()) ?>" 
                                     alt="<?= htmlspecialchars($city->{'getName' . ucfirst($lang)}()) ?>">
                                <div class="city-overlay">
                                    <h3><?= htmlspecialchars($city->{'getName' . ucfirst($lang)}()) ?></h3>
                                    <p><?= substr($city->{'getDescription' . ucfirst($lang)}(), 0, 120) ?>...</p>
                                    
                                    <div class="city-stats mt-3 mb-3">
                                        <span class="badge bg-gold me-2">
                                            <i class="bi bi-building"></i> 
                                            <?= count($city->getLogements()) ?> Hotels
                                        </span>
                                        <span class="badge bg-gold me-2">
                                            <i class="bi bi-star"></i> 
                                            <?= count($city->getActivites()) ?> Activities
                                        </span>
                                        <span class="badge bg-gold">
                                            <i class="bi bi-cup-hot"></i> 
                                            <?= count($city->getRestaurants()) ?> Restaurants
                                        </span>
                                    </div>
                                    
                                    <a href="/cities/<?= $city->getId() ?>" class="btn-gold">
                                        Explore City <i class="bi bi-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- WHY VISIT MOROCCO -->
<section class="section-padding bg-light">
    <div class="container">
        <div class="section-header text-center mb-5">
            <h2>Why Visit Morocco?</h2>
            <p class="text-muted">A land of diverse experiences</p>
        </div>
        
        <div class="row g-4">
            <div class="col-md-3 text-center">
                <div class="feature-icon">
                    <i class="bi bi-building"></i>
                </div>
                <h5>Rich History</h5>
                <p>Explore ancient medinas and imperial cities</p>
            </div>
            <div class="col-md-3 text-center">
                <div class="feature-icon">
                    <i class="bi bi-tree"></i>
                </div>
                <h5>Natural Beauty</h5>
                <p>From Sahara deserts to Atlas mountains</p>
            </div>
            <div class="col-md-3 text-center">
                <div class="feature-icon">
                    <i class="bi bi-cup-hot"></i>
                </div>
                <h5>Amazing Cuisine</h5>
                <p>Taste authentic Moroccan flavors</p>
            </div>
            <div class="col-md-3 text-center">
                <div class="feature-icon">
                    <i class="bi bi-people"></i>
                </div>
                <h5>Warm Hospitality</h5>
                <p>Experience Moroccan kindness</p>
            </div>
        </div>
    </div>
</section>

<style>
.badge.bg-gold {
    background: var(--gold) !important;
    color: var(--dark);
    padding: 6px 12px;
    font-weight: 500;
    font-size: 0.85rem;
}

.city-stats {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
}
</style>