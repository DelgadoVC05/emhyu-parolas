const productDetails = {

    'mangorind': {
        name: 'Mangorind Candy Spicy',
        image: 'mangrind_candy_spicy.png',
        description: 'Turn up the heat with our Mangorind Candy Spicy Flavor, a bold twist on your Parolas favorite! Made with the rich pulp of tamarind, blended sugar, and strips of sweet dried mangoes, this version packs a fiery kick of labuyo chili pepper—perfect for those who crave a little adventure in every bite. The irresistible balance of sweet, tangy, and spicy creates an exciting burst of flavors that lingers, making it the ultimate treat for thrill-seekers, pasalubong hunters, and candy lovers alike. Experience Guimaras like never before—grab your pack of Parolas Guimaras Mangorind Spicy Candy today and taste the heat of paradise!',
        ingredients: null,
        weight: '10 pcs',
        shelfLife: null,
        price: '₱110',
        award: null,
        features: null,
    },


    'mangorind': {
        name: 'Mangorind Candy',
        image: '',
        description: 'A delightful fusion of mango sweetness and tamarind tanginess in candy form. This innovative treat combines two beloved Filipino flavors into one irresistible confection.',
        ingredients: null,
        weight: '10 pcs',
        shelfLife: null,
        price: '₱110',
        award: null,
        features: null,
    },


    'calamansi': {
        name: 'Calamansi Serafina',
        image: '',
        description: 'Experience the zesty, citrusy flavor of Filipino calamansi in every bite. This refreshing treat offers a perfect balance of sweet and tangy flavors.',
        ingredients: 'Premium flour, fresh calamansi juice, sugar, eggs, butter, natural citrus extract',
        weight: '250g per pack',
        shelfLife: '30 days from production date',
        price: '₱140',
        award: 'Best Seller - 3 consecutive months',
        features: ['Fresh calamansi flavor', 'Vitamin C enriched', 'Refreshing taste', 'Natural citrus goodness']
    },
    'pretzel-sticks': {
        name: 'Mango Glazed Pretzel Sticks',
        image: '',
        description: 'Crunchy pretzel sticks coated with our signature mango glaze. The perfect combination of salty and sweet that makes for an irresistible snack.',
        ingredients: 'Wheat flour, mango glaze, salt, yeast, vegetable oil, mango extract',
        weight: '200g per pack',
        shelfLife: '45 days from production date',
        price: '₱120',
        award: "Customer's Choice Award 2024",
        features: ['Crunchy texture', 'Sweet and salty combination', 'Perfect snack size', 'Great for sharing']
    },
    'dragon-fruit': {
        name: 'Dragon Fruit Serafina',
        image: '',
        description: 'An exotic treat featuring the unique flavor of dragon fruit. This colorful and flavorful serafina offers a taste adventure with every bite.',
        ingredients: 'Premium flour, dragon fruit extract, sugar, eggs, butter, natural coloring',
        weight: '250g per pack',
        shelfLife: '30 days from production date',
        price: '₱160',
        award: null,
        features: ['Exotic dragon fruit flavor', 'Unique taste experience', 'Natural fruit extracts', 'Eye-catching appearance']
    },
    'mango-classic': {
        name: 'Mango Serafina (Classic)',
        image: '',
        description: 'Our classic mango serafina recipe that has been perfected over the years. Made with the finest Guimaras mangoes for an authentic taste experience.',
        ingredients: 'Premium flour, pure mango puree, sugar, eggs, butter, vanilla extract',
        weight: '250g per pack',
        shelfLife: '30 days from production date',
        price: '₱145',
        award: null,
        features: ['Classic recipe', 'Pure mango flavor', 'Traditional preparation', 'Family favorite']
    },
    'original': {
        name: 'Original Serafina',
        image: '',
        description: 'Our time-tested original serafina recipe that started it all. Made with traditional methods passed down through generations, this classic treat embodies the authentic taste of Guimaras.',
        ingredients: 'Premium flour, traditional spices, sugar, eggs, butter, vanilla extract',
        weight: '250g per pack',
        shelfLife: '30 days from production date',
        price: '₱135',
        award: 'Heritage Recipe - Traditional Favorite',
        features: ['Original family recipe', 'Traditional preparation methods', 'Time-tested flavor', 'Heritage favorite']
    },


};




// Show product details modal
function showProductDetails(productId) {
    const product = productDetails[productId];
    if (!product) return;

    const modalBody = document.getElementById('modalBody');
    modalBody.innerHTML = `
    <div class="row">
        <div class="col-md-4">
            <div class="product-image mb-3" style="height: 200px; border-radius: 15px; display: flex; align-items: center; justify-content: center; position: relative;">
              
                <div class="product-bag">
                    <img src="${path}${product.image}" style="object-fit:contain; width:70%;"/>
                </div>
            </div>
            <div class="text-center">
                <h4 class="text-success fw-bold">${product.price}</h4>
                ${product.award ? `<div class="alert alert-warning p-2 mt-2" style="font-size: 0.85rem; background-color:#ffffff;"><i class="fas fa-trophy text-warning me-1"></i><strong>${product.award}</strong></div>` : ''}
            </div>
        </div>
        <div class="col-md-8">
            <h4 class="fw-bold mb-3" style="color: var(--accent-color)">${product.name}</h4>
            <p class="mb-3">${product.description}</p>

            <div class="row mb-3">
                <div class="col-sm-6">
                    <strong>Weight:</strong> ${product.weight}
                </div>
                <div class="col-sm-6">
                    <strong>Shelf Life:</strong> ${product.shelfLife}
                </div>
            </div>

            <div class="mb-3">
                <strong>Ingredients:</strong><br>
                    <small class="text-muted">${product.ingredients}</small>
            </div>

            <div class="mb-3">
                <strong>Special Features:</strong>
                <ul class="list-unstyled mt-2">
                    ${product.features.map(feature => `<li><i class="fas fa-check text-success me-2"></i>${feature}</li>`).join('')}
                </ul>
            </div>
        </div>
    </div>
    `;

    document.getElementById('productModalLabel').textContent = product.name;
    const modal = new bootstrap.Modal(document.getElementById('productModal'));
    modal.show();
}



