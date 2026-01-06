<?php
// This component expects $product to be available
// Usage: include this file wherever you need to display a product card
?>

<div class="product-card">
    <div class="product-image">
        <img src="<?= htmlspecialchars($product->getImage()) ?>" 
             alt="<?= htmlspecialchars($product->{'getName' . ucfirst($lang)}()) ?>">
        
        <?php if ($product->getStock() < 5 && $product->getStock() > 0): ?>
            <span class="product-badge sale">Only <?= $product->getStock() ?> left</span>
        <?php elseif ($product->getStock() == 0): ?>
            <span class="product-badge" style="background: #dc3545;">Out of Stock</span>
        <?php endif; ?>
        
        <button class="wishlist-btn" data-product-id="<?= $product->getId() ?>">
            <i class="bi bi-heart"></i>
        </button>
    </div>
    
    <div class="product-body">
        <div class="product-category">
            <?= htmlspecialchars($product->getCategory()->{'getName' . ucfirst($lang)}()) ?>
        </div>
        
        <h6 class="product-title">
            <a href="/products/<?= $product->getId() ?>">
                <?= htmlspecialchars($product->{'getName' . ucfirst($lang)}()) ?>
            </a>
        </h6>
        
        <p class="product-description">
            <?= substr($product->{'getDescription' . ucfirst($lang)}(), 0, 60) ?>...
        </p>
        
        <div class="product-price">
            <div>
                <span class="price"><?= number_format($product->getPrice(), 2) ?> MAD</span>
            </div>
            
            <?php if ($product->getStock() > 0): ?>
                <button class="add-cart-btn" 
                        data-product-id="<?= $product->getId() ?>"
                        data-product-name="<?= htmlspecialchars($product->{'getName' . ucfirst($lang)}()) ?>"
                        data-product-price="<?= $product->getPrice() ?>">
                    <i class="bi bi-cart-plus"></i>
                </button>
            <?php else: ?>
                <button class="add-cart-btn" disabled style="opacity: 0.5; cursor: not-allowed;">
                    <i class="bi bi-x-circle"></i>
                </button>
            <?php endif; ?>
        </div>
    </div>
</div>