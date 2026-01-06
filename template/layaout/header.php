<!DOCTYPE html>
<html lang="<?= $_SESSION['lang'] ?? 'fr' ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle ?? 'Guide Agent - Votre guide au Maroc' ?></title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome pour les icônes -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="/public/assets/css/style.css">
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600&display=swap"
        rel="stylesheet">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light navbar-custom fixed-top">
        <div class="container">
            <a class="navbar-brand" href="/">
                <i class="fas fa-chess-rook me-2"></i>Guide<span>Agent</span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto me-4">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/#services">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/restaurants">Restaurant</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/#Événements">Événements</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/shop">Shopping</a>
                    </li>
                </ul>

                <!-- Dropdown Langue -->
                <div class="dropdown language-dropdown me-3">
                    <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://flagcdn.com/w20/fr.png" class="language-flag" alt="Français"> FR
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item active" href="?lang=fr">
                                <img src="https://flagcdn.com/w20/fr.png" class="language-flag" alt="Français"> Français
                            </a></li>
                        <li><a class="dropdown-item" href="?lang=en">
                                <img src="https://flagcdn.com/w20/gb.png" class="language-flag" alt="English"> English
                            </a></li>
                        <li><a class="dropdown-item" href="?lang=es">
                                <img src="https://flagcdn.com/w20/es.png" class="language-flag" alt="Español"> Español
                            </a></li>
                        <li><a class="dropdown-item" href="?lang=de">
                                <img src="https://flagcdn.com/w20/de.png" class="language-flag" alt="Deutsch"> Deutsch
                            </a></li>
                        <li><a class="dropdown-item" href="?lang=ar">
                                <img src="https://flagcdn.com/w20/ma.png" class="language-flag" alt="العربية"> العربية
                            </a></li>
                    </ul>
                </div>

                <div class="d-flex">
                    <button class="btn btn-outline-custom me-2">Connexion</button>
                    <button class="btn btn-custom">Inscription</button>
                </div>
            </div>
        </div>
    </nav>