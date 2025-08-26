const productDetails = {

    'mangorind-spicy': {
        name: 'Mangorind Candy Spicy',
        image: 'mangorind_candy_spicy.png',
        description: 'Turn up the heat with our Mangorind Candy Spicy Flavor, a bold twist on your Parolas favorite! Made with the rich pulp of tamarind, blended sugar, and strips of sweet dried mangoes, this version packs a fiery kick of labuyo chili pepper—perfect for those who crave a little adventure in every bite. The irresistible balance of sweet, tangy, and spicy creates an exciting burst of flavors that lingers, making it the ultimate treat for thrill-seekers, pasalubong hunters, and candy lovers alike. Experience Guimaras like never before—grab your pack of Parolas Guimaras Mangorind Spicy Candy today and taste the heat of paradise!',
        weight: '',
        price: '₱100',
        award: null,
        qty: 10,

    },


    'mangorind-plain': {
        name: 'Mangorind Candy',
        image: 'mangorind_candy_plain.png',
        description: 'PAROLAS Mango Puffed Rice with Cashew Nuts is a delightful snack that combines the sweet and tangy flavor of mango with the light and crispy texture of puffed rice and luscious taste of cashew nuts. It is a perfect blend of sweet and savory flavors that make it an irresistible treat for anyone who loves a tasty snack!',
        weight: '',
        price: '₱100',
        award: null,
        qty: 10,

    },


    'mangorind-puffed-rice': {
        name: 'Mango Puffed Rice',
        image: 'mango_ruffed_rice.png',
        description: 'Crunchy pretzel sticks coated with our signature mango glaze. The perfect combination of salty and sweet that makes for an irresistible snack.',
        weight: '',
        price: '₱100',
        award: "Customer's Choice Award 2024",
        qty: 10,

    },

    'mango-serafina-big': {
        name: 'Mango Serafina',
        image: 'mango_serafina_big.png',
        description: 'Mango Serafina is consist of crispy bite-sized dough balls that are expertly deep-fried until golden brown then coated with caramelized sugar and Guimaras mangoes. They are finished off with a dusting of white sugar, creating a doubly satisfying and irresistibly delicious snack that will leave you craving for more!',
        weight: '180g',
        price: '₱100',
        qty: null,
        award: null,

    },


};


document.addEventListener('DOMContentLoaded', function () {



    const productModal = document.getElementById("productModal");
    document.querySelectorAll("[data-bs-toggle='modal']").forEach(button => {
        button.addEventListener("click", function () {
            const title = this.getAttribute("data-title");
            const description = this.getAttribute("data-description");
            const image = this.getAttribute("data-image");
            const price = this.getAttribute("data-price");

            console.log('Button clicked:', title, description, image, price);

            if (productModal) {
                productModal.querySelector(".modal-title").textContent = title;
                productModal.querySelector("#productModalImage").src = image;
                productModal.querySelector("#productModalDescription").textContent = description;
                productModal.querySelector("#productModalPrice").innerHTML = price;
            }
        });
    });


    document.addEventListener('DOMContentLoaded', function () {
        console.log('DOM loaded, tabs should be functional');

        // Add event listeners for debugging
        const tabs = document.querySelectorAll('[data-bs-toggle="tab"]');
        tabs.forEach(tab => {
            tab.addEventListener('click', function () {
                console.log('Tab clicked:', this.getAttribute('data-bs-target'));
            });
        });
    });



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
