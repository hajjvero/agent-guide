// ================================================
// MOROCCOGUIDE - MAIN JAVASCRIPT
// Optimized for Backend Integration
// ================================================

document.addEventListener('DOMContentLoaded', function() {
  
  // ===== CONFIGURATION =====
  const CONFIG = {
    cartKey: 'moroccoguide_cart',
    wishlistKey: 'moroccoguide_wishlist',
    langKey: 'moroccoguide_lang'
  };

  // ===== NAVBAR SCROLL EFFECT =====
  const navbar = document.querySelector('.glass-nav');
  
  window.addEventListener('scroll', function() {
    if (window.scrollY > 50) {
      navbar?.classList.add('scrolled');
    } else {
      navbar?.classList.remove('scrolled');
    }
  });

  // ===== CART MANAGEMENT =====
  class Cart {
    constructor() {
      this.items = this.load();
      this.updateUI();
    }

    load() {
      const data = localStorage.getItem(CONFIG.cartKey);
      return data ? JSON.parse(data) : [];
    }

    save() {
      localStorage.setItem(CONFIG.cartKey, JSON.stringify(this.items));
    }

    add(product) {
      const existing = this.items.find(item => item.id === product.id);
      
      if (existing) {
        existing.quantity += 1;
      } else {
        this.items.push({
          id: product.id,
          name: product.name,
          price: parseFloat(product.price),
          quantity: 1
        });
      }
      
      this.save();
      this.updateUI();
      showNotification(`${product.name} added to cart!`, 'success');
    }

    remove(productId) {
      this.items = this.items.filter(item => item.id !== productId);
      this.save();
      this.updateUI();
    }

    clear() {
      this.items = [];
      this.save();
      this.updateUI();
    }

    getTotal() {
      return this.items.reduce((sum, item) => sum + (item.price * item.quantity), 0);
    }

    getCount() {
      return this.items.reduce((sum, item) => sum + item.quantity, 0);
    }

    updateUI() {
      const cartBtn = document.querySelector('#cart-btn .cart-count');
      if (cartBtn) {
        cartBtn.textContent = this.getCount();
        
        // Add bounce animation
        cartBtn.style.animation = 'none';
        setTimeout(() => {
          cartBtn.style.animation = 'bounce 0.5s ease';
        }, 10);
      }
    }
  }

  const cart = new Cart();

  // ===== WISHLIST MANAGEMENT =====
  class Wishlist {
    constructor() {
      this.items = this.load();
      this.updateUI();
    }

    load() {
      const data = localStorage.getItem(CONFIG.wishlistKey);
      return data ? JSON.parse(data) : [];
    }

    save() {
      localStorage.setItem(CONFIG.wishlistKey, JSON.stringify(this.items));
    }

    toggle(productId) {
      const index = this.items.indexOf(productId);
      
      if (index > -1) {
        this.items.splice(index, 1);
        this.save();
        this.updateUI();
        return false;
      } else {
        this.items.push(productId);
        this.save();
        this.updateUI();
        return true;
      }
    }

    has(productId) {
      return this.items.includes(productId);
    }

    updateUI() {
      // Update all wishlist buttons
      document.querySelectorAll('.wishlist-btn').forEach(btn => {
        const productId = btn.dataset.productId;
        const icon = btn.querySelector('i');
        
        if (this.has(productId)) {
          icon.classList.remove('bi-heart');
          icon.classList.add('bi-heart-fill');
        } else {
          icon.classList.remove('bi-heart-fill');
          icon.classList.add('bi-heart');
        }
      });
    }
  }

  const wishlist = new Wishlist();

  // ===== ADD TO CART BUTTONS =====
  document.querySelectorAll('.add-cart-btn').forEach(button => {
    button.addEventListener('click', function(e) {
      e.stopPropagation();
      e.preventDefault();
      
      const product = {
        id: this.dataset.productId,
        name: this.dataset.productName,
        price: this.dataset.productPrice
      };
      
      // Visual feedback
      const originalHTML = this.innerHTML;
      this.innerHTML = '<i class="bi bi-check-lg"></i>';
      this.style.background = 'var(--green)';
      
      setTimeout(() => {
        this.innerHTML = originalHTML;
        this.style.background = '';
      }, 1500);
      
      cart.add(product);
    });
  });

  // ===== WISHLIST BUTTONS =====
  document.querySelectorAll('.wishlist-btn').forEach(button => {
    button.addEventListener('click', function(e) {
      e.stopPropagation();
      e.preventDefault();
      
      const productId = this.dataset.productId;
      const isAdded = wishlist.toggle(productId);
      
      if (isAdded) {
        showNotification('Added to wishlist! ❤️', 'success');
      } else {
        showNotification('Removed from wishlist', 'info');
      }
    });
  });

  // ===== PRODUCT CARD CLICKS =====
  document.querySelectorAll('.product-card').forEach(card => {
    card.addEventListener('click', function(e) {
      // Only navigate if not clicking buttons
      if (!e.target.closest('.add-cart-btn') && !e.target.closest('.wishlist-btn')) {
        const link = this.querySelector('.product-title a');
        if (link) {
          window.location.href = link.href;
        }
      }
    });
  });

  // ===== FILTER FUNCTIONALITY =====
  const filterButtons = document.querySelectorAll('.filter-btn[data-filter]');
  const productCards = document.querySelectorAll('[data-category]');
  
  filterButtons.forEach(button => {
    button.addEventListener('click', function(e) {
      e.preventDefault();
      
      // Update active state
      filterButtons.forEach(btn => btn.classList.remove('active'));
      this.classList.add('active');
      
      const filterValue = this.getAttribute('data-filter');
      
      // Filter products
      productCards.forEach(card => {
        const category = card.getAttribute('data-category');
        
        if (filterValue === 'all' || category === filterValue) {
          card.style.display = 'block';
          setTimeout(() => {
            card.style.opacity = '1';
            card.style.transform = 'scale(1)';
          }, 10);
        } else {
          card.style.opacity = '0';
          card.style.transform = 'scale(0.8)';
          setTimeout(() => {
            card.style.display = 'none';
          }, 300);
        }
      });
    });
  });

  // ===== NOTIFICATION SYSTEM =====
  function showNotification(message, type = 'info') {
    // Remove existing notification
    const existing = document.querySelector('.notification');
    if (existing) {
      existing.remove();
    }
    
    // Create notification
    const notification = document.createElement('div');
    notification.className = `notification notification-${type}`;
    notification.textContent = message;
    
    // Style notification
    Object.assign(notification.style, {
      position: 'fixed',
      top: '100px',
      right: '20px',
      background: type === 'success' ? 'var(--green)' : 
                  type === 'error' ? 'var(--red)' : 
                  'var(--gold)',
      color: '#fff',
      padding: '15px 25px',
      borderRadius: '30px',
      boxShadow: '0 8px 20px rgba(0,0,0,0.3)',
      zIndex: '10000',
      fontWeight: '500',
      animation: 'slideInRight 0.5s ease',
      maxWidth: '300px',
      fontSize: '0.95rem'
    });
    
    document.body.appendChild(notification);
    
    // Auto remove
    setTimeout(() => {
      notification.style.animation = 'slideOutRight 0.5s ease';
      setTimeout(() => notification.remove(), 500);
    }, 3000);
  }

  // Make globally available
  window.showNotification = showNotification;

  // ===== NEWSLETTER FORM =====
  const newsletterForms = document.querySelectorAll('#newsletter-form, .newsletter-form');
  
  newsletterForms.forEach(form => {
    form.addEventListener('submit', function(e) {
      e.preventDefault();
      
      const emailInput = this.querySelector('input[type="email"]');
      const email = emailInput.value.trim();
      
      if (email && isValidEmail(email)) {
        // Here you would typically send to backend
        // For now, just show success message
        showNotification('Thank you for subscribing! 📧', 'success');
        emailInput.value = '';
      } else {
        showNotification('Please enter a valid email address', 'error');
      }
    });
  });

  // ===== EMAIL VALIDATION =====
  function isValidEmail(email) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
  }

  // ===== SMOOTH SCROLL =====
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
      const target = document.querySelector(this.getAttribute('href'));
      if (target) {
        e.preventDefault();
        target.scrollIntoView({
          behavior: 'smooth',
          block: 'start'
        });
      }
    });
  });

  // ===== LAZY LOAD IMAGES =====
  const images = document.querySelectorAll('img[data-src]');
  
  const imageObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const img = entry.target;
        img.src = img.dataset.src;
        img.removeAttribute('data-src');
        imageObserver.unobserve(img);
      }
    });
  });
  
  images.forEach(img => imageObserver.observe(img));

  // ===== LANGUAGE SWITCHER =====
  const langLinks = document.querySelectorAll('.dropdown-menu a[href^="?lang="]');
  
  langLinks.forEach(link => {
    link.addEventListener('click', function(e) {
      const lang = new URL(this.href, window.location.origin).searchParams.get('lang');
      localStorage.setItem(CONFIG.langKey, lang);
    });
  });

  // ===== WHATSAPP INTEGRATION =====
  document.querySelectorAll('[data-whatsapp]').forEach(btn => {
    btn.addEventListener('click', function() {
      const number = this.dataset.whatsapp;
      const message = this.dataset.message || 'Hello, I am interested in your service';
      const url = `https://wa.me/${number}?text=${encodeURIComponent(message)}`;
      window.open(url, '_blank');
    });
  });

  // ===== CONSOLE BRANDING =====
  console.log(
    '%c🇲🇦 MoroccoGuide',
    'color: #c9a24d; font-size: 24px; font-weight: bold;'
  );
  console.log(
    '%cYour complete guide to Morocco',
    'color: #006233; font-size: 14px;'
  );

});

// ===== ADD CSS ANIMATIONS =====
const styleSheet = document.createElement('style');
styleSheet.textContent = `
  @keyframes bounce {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-5px); }
  }
  
  @keyframes slideInRight {
    from {
      transform: translateX(400px);
      opacity: 0;
    }
    to {
      transform: translateX(0);
      opacity: 1;
    }
  }
  
  @keyframes slideOutRight {
    from {
      transform: translateX(0);
      opacity: 1;
    }
    to {
      transform: translateX(400px);
      opacity: 0;
    }
  }
  
  .product-card,
  .city-card,
  .activity-card {
    transition: opacity 0.3s ease, transform 0.3s ease;
  }
`;
document.head.appendChild(styleSheet);