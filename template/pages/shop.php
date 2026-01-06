<?php
include __DIR__ . '/../layaout/header.php';
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
            <div class="col-12">
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
        <div class="row g-4" id="product-grid">
            <!-- Product 1 -->
            <div class="col-lg-3 col-md-4 col-sm-6 product-item" data-name="ceramic tagine">
                <div class="product-card">
                    <div class="product-image">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRTwcrBVKtkEm97TtYOAznHGoqXkmKqwFLrOQ&s" alt="Ceramic Tagine">
                        <span class="product-badge">New</span>
                        <button class="wishlist-btn"><i class="bi bi-heart"></i></button>
                    </div>
                    <div class="product-body">
                        <div class="product-category">Pottery</div>
                        <h6 class="product-title"><a href="#">Ceramic Tagine</a></h6>
                        <p class="product-description">Hand-painted clay tagine from Safi, perfect for slow cooking.</p>
                        <div class="product-price">
                            <span class="price">180 MAD</span>
                            <button class="add-cart-btn"><i class="bi bi-cart-plus"></i></button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product 2 -->
            <div class="col-lg-3 col-md-4 col-sm-6 product-item" data-name="beni ourain rug">
                <div class="product-card">
                    <div class="product-image">
                        <img src="https://cdn20.pamono.com/p/g/1/5/1583539_flawf9el2h/vintage-moroccan-beni-ourain-rug-2.jpg" alt="Beni Ourain Rug">
                        <button class="wishlist-btn"><i class="bi bi-heart"></i></button>
                    </div>
                    <div class="product-body">
                        <div class="product-category">Rugs</div>
                        <h6 class="product-title"><a href="#">Beni Ourain Rug</a></h6>
                        <p class="product-description">Authentic wool rug handmade by Berber artisans in the Atlas.</p>
                        <div class="product-price">
                            <span class="price">2,500 MAD</span>
                            <button class="add-cart-btn"><i class="bi bi-cart-plus"></i></button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product 3 -->
            <div class="col-lg-3 col-md-4 col-sm-6 product-item" data-name="leather satchel">
                <div class="product-card">
                    <div class="product-image">
                        <img src="https://images.unsplash.com/photo-1550989460-0adf9ea622e2?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Leather Satchel">
                        <button class="wishlist-btn"><i class="bi bi-heart"></i></button>
                    </div>
                    <div class="product-body">
                        <div class="product-category">Leather</div>
                        <h6 class="product-title"><a href="#">Leather Satchel</a></h6>
                        <p class="product-description">Durable and stylish handcrafted leather bag from Fez tanneries.</p>
                        <div class="product-price">
                            <span class="price">650 MAD</span>
                            <button class="add-cart-btn"><i class="bi bi-cart-plus"></i></button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product 4 -->
            <div class="col-lg-3 col-md-4 col-sm-6 product-item" data-name="silver fibula">
                <div class="product-card">
                    <div class="product-image">
                        <img src="https://images.unsplash.com/photo-1611591437281-460bfbe1220a?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Silver Fibula">
                        <span class="product-badge sale">Sale</span>
                        <button class="wishlist-btn"><i class="bi bi-heart"></i></button>
                    </div>
                    <div class="product-body">
                        <div class="product-category">Jewelry</div>
                        <h6 class="product-title"><a href="#">Silver Fibula</a></h6>
                        <p class="product-description">Traditional Berber silver brooch from Tiznit.</p>
                        <div class="product-price">
                            <span class="price">320 MAD</span>
                            <button class="add-cart-btn"><i class="bi bi-cart-plus"></i></button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product 5 -->
            <div class="col-lg-3 col-md-4 col-sm-6 product-item" data-name="moroccan spices set">
                <div class="product-card">
                    <div class="product-image">
                        <img src="https://images.unsplash.com/photo-1596040033229-a9821ebd058d?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Moroccan Spices Set">
                        <button class="wishlist-btn"><i class="bi bi-heart"></i></button>
                    </div>
                    <div class="product-body">
                        <div class="product-category">Spices</div>
                        <h6 class="product-title"><a href="#">Moroccan Spices Set</a></h6>
                        <p class="product-description">A curated selection of Ras el Hanout, Saffron, and Cumin.</p>
                        <div class="product-price">
                            <span class="price">120 MAD</span>
                            <button class="add-cart-btn"><i class="bi bi-cart-plus"></i></button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product 6 -->
            <div class="col-lg-3 col-md-4 col-sm-6 product-item" data-name="blue fes pottery">
                <div class="product-card">
                    <div class="product-image">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSBW4mYHtmUUVrbzTbTf2Jifwp3McI9uTwWNw&s" alt="Blue Fes Pottery">
                        <button class="wishlist-btn"><i class="bi bi-heart"></i></button>
                    </div>
                    <div class="product-body">
                        <div class="product-category">Pottery</div>
                        <h6 class="product-title"><a href="#">Blue Fes Pottery</a></h6>
                        <p class="product-description">Intricate geometric designs on classic Fessi ceramics.</p>
                        <div class="product-price">
                            <span class="price">240 MAD</span>
                            <button class="add-cart-btn"><i class="bi bi-cart-plus"></i></button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product 7 -->
            <div class="col-lg-3 col-md-4 col-sm-6 product-item" data-name="kilim pillow">
                <div class="product-card">
                    <div class="product-image">
                        <img src="https://akamai-scene7.grandinroad.com/is/image/frontgate/T_Template?$GR_UPDP_Hero_SM$&$src=frontgate/41141_main" alt="Kilim Pillow">
                        <button class="wishlist-btn"><i class="bi bi-heart"></i></button>
                    </div>
                    <div class="product-body">
                        <div class="product-category">Rugs</div>
                        <h6 class="product-title"><a href="#">Kilim Pillow</a></h6>
                        <p class="product-description">Vibrant vintage textile pillow cover.</p>
                        <div class="product-price">
                            <span class="price">200 MAD</span>
                            <button class="add-cart-btn"><i class="bi bi-cart-plus"></i></button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product 8 -->
            <div class="col-lg-3 col-md-4 col-sm-6 product-item" data-name="leather babouches">
                <div class="product-card">
                    <div class="product-image">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRexOKHtJQBuLQTaKctWF5IID0_ETxhndUJkA&s" alt="Leather Babouches">
                        <button class="wishlist-btn"><i class="bi bi-heart"></i></button>
                    </div>
                    <div class="product-body">
                        <div class="product-category">Leather</div>
                        <h6 class="product-title"><a href="#">Leather Babouches</a></h6>
                        <p class="product-description">Traditional Moroccan slippers, yellow and comfortable.</p>
                        <div class="product-price">
                            <span class="price">150 MAD</span>
                            <button class="add-cart-btn"><i class="bi bi-cart-plus"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Simple search script -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('product-search');
    const productItems = document.querySelectorAll('.product-item');
    
    searchInput.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        
        productItems.forEach(item => {
            const productName = item.getAttribute('data-name');
            if (productName.includes(searchTerm)) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    });
});
</script>

<?php include __DIR__ . '/../layaout/footer.php'; ?>