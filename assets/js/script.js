

document.addEventListener('DOMContentLoaded', function () {

    document.querySelectorAll('#productTabs button[data-bs-toggle="tab"]').forEach(triggerEl => {
        triggerEl.addEventListener('click', function (e) {
            e.preventDefault();
            const tab = new bootstrap.Tab(triggerEl);
            tab.show();
        });
    });

    const modal = document.getElementById('productModal');
    const buttons = document.querySelectorAll('[data-bs-target="#productModal"]');

    buttons.forEach(function (button) {
        button.addEventListener('click', function () {
            // Get data from button attributes
            const title = this.getAttribute('data-title');
            const description = this.getAttribute('data-description');
            const image = this.getAttribute('data-image');
            const price = this.getAttribute('data-price');
            const weight = this.getAttribute('data-weight');
            const award = this.getAttribute('data-award');

            // Populate modal
            document.getElementById('productModalLabel').textContent = title;
            document.getElementById('productModalDescription').innerHTML = description;
            document.getElementById('productModalImage').src = image;
            document.getElementById('productModalPrice').innerHTML = price;
            document.getElementById('productModalWeight').textContent = weight;

            // Handle award badge
            const awardBadge = document.getElementById('productModalAward');
            if (award && award.trim() !== '') {
                awardBadge.style.display = 'block';
                awardBadge.querySelector('span').textContent = award;
            } else {
                awardBadge.style.display = 'none';
            }
        });
    });

    // Tab switching animation
    const tabLinks = document.querySelectorAll('#productTabs button[data-bs-toggle="pill"]');

    tabLinks.forEach(function (tabLink) {
        tabLink.addEventListener('click', function () {
            const targetPane = document.querySelector(this.getAttribute('data-bs-target'));
            targetPane.style.opacity = '0.5';

            setTimeout(function () {
                targetPane.style.opacity = '1';
            }, 300);
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


