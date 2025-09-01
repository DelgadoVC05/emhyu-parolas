<?php get_header(); ?>
  

 <section id="certificate" class="contact-certificate py-5">
        <div class="container">
              <div class="section-title mt-5" data-aos="fade-up">
                   <h2 class="display-5 fw-bold mb-4">Awards & Certificates</h2>
                    <p class="sub-title">Recognition of excellence and innovation in our field</p>
            </div>

         <div class="row g-4" data-aos="fade-up" data-aos-delay="200">
            
          <!-- FDA License Certificate -->
        <div class="col-lg-6 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="certificate-card h-100">
                    <div class="award-badge-certificate">Official License</div>
                    <div class="certificate-image has-image">
                        <a class="glightbox" data-gallery="fdal" href="<?php echo get_template_directory_uri(); ?>/assets/images/certificate_award/fda.png" 
                        >
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/certificate_award/fda.png" 
                            alt="FDA License to Operate as Food Manufacturer" 
                            class="award-image obj-fit-cover"
                            loading="lazy"
                            onerror="this.style.display='none'; this.parentElement.classList.remove('has-image'); this.parentElement.innerHTML='<i class=\'fas fa-certificate award-icon\'></i>';">
                          
                              <div class="ca-image-overlay">
                                    <span class="ca-btn">Read Article</span>
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
`
  

            <!-- Statistics Section -->
            <div class="certificate-stats" data-aos="fade-up" data-aos-delay="200">
                <div class="row">
                    <div class="col-md-3 col-6">
                        <div class="stat-item">
                            <span class="stat-number">4</span>
                            <div class="stat-label">Awards Won</div>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="stat-item">
                            <span class="stat-number">9</span>
                            <div class="stat-label">Years Running</div>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="stat-item">
                            <span class="stat-number">100%</span>
                            <div class="stat-label">Quality Rated</div>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="stat-item">
                            <span class="stat-number">1st</span>
                            <div class="stat-label">Innovation Rank</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


<?php get_footer(); ?>

