   

        <?php get_template_part('includes/footer');?>

       <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" >
          <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content bg-dark">
              <div class="modal-header border-0" style="background-color:#0F4D0F">
                <h5 class="modal-title text-white" id="videoModalLabel">How We Make It</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>

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



    <?php wp_footer(); ?>


    <script>
      const path = "<?php echo get_template_directory_uri(); ?>/assets/images/products/";
    </script>

</body>
</html>
    