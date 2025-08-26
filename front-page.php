<?php get_header(); ?>

   <!-- Hero Section -->
    <section id="hero" class="hero section bg-light">

        <div class="container">
          <div class="row gy-4 justify-content-center justify-content-lg-between">
            <div class="col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center mb-5">
              <h2 data-aos="fade-up" style="font-size:45px">Why Choose Parolas?</h2>
              <p data-aos="fade-up" data-aos-delay="100"> Your Guimaras island adventure is not complete without taking home Parolas Guimaras. 
                It is more than just a souvenir; it is a special reminder of the unique moments and warm hospitality you experienced. 
                Each product is a piece of the island's soul, connecting you to its stories and flavors. It is a deserving token, a little piece of the place's spirit to cherish and share. 
                Above all, there is no substitute for Parolas Guimaras, the pasalubong you deserve!</p>
              <div class="d-flex" data-aos="fade-up" data-aos-delay="100">
          
                  <button onclick="window.location.href='<?php echo home_url( '/product' ); ?>'" class="btn btn-get-started"><i class="fas fa-shopping-bag me-2"></i>
                                  Explore Products</button>                

                                  

                  <button class="btn btn-lg btn-video-play" data-bs-toggle="modal" data-bs-target="#videoModal">
                                  <i class="fas fa-play me-2"></i><span>Watch Video</span>
                    </button>
              </div>
            </div>
             

            <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in-out"  data-aos-delay="100">

            
              <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
            
              <!-- Carousel Images -->
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/hero/img1.png" class="d-block w-100 img-fluid animated object-fit-contain" alt="Hero Image 1">
                  </div>
                  <div class="carousel-item">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/hero/img2.png" class="d-block w-100 img-fluid animated object-fit-contain" loading="lazy" alt="Hero Image 2">
                  </div>
                  <div class="carousel-item">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/hero/img3.png" class="d-block w-100 img-fluid animated object-fit-contain" loading="lazy" alt="Hero Image 3">
                  </div>
                  
                    <div class="carousel-item">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/hero/img11.png" class="d-block w-100 img-fluid animated object-fit-contain" loading="lazy" alt="Hero Image 11">
                  </div>

                   <div class="carousel-item">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/hero/img12.png" class="d-block w-100 img-fluid animated object-fit-contain" loading="lazy" alt="Hero Image 12">
                  </div>

                   <div class="carousel-item">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/hero/img13.png" class="d-block w-100 img-fluid animated object-fit-contain" loading="lazy" alt="Hero Image 13">
                  </div>

                  <div class="carousel-item">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/hero/img7.png" class="d-block w-100 img-fluid animated object-fit-contain" loading="lazy" alt="Hero Image 7">
                  </div>
                  <div class="carousel-item">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/hero/img4.png" class="d-block w-100 img-fluid animated object-fit-contain" loading="lazy" alt="Hero Image 4">
                  </div>
                      <div class="carousel-item">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/hero/img5.png" class="d-block w-100 img-fluid animated object-fit-contain" loading="lazy" alt="Hero Image 5">
                  </div>
                      <div class="carousel-item">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/hero/img6.png" class="d-block w-100 img-fluid animated object-fit-contain" loading="lazy" alt="Hero Image 6">
                  </div>

                   <div class="carousel-item">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/hero/img8.png" class="d-block w-100 img-fluid animated object-fit-contain" loading="lazy" alt="Hero Image 8">
                  </div>

                   <div class="carousel-item">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/hero/img9.png" class="d-block w-100 img-fluid animated object-fit-contain" loading="lazy" alt="Hero Image 9">
                  </div>

                  

                </div>
              </div>
            </div>
        </div>
      </div>

    </section>
      <section id="choose-parolas" class="choose-parolas light-background">
         <div class="container">
         
             <div class="section-title mt-5" data-aos="fade-up">
                   <h2 class="display-5 fw-bold mb-4">Experience Guimaras through our Products</h2>
        
            </div>

            
            <div class="row">
                <div class="col-md-4 text-center mb-4">
                    <div class="feature-icon" data-aos="zoom-in">
                        <i class="fas fa-seedling"></i>
                    </div>
                    <h4 data-aos="fade-up" data-aos-delay="150">Unique</h4>
                    <p data-aos="fade-up" data-aos-delay="150">Made with fresh, natural ingredients sourced locally from Guimaras</p>
                </div>
                
                <div class="col-md-4 text-center mb-4">
                    <div class="feature-icon" data-aos="zoom-in">
                   
                        <i class="fa-solid fa-peso-sign"></i>
                    </div>
                    <h4 data-aos="fade-up" data-aos-delay="150">Affordable</h4>
                    <p data-aos="fade-up" data-aos-delay="150">Delivers budget-friendly yet premium treats that bring the authentic flavors of Guimaras closer to everyone.</p>
                </div>
                
                <div class="col-md-4 text-center mb-4">
                    <div class="feature-icon" data-aos="zoom-in">
                        <i class="fas fa-award"></i>
                    </div>
                    <h4 data-aos="fade-up" data-aos-delay="150">Premium Quality</h4>
                    <p data-aos="fade-up" data-aos-delay="150">Only the finest ingredients and highest quality standards</p>
                </div>
            </div>
        </div>
    </section>

<?php get_footer(); ?>
