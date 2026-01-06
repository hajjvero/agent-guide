// Animation du navbar au scroll
window.addEventListener('scroll', function () {
    const navbar = document.querySelector('.navbar-custom');
    if (navbar) {
        if (window.scrollY > 50) {
            navbar.style.padding = '10px 0';
            navbar.style.boxShadow = '0 4px 12px rgba(0, 0, 0, 0.1)';
        } else {
            navbar.style.padding = '15px 0';
            navbar.style.boxShadow = '0 4px 12px rgba(0, 0, 0, 0.08)';
        }
    }
});

// Animation des images de fond
document.addEventListener('DOMContentLoaded', function () {
    const slides = document.querySelectorAll('.hero-slide');
    if (slides.length > 0) {
        let currentSlide = 0;

        // Fonction pour changer l'image de fond
        function changeBackground() {
            // Retirer la classe active de toutes les slides
            slides.forEach(slide => {
                slide.classList.remove('active');
            });

            // Ajouter la classe active à la slide courante
            slides[currentSlide].classList.add('active');

            // Passer à la slide suivante
            currentSlide = (currentSlide + 1) % slides.length;
        }

        // Changer l'image toutes les 5 secondes
        setInterval(changeBackground, 5000);

        // Initialiser la première slide
        changeBackground();
    }

    // Gestion des boutons (Exemples)
    const exploreBtn = document.querySelector('.hero-section .btn-custom');
    if (exploreBtn) {
        exploreBtn.addEventListener('click', function () {
            // alert('Redirection vers la page des offres...');
            window.location.href = '/accommodations';
        });
    }

    const shopBtn = document.querySelector('.shopping-section .btn-custom');
    if (shopBtn) {
        shopBtn.addEventListener('click', function () {
            // alert('Ouverture de la boutique en ligne...');
            window.location.href = '/shop';
        });
    }

    // Gestion du dropdown de langue
    const languageItems = document.querySelectorAll('.language-dropdown .dropdown-item');
    languageItems.forEach(item => {
        item.addEventListener('click', function (e) {
            // Retirer la classe active de tous les items
            languageItems.forEach(i => i.classList.remove('active'));

            // Ajouter la classe active à l'item cliqué
            this.classList.add('active');

            // Mettre à jour le texte du bouton dropdown
            const dropdownToggle = document.querySelector('.language-dropdown .dropdown-toggle');
            if (dropdownToggle) {
                const flagImg = this.querySelector('img').cloneNode(true);
                const languageText = this.textContent.trim();

                // Vider le bouton et ajouter le nouveau contenu
                dropdownToggle.innerHTML = '';
                dropdownToggle.appendChild(flagImg);
                dropdownToggle.appendChild(document.createTextNode(' ' + languageText.split(' ')[0]));

                // Fermer le dropdown
                // const dropdown = new bootstrap.Dropdown(dropdownToggle); // This might re-initialize causing issues, simpler to let bootstrap handle it or just hide
            }
            // e.preventDefault(); // Let the link work for PHP reload
        });
    });

    // Smooth scroll pour les liens d'ancrage
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const targetId = this.getAttribute('href');
            if (targetId === '#' || targetId === '/#') return;

            // Handle links like /#services if on home page
            const hash = targetId.includes('#') ? targetId.substring(targetId.indexOf('#')) : targetId;
            const targetElement = document.querySelector(hash);

            if (targetElement) {
                e.preventDefault();
                window.scrollTo({
                    top: targetElement.offsetTop - 80,
                    behavior: 'smooth'
                });
            }
        });
    });
});
