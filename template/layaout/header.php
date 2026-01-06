<!DOCTYPE html>
<html lang="<?= $_SESSION['lang'] ?? 'en' ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle ?? 'MoroccoGuide - Your Travel Companion' ?></title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="./assets/css/style.css">
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="/assets/images/favicon.png">
</head>
<body> 

<!-- NAVIGATION -->
<nav class="glass-nav">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <!-- Logo -->
            <a href="/" class="navbar-brand">
                <i class="bi bi-compass"></i> MoroccoGuide
            </a>
            
            <!-- Main Navigation -->
            <div class="d-none d-lg-flex align-items-center">
                <a href="/" class="nav-link">Home</a>
                <a href="/cities" class="nav-link">Cities</a>
                <a href="/activities" class="nav-link">Activities</a>
                <a href="/accommodations" class="nav-link">Stay</a>
                <a href="/restaurants" class="nav-link">Dine</a>
                <a href="/shop" class="nav-link">Shop</a>
            </div>
            
            <!-- Right Side -->
            <div class="d-flex align-items-center gap-3">
                <!-- Language Switcher -->
                <div class="dropdown">
                    <button class="btn btn-sm btn-outline-light dropdown-toggle" type="button" data-bs-toggle="dropdown">
                        <i class="bi bi-translate"></i> <?= strtoupper($_SESSION['lang'] ?? 'EN') ?>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="?lang=en">English</a></li>
                        <li><a class="dropdown-item" href="?lang=fr">Français</a></li>
                        <li><a class="dropdown-item" href="?lang=ar">العربية</a></li>
                        <li><a class="dropdown-item" href="?lang=es">Español</a></li>
                        <li><a class="dropdown-item" href="?lang=pt">Português</a></li>
                    </ul>
                </div>
                
                <!-- Cart Button -->
                <button class="btn-gold" id="cart-btn">
                    <i class="bi bi-cart3"></i> 
                    <span class="cart-count">0</span>
                </button>
                
                <!-- Mobile Menu Toggle -->
                <button class="btn btn-outline-light d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileMenu">
                    <i class="bi bi-list"></i>
                </button>
            </div>
        </div>
    </div>
</nav>

<!-- Mobile Offcanvas Menu -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="mobileMenu">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title">Menu</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body">
        <div class="d-flex flex-column gap-3">
            <a href="/" class="nav-link-mobile">Home</a>
            <a href="/cities" class="nav-link-mobile">Cities</a>
            <a href="/activities" class="nav-link-mobile">Activities</a>
            <a href="/accommodations" class="nav-link-mobile">Stay</a>
            <a href="/restaurants" class="nav-link-mobile">Dine</a>
            <a href="/shop" class="nav-link-mobile">Shop</a>
        </div>
    </div>
</div>