document.addEventListener('DOMContentLoaded', function () {




    window.addEventListener('scroll', function () {
        const navbar = document.querySelector('.header');
        if (window.scrollY > 50) {
            navbar.style.background = 'rgba(255,255,255,0.98)';
            navbar.style.boxShadow = '0 2px 20px rgba(0,0,0,0.1)';
            navbar.style.transform = 'translateY(0)';
        } else {
            navbar.style.background = 'none';
            navbar.style.boxShadow = 'none';
        }
    });

    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry, index) => {
            if (entry.isIntersecting) {
                setTimeout(() => {
                    entry.target.classList.add('animate');
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }, index * 150);
            }
        });
    }, observerOptions);

    // Observe all product cards
    document.querySelectorAll('.product-card').forEach(card => {
        observer.observe(card);
    });



    /**
      * Mobile nav toggle
      */
    const mobileNavToggleBtn = document.querySelector('.mobile-nav-toggle');

    function mobileNavToogle() {
        document.querySelector('body').classList.toggle('mobile-nav-active');
        mobileNavToggleBtn.classList.toggle('bi-list');
        mobileNavToggleBtn.classList.toggle('bi-x');
    }
    mobileNavToggleBtn.addEventListener('click', mobileNavToogle);

    /**
     * Hide mobile nav on same-page/hash links
     */
    document.querySelectorAll('#navmenu a').forEach(navmenu => {
        navmenu.addEventListener('click', () => {
            if (document.querySelector('.mobile-nav-active')) {
                mobileNavToogle();
            }
        });

    });

    /**
       * Toggle mobile nav dropdowns
       */
    document.querySelectorAll('.navmenu .toggle-dropdown').forEach(navmenu => {
        navmenu.addEventListener('click', function (e) {
            e.preventDefault();
            this.parentNode.classList.toggle('active');
            this.parentNode.nextElementSibling.classList.toggle('dropdown-active');
            e.stopImmediatePropagation();
        });
    });




    // Play when modal opens
    videoModal.addEventListener('shown.bs.modal', function () {
        storyVideo.play();
    });

    // Pause and reset when modal closes
    videoModal.addEventListener('hidden.bs.modal', function () {
        storyVideo.pause();
        storyVideo.currentTime = 0;
    });


    const glightbox = GLightbox({
        selector: '.glightbox'
    });


    function aosInit() {
        AOS.init({
            duration: 600,
            easing: 'ease-in-out',
            once: true,
            mirror: false
        });
    }
    window.addEventListener('load', aosInit);


    function initSwiper() {
        document.querySelectorAll(".init-swiper").forEach(function (swiperElement) {
            let config = JSON.parse(
                swiperElement.querySelector(".swiper-config").innerHTML.trim()
            );

            if (swiperElement.classList.contains("swiper-tab")) {
                initSwiperWithCustomPagination(swiperElement, config);
            } else {
                new Swiper(swiperElement, config);
            }
        });
    }

    window.addEventListener("load", initSwiper);


    /**
      * Correct scrolling position upon page load for URLs containing hash links.
      */
    window.addEventListener('load', function (e) {
        if (window.location.hash) {
            if (document.querySelector(window.location.hash)) {
                setTimeout(() => {
                    let section = document.querySelector(window.location.hash);
                    let scrollMarginTop = getComputedStyle(section).scrollMarginTop;
                    window.scrollTo({
                        top: section.offsetTop - parseInt(scrollMarginTop),
                        behavior: 'smooth'
                    });
                }, 100);
            }
        }
    });


    /**
     * Navmenu Scrollspy
     */
    let navmenulinks = document.querySelectorAll('.navmenu a');

    function navmenuScrollspy() {
        navmenulinks.forEach(navmenulink => {
            if (!navmenulink.hash) return;
            let section = document.querySelector(navmenulink.hash);
            if (!section) return;
            let position = window.scrollY + 200;
            if (position >= section.offsetTop && position <= (section.offsetTop + section.offsetHeight)) {
                document.querySelectorAll('.navmenu a.active').forEach(link => link.classList.remove('active'));
                navmenulink.classList.add('active');
            } else {
                navmenulink.classList.remove('active');
            }
        })
    }
    window.addEventListener('load', navmenuScrollspy);
    document.addEventListener('scroll', navmenuScrollspy);


    const tabBtns = document.querySelectorAll('.tab-btn');
    const tabContents = document.querySelectorAll('.tab-content');

    tabBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            // Remove active class from all buttons and contents
            tabBtns.forEach(b => b.classList.remove('active'));
            tabContents.forEach(content => content.classList.remove('active'));

            // Add active class to clicked button and corresponding content
            btn.classList.add('active');
            const tabId = btn.getAttribute('data-tab');
            document.getElementById(tabId).classList.add('active');
        });
    });





});
