<?php get_header(); ?>
  
<section id="certificate" class="certificate py-5">
    <div class="container">
        <div class="section-title mt-5" data-aos="fade-up">
            <h2 class="display-5 fw-bold mb-4">Certificates & Awards</h2>
            <p class="sub-title">Recognition of excellence and innovation in our field</p>
        </div>
        
        <!-- Awards Grid -->
        <div class="row g-4" data-aos="fade-up" data-aos-delay="200">
            <!-- FDA License Certificate -->
            <div class="col-lg-6 col-md-6">
                <div class="certificate-card h-100">
                    <div class="award-badge-certificate">Official License</div>
                    <div class="certificate-image has-image">
                        <a class="glightbox" data-gallery="fdal" href="<?php echo get_template_directory_uri(); ?>/assets/images/certificate_award/fda.png" 
                        >
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/certificate_award/fda.png" alt="FDA License to Operate Certificate" class="award-image"
                                 onerror="this.style.display='none'; this.parentElement.classList.remove('has-image'); this.parentElement.innerHTML='<i class=\'fas fa-certificate award-icon\'></i>';">
                            <div class="ca-image-overlay">
                                <i class="fas fa-search-plus me-2"></i> View Certificate
                            </div>
                        </a>
                    </div>
                    <div class="certificate-content">
                        <div class="award-category">Government License</div>
                        <h3 class="award-title">FDA License to Operate</h3>
                        <p class="award-description">
                            Official license from the Food and Drug Administration authorizing our facility to 
                            manufacture and distribute food products with full compliance to safety standards.
                        </p>
                        <span class="award-year">2025</span>
                    </div>
                </div>
            </div>

            <!-- Most Innovative Award -->
            <div class="col-lg-6 col-md-6">
                <div class="certificate-card h-100">
                    <div class="award-badge-certificate">Featured</div>
                    <div class="certificate-image has-image">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#innovativeModal">
                            <img src="img/innovative-award.jpg" alt="Most Innovative Product Award" class="award-image"
                                 onerror="this.style.display='none'; this.parentElement.classList.remove('has-image'); this.parentElement.innerHTML='<i class=\'fas fa-trophy award-icon\'></i>';">
                            <div class="ca-image-overlay">
                                <i class="fas fa-search-plus me-2"></i> View Certificate
                            </div>
                        </a>
                    </div>
                    <div class="certificate-content">
                        <div class="award-category">Innovation Excellence</div>
                        <h3 class="award-title">Most Innovative Product</h3>
                        <p class="award-description">
                            Recognized for our Calmavron (Calamansi + Mango Polvoron) - a revolutionary fusion 
                            that celebrates the unique flavors of Guimaras.
                        </p>
                        <span class="award-year">2024</span>
                    </div>
                </div>
            </div>

            <!-- Best Promising Product -->
            <div class="col-lg-6 col-md-6">
                <div class="certificate-card h-100">
                    <div class="certificate-image has-image">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#promisingModal">
                            <img src="img/promising-product.jpg" alt="Most Promising Product Award" class="award-image"
                                 onerror="this.style.display='none'; this.parentElement.classList.remove('has-image'); this.parentElement.innerHTML='<i class=\'fas fa-medal award-icon\'></i>';">
                            <div class="ca-image-overlay">
                                <i class="fas fa-search-plus me-2"></i> View Certificate
                            </div>
                        </a>
                    </div>
                    <div class="certificate-content">
                        <div class="award-category">Product Excellence</div>
                        <h3 class="award-title">Most Promising Product</h3>
                        <p class="award-description">
                            Awarded at DA-AMAD VI Aspire and Kapistahan sa Capiz 2024 for our innovative 
                            approach to traditional Filipino delicacies.
                        </p>
                        <span class="award-year">2024</span>
                    </div>
                </div>
            </div>

            <!-- Media Recognition -->
            <div class="col-lg-6 col-md-6">
                <div class="certificate-card h-100">
                    <div class="certificate-image has-image">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#mediaModal">
                            <img src="img/media-recognition.jpg" alt="GMA Media Recognition" class="award-image"
                                 onerror="this.style.display='none'; this.parentElement.classList.remove('has-image'); this.parentElement.innerHTML='<i class=\'fas fa-tv award-icon\'></i>';">
                            <div class="ca-image-overlay">
                                <i class="fas fa-search-plus me-2"></i> View Certificate
                            </div>
                        </a>
                    </div>
                    <div class="certificate-content">
                        <div class="award-category">Media Coverage</div>
                        <h3 class="award-title">GMA Media Recognition</h3>
                        <p class="award-description">
                            Featured on GMA's Kapuso Mo Jessica Soho and Byahe Ni Drew, earning accolades 
                            for our delectable blend of taste and uniqueness.
                        </p>
                        <span class="award-year">2017</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Statistics Section -->
        <div class="certificate-stats mb-5" data-aos="fade-up" data-aos-delay="400">
            <div class="row">
                <div class="col-md-3 col-6">
                    <div class="stat-item">
                        <span class="stat-number" data-count="4">0</span>
                        <div class="stat-label">Awards Won</div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-item">
                        <span class="stat-number" data-count="9">0</span>
                        <div class="stat-label">Years Running</div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-item">
                        <span class="stat-number" data-count="100">0</span>
                        <div class="stat-label">Quality Rated</div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-item">
                        <span class="stat-number" data-count="1">0</span>
                        <div class="stat-label">Innovation Rank</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<script>
// Counter animation for statistics
document.addEventListener('DOMContentLoaded', function() {
    const counters = document.querySelectorAll('.stat-number');
    const speed = 200;

    const animateCounter = (counter) => {
        const target = +counter.getAttribute('data-count');
        const count = +counter.innerText;
        const inc = target / speed;

        if (count < target) {
            counter.innerText = Math.ceil(count + inc);
            setTimeout(() => animateCounter(counter), 1);
        } else {
            counter.innerText = target;
        }
    };

    // Intersection Observer for counter animation
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const counters = entry.target.querySelectorAll('.stat-number');
                counters.forEach(counter => {
                    counter.innerText = '0';
                    animateCounter(counter);
                });
                observer.unobserve(entry.target);
            }
        });
    });

    const statsSection = document.querySelector('.certificate-stats');
    if (statsSection) {
        observer.observe(statsSection);
    }
});
</script>

<?php get_footer(); ?>