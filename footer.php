   

<footer class="footer text-center text-lg-start text-muted">
  <!-- Section: Social media -->
<section class="text-light p-4">
  <div class="container text-center text-md-start mt-5">
    <!-- Grid row -->
    <div class="row mt-3">
      <!-- Logo Column -->
      <div class="col-md-6 col-lg-3 mx-auto mb-4">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="Parolas Logo" width="110" height="80">
      </div>
      
      <!-- Location Column -->
      <div class="col-md-6 col-lg-3 mx-auto mb-4">
        <h6 class="text-uppercase fw-bold mb-4 text-light">Location</h6>
        <p><i class="fas fa-location-dot me-2 fa-lg"></i>San Isidro, Buenavista, Guimaras</p>
      </div>
      
      <!-- Contact Column -->
      <div class="col-md-6 col-lg-3 mx-auto mb-4">
        <h6 class="text-uppercase fw-bold mb-4 text-light">Contact</h6>
        <p>
          <i class="fas fa-envelope me-2 fa-lg"></i>
          <a class="text-light text-decoration-none" href="mailto:emhyufoods@gmail.com">
            emhyufoods@gmail.com
          </a>
        </p>
        <p><i class="fas fa-phone me-2 fa-lg"></i> 033 3221247</p>
        <p><i class="fas fa-mobile me-2 fa-lg"></i> 09605967441 / 09562894178</p>
      </div>
    
      <!-- Social & Shop Column -->
      <div class="col-md-6 col-lg-3 mx-auto mb-4 gap-3">
        <!-- Follow Us Section -->
        <h6 class="text-uppercase fw-bold mb-3 text-light">Follow Us</h6>
        <div class="social-links mb-4">
          <a href="https://www.facebook.com/PAROLASguimaras/" target="_blank" class="text-light me-3">
            <i class="fab fa-facebook fa-lg"></i>
          </a>
          <a href="https://www.instagram.com/parolasguimaras/?hl=en" target="_blank" class="text-light me-3">
            <i class="fab fa-instagram fa-lg"></i>
          </a>
          <a href="https://www.youtube.com/channel/UCfaQyFUPj7Uelsoejc96c3A" target="_blank" class="text-light me-3">
            <i class="fab fa-youtube fa-lg"></i>
          </a>
          <a href="https://x.com/EmhyuFoods" target="_blank" class="text-light">
            <i class="fa-brands fa-x-twitter"></i>
          </a>
        </div>
      </div>




    </div>
     
    <div class="d-flex justify-content-center">
  <!-- Shop With Us Section -->
  <div class="row text-center">
    <h6 class="text-uppercase fw-bold mb-3 text-light">Shop with Us</h6>
    <div class="shop-links">
      <a href="https://shopee.ph/emhyufoods" target="_blank" class="text-light">
        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="25" viewBox="0 0 24 24">
          <path fill="currentColor" d="M15.941 17.963c.23-1.879-.98-3.077-4.175-4.097c-1.548-.528-2.277-1.22-2.26-2.171c.065-1.056 1.048-1.825 2.352-1.85a5.29 5.29 0 0 1 2.883.89c.116.072.197.06.263-.04c.09-.144.315-.493.39-.62c.051-.08.061-.186-.068-.28c-.185-.137-.704-.415-.983-.532a6.47 6.47 0 0 0-2.511-.514c-1.91.008-3.413 1.215-3.54 2.826c-.081 1.163.495 2.107 1.73 2.827c.263.152 1.68.716 2.244.892c1.774.552 2.695 1.542 2.478 2.697c-.197 1.047-1.299 1.724-2.818 1.744c-1.203-.046-2.287-.537-3.127-1.19l-.141-.11c-.104-.08-.218-.075-.287.03c-.05.077-.376.547-.458.67c-.077.108-.035.168.045.234c.35.293.817.613 1.134.775a6.71 6.71 0 0 0 2.829.727a4.905 4.905 0 0 0 2.075-.354c1.095-.465 1.803-1.394 1.945-2.554zM12 1.401c-2.068 0-3.754 1.95-3.833 4.39h7.665C15.751 3.35 14.066 1.4 12 1.4zm7.851 22.598l-.08.001l-15.784-.002c-1.074-.04-1.863-.91-1.971-1.991l-.01-.195l-.707-15.526a.459.459 0 0 1 .45-.494h4.975C6.845 2.568 9.16 0 12 0c2.838 0 5.153 2.569 5.275 5.79h4.968a.459.459 0 0 1 .458.483l-.773 15.588l-.007.131c-.094 1.094-.979 1.977-2.07 2.006z"/>
        </svg>
      </a>
    </div>
  </div>
</div>


         
  </div>
</section>

  <div class="text-center p-4 text-dark" style="background-color:#ffd700">
     <p class="mb-1 mt-3">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.</p> 
  </div>
</footer>


       <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content bg-dark">
              <div class="modal-header border-0" style="background-color:#0F4D0F">
                <h5 class="modal-title text-white" id="videoModalLabel">How We Make It</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close" onclick="stopVideo()"></button>

              </div>
              <div class="modal-body p-0">
                <video id="storyVideo" width="100%" controls>
                  <source src="<?php echo get_template_directory_uri();?>/assets/mp4/202401131639.mp4" type="video/mp4">
                  Your browser does not support the video tag.
                </video>
              </div>
            </div>
          </div>
        </div>



    <!-- Offcanvas Mobile Menu -->
    <div class="offcanvas offcanvas-start w-100" tabindex="-1" id="mobileMenu" aria-labelledby="mobileMenuLabel">
      <!-- Header with Logo and Close Button -->
      <div class="offcanvas-header border-bottom py-3 px-4">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="navbar-brand d-flex align-items-center">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/new-logo.png" alt="<?php bloginfo('name'); ?>" height="40">
        </a>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>

      <!-- Body with Menu -->
      <div class="offcanvas-body px-4 pt-3 d-flex flex-column justify-content-between" style="height: 100%;">
        <div>
          <?php
          wp_nav_menu(array(
            'menu'            => 'primary',
            'theme_location'  => 'primary',
            'container'       => false,
            'menu_class'      => 'nav flex-column mobile-nav gap-2',
            'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
            'fallback_cb'     => false,
          ));
          ?>
        </div>

        <!-- Footer -->
        <div class="offcanvas-footer border-top pt-3 mt-3 small text-muted text-center">
          <p class="mb-1">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.</p>
        </div>
      </div>
    </div>

    <?php wp_footer(); ?>

 

    <script>
      const path = "<?php echo get_template_directory_uri(); ?>/assets/images/products/";
    </script>

</body>
</html>
    