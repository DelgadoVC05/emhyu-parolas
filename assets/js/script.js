

document.addEventListener('DOMContentLoaded', function () {


    const lightbox = GLightbox({
        selector: '.glightbox',
        touchNavigation: true,
        loop: true,
        closeButton: true
    });


    videoModal.addEventListener('shown.bs.modal', function () {
        storyVideo.play();
    });

    // Pause and reset when modal closes
    videoModal.addEventListener('hidden.bs.modal', function () {
        storyVideo.pause();
        storyVideo.currentTime = 0;
    });






    gsap.registerPlugin(ScrollTrigger);

    gsap.from(".fade-in", {
        opacity: 0,
        y: 50,
        duration: 1,
        scrollTrigger: {
            trigger: ".fade-in",
            start: "top 80%",
        }
    });


    // Hero Page Carousel

    gsap.utils.toArray(".carousel-item img").forEach((img, i) => {
        gsap.from(img, {
            opacity: 0,
            scale: 0.9,
            duration: 1,
            delay: i * 0.2, // stagger each slide
            scrollTrigger: {
                trigger: img,
                start: "top 85%",
                toggleActions: "play none none reverse",
            }
        });
    });


    // Animate Section Title
    gsap.from("#choose-parolas .section-title", {
        opacity: 0,
        y: 40,
        duration: 1,
        ease: "power3.out",
        scrollTrigger: {
            trigger: "#choose-parolas .section-title",
            start: "top 85%"
        }
    });

    // Animate Feature Icons (bounce effect)
    gsap.utils.toArray("#choose-parolas .feature-icon i").forEach((icon, i) => {
        gsap.from(icon, {
            scale: 0,
            opacity: 0,
            duration: 0.8,
            delay: i * 0.2, // stagger each icon
            ease: "back.out(1.7)",
            scrollTrigger: {
                trigger: icon,
                start: "top 90%",
                toggleActions: "play none none reverse"
            }
        });
    });


    //Hero button

    gsap.from(".heroBtn button", {
        opacity: 0,
        y: 40,
        duration: 0.8,
        stagger: 0.2,
        ease: "power2.out"
    });



    const heroButtons = document.querySelectorAll(".heroBtn button");
    heroButtons.forEach(btn => {
        btn.addEventListener("mouseenter", () => {
            gsap.to(btn, { scale: 1.05, duration: 0.2, ease: "power1.out" });
        });
        btn.addEventListener("mouseleave", () => {
            gsap.to(btn, { scale: 1, duration: 0.2, ease: "power1.out" });
        });
    });

    // Animate Headings + Paragraphs
    gsap.from("#choose-parolas h4, #choose-parolas p", {
        opacity: 0,
        y: 30,
        duration: 0.8,
        stagger: 0.2,
        scrollTrigger: {
            trigger: "#choose-parolas",
            start: "top 80%"
        }
    });


    //About

    // Animate About Content (slide in from left)
    gsap.from("#about .heritage-content", {
        opacity: 0,
        x: -50,
        duration: 1,
        ease: "power3.out",
        scrollTrigger: {
            trigger: "#about .heritage-content",
            start: "top 80%",
            toggleActions: "play none none reverse"
        }
    });

    // Animate About Image (zoom in)
    gsap.from("#about .about-img img", {
        opacity: 0,
        scale: 0.8,
        duration: 1,
        delay: 0.2,
        ease: "power2.out",
        scrollTrigger: {
            trigger: "#about .about-img",
            start: "top 85%",
            toggleActions: "play none none reverse"
        }
    });

    // Animate Heritage Quote (fade up delayed)
    gsap.from("#about .heritage-quote", {
        opacity: 0,
        y: 30,
        duration: 0.8,
        delay: 0.4,
        ease: "power2.out",
        scrollTrigger: {
            trigger: "#about .heritage-quote",
            start: "top 85%",
            toggleActions: "play none none reverse"
        }
    });

    // Title animation (fade up)
    gsap.from(".our-story .section-title", {
        opacity: 0,
        y: 40,
        duration: 1,
        ease: "power2.out",
        scrollTrigger: {
            trigger: ".our-story .section-title",
            start: "top 85%"
        }
    });

    // Timeline items (stagger fade from left)
    gsap.from(".our-story .timeline-item", {
        opacity: 0,
        x: -50,
        duration: 1,
        stagger: 0.3,
        ease: "power3.out",
        scrollTrigger: {
            trigger: ".our-story .timeline-item",
            start: "top 80%",
            toggleActions: "play none none reverse"
        }
    });

    // Story highlight quote (zoom in)
    gsap.from(".our-story .story-highlight", {
        opacity: 0,
        scale: 0.8,
        duration: 1,
        ease: "back.out(1.7)",
        scrollTrigger: {
            trigger: ".our-story .story-highlight",
            start: "top 85%"
        }
    });

    // Achievement cards (stagger bounce in)
    gsap.from(".our-story .achievement-card", {
        opacity: 0,
        y: 50,
        duration: 0.8,
        stagger: 0.2,
        ease: "bounce.out",
        scrollTrigger: {
            trigger: ".our-story .achievement-cards",
            start: "top 90%"
        }
    });

    // Animate Vision, Mission, Commitment cards
    gsap.from(".vmv-card", {
        scrollTrigger: {
            trigger: ".vmv-card",
            start: "top 85%",
        },
        y: 50,
        opacity: 0,
        duration: 0.8,
        stagger: 0.2,
        ease: "power2.out"
    });

    // Animate Core Values list (left column)
    gsap.from(".values-list .value-item", {
        scrollTrigger: {
            trigger: ".values-list",
            start: "top 80%",
        },
        x: -80,
        opacity: 0,
        duration: 0.7,
        stagger: 0.2,
        ease: "power3.out"
    });

    // Animate Business Practices list (right column)
    gsap.from(".business-list .business-item", {
        scrollTrigger: {
            trigger: ".business-list",
            start: "top 80%",
        },
        x: 80,
        opacity: 0,
        duration: 0.7,
        stagger: 0.2,
        ease: "power3.out"
    });




    gsap.from(".fade-title", {
        scrollTrigger: { trigger: ".fade-title", start: "top 90%" },
        y: 40,
        opacity: 0,
        duration: 0.8,
        ease: "power3.out"
    });


    // Blog Cards 
    gsap.utils.toArray(".fade-card").forEach((card, i) => {
        gsap.from(card, {
            scrollTrigger: {
                trigger: card,
                start: "top 85%",
            },
            y: 50,
            opacity: 0,
            duration: 0.6,
            delay: i * 0.1,
            ease: "power2.out"
        });
    });

    // Pagination
    gsap.from(".fade-pagination", {
        scrollTrigger: { trigger: ".fade-pagination", start: "top 90%" },
        y: 30,
        opacity: 0,
        duration: 0.7,
        ease: "power2.out"
    });


    //Gallery Page
    // Animate each gallery item
    gsap.utils.toArray(".gallery-item").forEach((item, i) => {
        gsap.from(item, {
            opacity: 0,
            y: 50,
            duration: 0.8,
            delay: i * 0.1,
            ease: "power2.out",
            scrollTrigger: {
                trigger: item,
                start: "top 90%",
            }
        });
    });



    /*
     Contact Page 
    
    Animate contact info (slide in from right) */
    gsap.from(".fade-info", {
        opacity: 0,
        x: 80,
        duration: 1,
        scrollTrigger: {
            trigger: ".fade-info",
            start: "top 85%"
        }
    });

    // Animate contact form (slide in from left)
    gsap.from(".fade-form", {
        opacity: 0,
        x: -80,
        duration: 1,
        scrollTrigger: {
            trigger: ".fade-form",
            start: "top 85%"
        }
    });

    // Animate map fade-up
    gsap.from(".fade-map", {
        opacity: 0,
        y: 60,
        duration: 1,
        scrollTrigger: {
            trigger: ".fade-map",
            start: "top 90%"
        }
    });


    //Awards and Certificate Page
    gsap.from(".certificate-card", {
        scrollTrigger: {
            trigger: ".certificate-card",
            start: "top 80%",
        },
        opacity: 0,
        y: 50,
        duration: 1,
        stagger: 0.2,
        ease: "power3.out"
    });

    const counters = document.querySelectorAll(".stat-number");
    counters.forEach(counter => {
        let finalValue = +counter.dataset.count;
        ScrollTrigger.create({
            trigger: counter,
            start: "top 85%",
            onEnter: () => {
                gsap.fromTo(counter,
                    { innerText: 0 },
                    {
                        innerText: finalValue,
                        duration: 2,
                        snap: { innerText: 1 },
                        ease: "power1.out",
                        onUpdate: function () {
                            counter.innerText = Math.floor(counter.innerText);
                        }
                    }
                );
            },
            once: true
        });
    });




    //Footer

    gsap.from("footer", {
        y: 80,
        opacity: 0,
        duration: 1.2,
        ease: "power2.out",
        scrollTrigger: {
            trigger: "footer",
            start: "top 95%",
        }
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
            document.getElementById('productModalImage').src = image || '../assets/image/default-product.png';
            document.getElementById('productModalPrice').innerHTML = price;
            document.getElementById('productModalWeight').innerHTML = `${weight ? weight + ' ' + 'grams ' : 'N/A'} `;

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

        const navbar = document.getElementById('header');
        if (!navbar) return;

        if (window.scrollY > 50) {
            navbar.style.background = 'rgba(255,255,255,0.98)';
            navbar.style.boxShadow = '0 2px 20px rgba(0,0,0,0.1)';
        } else {
            navbar.style.background = 'transparent';
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


    const mobileNavToggleBtn = document.querySelector('.mobile-nav-toggle');

    if (mobileNavToggleBtn) {
        function mobileNavToogle() {
            document.body.classList.toggle('mobile-nav-active');
            mobileNavToggleBtn.classList.toggle('bi-list');
            mobileNavToggleBtn.classList.toggle('bi-x');
        }

        mobileNavToggleBtn.addEventListener('click', mobileNavToogle);

        // Hide nav on same-page/hash links
        document.querySelectorAll('#navmenu a').forEach(navmenu => {
            navmenu.addEventListener('click', () => {
                if (document.querySelector('.mobile-nav-active')) {
                    mobileNavToogle();
                }
            });
        });
    }



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

    document.querySelectorAll('.blog-card-image img.card-img').forEach(img => {
        img.onload = function () {
            if (img.naturalHeight > img.naturalWidth) {
                img.style.objectFit = 'contain';
            } else {
                img.style.objectFit = 'cover';
            }
        };
    });





});




