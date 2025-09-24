<?php get_header(); ?>
 
<section id="certificate" class="certificate py-5">
    <div class="container">
        <div class="section-title mt-5 text-center">
            <h2 class="display-5 fw-bold mb-4">Certificates & Awards</h2>
            <p class="sub-title">Recognition of excellence and innovation in our field</p>
        </div>
        
        <!-- Awards Grid -->
        <div class="row g-4">
            <!-- FDA License Certificate -->
            <div class="col-lg-6 col-md-6">
                <div class="certificate-card h-100">
                    <div class="award-badge-certificate">Official License</div>
                    <div class="certificate-image has-image">
                        <a class="glightbox" data-gallery="fdal" href="<?php echo get_template_directory_uri(); ?>/assets/images/certificate_award/fda.png">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/certificate_award/fda.png" 
                                 alt="FDA License to Operate Certificate" 
                                 class="award-image"
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
        </div>

        <!-- Statistics Section -->
        <div class="certificate-stats mb-5">
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




<?php get_footer(); ?>