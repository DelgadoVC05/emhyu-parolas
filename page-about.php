
<?php get_header(); ?>

    <section id="about"class="about">
    <div class="py-5 light-linear">
        <div class="container">
            <div class="row d-flex align-items-center justify-content-between">
                <div class="col-lg-5 mb-4 mb-lg-0">
                    <div class="heritage-content">
                        <h2 class="display-5 fw-bold mb-4">
                            About Us
                        </h2>
                        <p class="lead mb-4">
                            We invite you to embark on a heritage adventure with Parolas Guimaras. Whether you're indulging in our delectable snacks, exploring our rich history, or simply savoring the warmth of Guimaras' hospitality, we are here to make every moment unforgettable.</br></br>
                                  Our products are designed to give you an immersive experience, showcasing our wide range of high-quality, locally-produced treats that are perfect for sharing with loved ones.
                        </p>
                       
                        <div class="heritage-quote p-4" style="background: rgba(158, 216, 106, 0.1); border-left: 5px solid var(--primary-green); border-radius: 10px;">
                            <p class="fst-italic mb-0">
                                "Thank you for choosing Parolas Guimaras – where every bite tells a story of love, tradition, and the vibrant spirit of our island home."
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="about-img">
                          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/about-us.png" class="img-fluid" alt="About Image"  loading="lazy">
                    </div>
                </div>
            </div>
        </div>
    </div>

    </section>

    <!-- Our Story Section -->
    <section class="py-5 our-story" style="background: white;">
        <div class="container">
            <div class="section-title text-center mt-5">
                <h2 class="display-5 fw-bold mb-4">Our Story</h2>
                <p class="sub-title">A journey of innovation, tradition, and excellence</p>
            </div>
            
            <div class="row mb-5">
                <div class="col-lg-6 mb-4">
                    <div class="story-timeline">
                        <div class="timeline-item mb-4 p-4 light-linear" style="border-radius: 15px; border-left: 5px solid var(--primary-green);">
                            <div class="d-flex align-items-center mb-3">
                                <div class="timeline-year">2016</div>
                                <h5 class="ms-3 mb-0">Humble Beginnings</h5>
                            </div>
                            <p class="mb-0">Parolas Guimaras started under the company name Parolas Food Products, aiming to create innovative food products using fresh raw ingredients from Guimaras - mango, calamansi, dragon fruit, tamarind, chili pepper, saba banana, taro, kamote, garlic, and dried prawns.</p>
                        </div>
                        
                        <div class="timeline-item mb-4 p-4 light-linear" style="border-radius: 15px;">
                            <div class="d-flex align-items-center mb-3">
                                <div class="timeline-year">2017</div>
                                <h5 class="ms-3 mb-0">Media Recognition</h5>
                            </div>
                            <p class="mb-0">Our flagship product <strong>Mango Serafina</strong> was featured in <strong>GMA's Kapuso Mo Jessica Soho</strong> and <strong>Biyahe Ni Drew</strong>, earning accolades for its delectable blend of taste and uniqueness.</p>
                        </div>
                        
                        <div class="timeline-item mb-4 p-4 light-linear" style="border-radius: 15px;">
                            <div class="d-flex align-items-center mb-3">
                                <div class="timeline-year">2021</div>
                                <h5 class="ms-3 mb-0">Transformative Rebranding</h5>
                            </div>
                            <p class="mb-0">The company underwent a transformative rebranding, emerging as <strong>Emhyu Food Products</strong> with the revered <strong>"Parolas Guimaras"</strong> insignia as the official brand.</p>
                        </div>
                        
                        <div class="timeline-item mb-4 p-4 light-linear" style="border-radius: 15px;">
                            <div class="d-flex align-items-center mb-3">
                                <div class="timeline-year">2024</div>
                                <h5 class="ms-3 mb-0">Award-Winning Innovation</h5>
                            </div>
                            <p class="mb-0">Our <strong>Calmavoron (Calamansi + Mango Polvoron)</strong> clinched the title of <strong>Best Innovative Product</strong> at the DA-AMAD VI Aspire and Kapistahan sa Capiz 2024.</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6">
                    <div class="story-visual">
                        <div class="story-highlight p-4 mb-4 text-dark light-linear" style="color: white; border-radius: 20px; text-align: center;">
                            <i class="fas fa-quote-left fa-2x mb-3"></i>
                            <h4 class="mb-3">"The Pasalubong You Deserve"</h4>
                            <p class="mb-0">Our tagline encapsulates our promise to provide more than just souvenirs – we offer a taste of Guimaras' warmth, hospitality, and culinary heritage.</p>
                        </div>
                        
                        <div class="achievement-cards">
                            <div class="row">
                                <div class="col-sm-6 mb-3">
                                    <div class="achievement-card p-3 text-center light-linear" style="border-radius: 15px;">
                                        <i class="fas fa-tv fa-2x mb-2" style="color: var(--accent-color);"></i>
                                        <h6 class="fw-bold">TV Features</h6>
                                        <small>GMA Shows Recognition</small>
                                    </div>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <div class="achievement-card p-3 text-center light-linear" style="border-radius: 15px;">
                                        <i class="fas fa-trophy fa-2x mb-2" style="color: var(--accent-color);"></i>
                                        <h6 class="fw-bold">Awards</h6>
                                        <small>Best Innovative Product</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Vision Mission Values Section -->
    <section class="py-5 light-linear">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="vmv-card h-100 p-4 text-center" style="background: white; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
                        <div class="vmv-icon mb-3">
                            <i class="fas fa-eye fa-3x" style="color: var(--accent-color);"></i>
                        </div>
                        <h2>Our Vision</h2>
                        <p class="mb-0">By 2030, we aim to be a popularly loved brand offering unique, innovative, and affordable products.</p>
                    </div>
                </div>
                
                <div class="col-lg-4 mb-4">
                    <div class="vmv-card h-100 p-4 text-center" style="background: white; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
                        <div class="vmv-icon mb-3">
                            <i class="fas fa-bullseye fa-3x" style="color: var(--accent-color);"></i>
                        </div>
                        <h2>Our Mission</h2>
                        <p class="mb-0">A responsible food manufacturing company dedicated to producing unique, safe-to-eat, healthy, and affordable products that reflect the rich flavors of Guimaras.</p>
                    </div>
                </div>
                
                <div class="col-lg-4 mb-4">
                    <div class="vmv-card h-100 p-4 text-center" style="background: white; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
                        <div class="vmv-icon mb-3">
                            <i class="fas fa-handshake fa-3x" style="color: var(--accent-color);"></i>
                        </div>
                        <h2>Our Commitment</h2>
                        <p class="mb-0">Upholding the highest standards of excellence in every aspect of our craft, from sourcing local ingredients to employing sustainable practices.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Core Values Section -->
    <section class="py-5 core-values" style="background: white;">
        <div class="container">
            <div class="section-title text-center mb-5">
                <h2 class="display-5 fw-bold">Core Values & Business Practices</h2>
                <p class="sub-title">The principles that guide everything we do</p>
            </div>
            
            <div class="row">
                <div class="col-lg-6 mb-4">
                    <h4 class="fw-bold mb-4" style="color: var(--accent-color);">
                        <i class="fas fa-heart me-2"></i>Core Values
                    </h4>
                    <div class="values-list">
                        <div class="value-item mb-3 p-3 light-linear" style="border-radius: 10px;">
                            <h6 class="fw-bold mb-2"><i class="fas fa-smile me-2"></i>Customer Satisfaction</h6>
                            <p class="mb-0 small">We prioritize our customers' needs and strive to exceed their expectations by delivering exceptional products and services.</p>
                        </div>
                        
                        <div class="value-item mb-3 p-3 light-linear" style="border-radius: 10px;">
                            <h6 class="fw-bold mb-2"><i class="fas fa-shield-alt me-2"></i>Business Integrity</h6>
                            <p class="mb-0 small">We conduct ourselves with honesty, transparency, and ethical principles in all aspects of our operations.</p>
                        </div>
                        
                        <div class="value-item mb-3 p-3 light-linear" style="border-radius: 10px;">
                            <h6 class="fw-bold mb-2"><i class="fas fa-eye me-2"></i>Business Transparency</h6>
                            <p class="mb-0 small">We believe in open and transparent communication with our stakeholders, fostering trust and accountability.</p>
                        </div>
                        
                        <div class="value-item mb-3 p-3 light-linear" style="border-radius: 10px;">
                            <h6 class="fw-bold mb-2"><i class="fas fa-users me-2"></i>Community Development</h6>
                            <p class="mb-0 small">We actively engage with local communities and promote sustainable economic development.</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6 mb-4">
                    <h4 class="fw-bold mb-4" style="color: var(--accent-color);">
                        <i class="fas fa-cogs me-2"></i>Core Business Practices
                    </h4>
                    <div class="business-list">
                        <div class="business-item mb-3 p-3 light-linear" style="border-radius: 10px;">
                            <h6 class="fw-bold mb-2"><i class="fas fa-star me-2"></i>Customer Focus</h6>
                            <p class="mb-0 small">Placing customer satisfaction at the heart of our business, continuously enhancing our products and services.</p>
                        </div>
                        
                        <div class="business-item mb-3 p-3 light-linear" style="border-radius: 10px;">
                            <h6 class="fw-bold mb-2"><i class="fas fa-user-graduate me-2"></i>People Development</h6>
                            <p class="mb-0 small">We invest in our employees' growth and development, fostering a skilled and motivated workforce.</p>
                        </div>

                        <div class="business-item mb-3 p-3 light-linear" style="border-radius: 10px;">
                            <h6 class="fw-bold mb-2"><i class="fas fa-chart-line me-2"></i>Community Empowerment and Engagement</h6>
                            <p class="mb-0 small">We uplift the community by providing sustainable income opportunities, sourcing locally, and engaging in initiatives that promote social responsibility and shared progress.</p>
                        </div>
                        
                        <div class="business-item mb-3 p-3 light-linear" style="border-radius: 10px;">
                            <h6 class="fw-bold mb-2"><i class="fas fa-lightbulb me-2"></i>Innovation & Learning</h6>
                            <p class="mb-0 small">Embracing a culture of innovation to continuously improve our products, processes, and services.</p>
                        </div>
                    
                    </div>
                </div>
            </div>
        </div>
    </section>

   
  <?php get_footer(); ?>

