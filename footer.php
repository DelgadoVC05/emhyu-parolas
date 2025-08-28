   

        <?php get_template_part('includes/footer');?>

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
    