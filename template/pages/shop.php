<?php
// Variables: $products, $categories, $currentCategory
include "./layaout/header.php";
?>

<!-- PAGE HEADER -->
<section class="page-header">
    <div class="container">
        <h1>Moroccan Artisan Shop</h1>
        <p>Discover authentic handcrafted treasures</p>
    </div>
</section>

<!-- FILTER BAR -->
<section class="filter-bar">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="d-flex flex-wrap gap-2">
                    <a href="/shop" class="filter-btn <?= !$currentCategory ? 'active' : '' ?>">
                        All Products
                    </a>
                    <?php foreach ($categories as $category): ?>
                        <a href="/shop?category=<?= $category->getId() ?>" 
                           class="filter-btn <?= $currentCategory == $category->getId() ? 'active' : '' ?>">
                            <?= htmlspecialchars($category->{'getName' . ucfirst($lang)}()) ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="search-box-small">
                    <input type="text" id="product-search" class="form-control" 
                           placeholder="Search products...">
                    <i class="bi bi-search"></i>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- PRODUCTS GRID -->
<section class="products-section">
    <div class="container">
        <?php if (empty($products)): ?>
            <div class="text-center py-5">
                <i class="bi bi-box-seam" style="font-size: 4rem; color: var(--gold);"></i>
                <h3 class="mt-3">No products found</h3>
                <p class="text-muted">Try adjusting your filters or search terms</p>
                <a href="/shop" class="btn-morocco mt-3">View All Products</a>
            </div>
        <?php else: ?>
            <div class="row g-4" id="product-grid">
                <?php foreach ($products as $product): ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 product-item" 
                         data-name="<?= strtolower($product->{'getName' . ucfirst($lang)}()) ?>">
                        <?php include __DIR__ . '/../components/product-card.php'; ?>
                    </div>
                <?php endforeach; ?>
            </div>
            
            <!-- Pagination -->
            <?php if (isset($totalPages) && $totalPages > 1): ?>
                <nav class="mt-5">
                    <ul class="pagination justify-content-center">
                        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                            <li class="page-item <?= $i == $currentPage ? 'active' : '' ?>">
                                <a class="page-link" href="/shop?page=<?= $i ?><?= $currentCategory ? '&category=' . $currentCategory : '' ?>">
                                    <?= $i ?>
                                </a>
                            </li>
                        <?php endfor; ?>
                    </ul>
                </nav>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</section>

<!-- NEWSLETTER SECTION -->
<section class="newsletter-section">
    <div class="container text-center">
        <h3>Get Exclusive Offers</h3>
        <p>Subscribe to receive artisan stories and special deals</p>
        <form class="newsletter-form mt-4">
            <div class="input-group justify-content-center">
                <input type="email" class="form-control" placeholder="Your email address" style="max-width: 400px;">
                <button class="btn-gold" type="submit">Subscribe</button>
            </div>
        </form>
    </div>
</section>

<script>
// Real-time product search
document.getElementById('product-search')?.addEventListener('input', function(e) {
    const searchTerm = e.target.value.toLowerCase();
    const products = document.querySelectorAll('.product-item');
    
    products.forEach(product => {
        const productName = product.getAttribute('data-name');
        if (productName.includes(searchTerm)) {
            product.style.display = 'block';
        } else {
            product.style.display = 'none';
        }
    });
});
</script>