<?php get_header(); ?>

   <!-- Products Section -->
<section id="products" class="products-section">
    <div class="container">
        <div class="text-center mb-5 mt-5" data-aos="fade-up">
            <h2 class="display-5 fw-bold mb-4">Our Products</h2>
        </div>  

        <div class="row">
        <?php
        $args = array(
            'post_type'      => 'product',
            'posts_per_page' => 8,
            'orderby'        => 'date',
            'order'          => 'DESC'
        );
        $loop = new WP_Query($args);

        if ($loop->have_posts()) {
            while ($loop->have_posts()) : $loop->the_post();
                $product = wc_get_product(get_the_ID());
                ?>
                <div class="col-md-3 mb-4" data-aos="fade-up">
                    <div class="product-card">
                        <div class="product-image">
                              <?php
                                global $product;
                                $attributes = $product->get_attributes();

                                if ( isset( $attributes['award'] ) ) {
                                    $award_attr = $attributes['award'];
                                    $options = $award_attr->get_options();
                                    
                                    if ( !empty($options) ) {
                                        foreach ( $options as $award ) {
                                            echo '<div class="award-badge-product"><i class="fas fa-trophy"></i> ' . esc_html($award) . '</div>';
                                        }
                                    }
                                }
                                ?>


                            <div class="product-bag">
                                <img src="<?php echo get_the_post_thumbnail_url($product->get_id(), 'medium'); ?>" class="img-fluid"/>
                            </div>
                        </div>
                        <div class="product-info">
                            <h5 class="product-name"><?php the_title(); ?></h5>
                            <p class="text-muted"><?php echo wp_trim_words(get_the_excerpt(), 12); ?></p>
                            <button 
                                class="btn-view-details"
                                data-bs-toggle="modal" 
                                data-bs-target="#productModal"
                                data-title="<?php the_title(); ?>"
                                data-description="<?php echo get_the_content(); ?>
"
                                data-image="<?php echo get_the_post_thumbnail_url($product->get_id(), 'large'); ?>"
                                data-price='<?php echo $product->get_price_html(); ?>'>
                                View Details
                            </button>
                        </div>
                    </div>
                </div>
                <?php
            endwhile;
        }
        wp_reset_postdata();
        ?>
        </div>
    </div>
</section>

<!-- Product Modal -->

<!-- Product Modal -->
<div class="modal fade" id="productModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content shadow-lg rounded-3 border-0">
        
      <!-- Header -->
      <div class="modal-header border-0 pb-0">
        <h4 class="modal-title fw-bold text-dark pe-5" id="productModalLabel"></h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <!-- Body -->
      <div class="modal-body row g-4 align-items-center">
        <!-- Image -->
        <div class="col-md-6 text-center">
          <img id="productModalImage" src="" class="img-fluid rounded shadow-sm border"/>
        </div>

        <!-- Details -->
        <div class="col-md-6">
          <!-- Description -->
          <p id="productModalDescription" class="text-muted lh-base"></p>
          
          <!-- Price -->
          <div class="mt-3">
            <span class="fw-bold d-block">Price:</span>
            <h4 id="productModalPrice" class="text-success fw-bold mt-1"></h4>
          </div>
          
          <!-- Net Weight -->
          <div class="mt-3">
            <span class="fw-bold d-block">Net Weight:</span>
            <p id="productModalWeight" class="mb-0"></p>
          </div>
        </div>
      </div>

      <!-- Footer -->
      <div class="modal-footer border-0 d-flex justify-content-between">
        <button type="button" class="btn btn-outline-secondary px-4" data-bs-dismiss="modal">Close</button>
        <a href="https://shopee.ph/emhyufoods" target="_blank" id="addOrderNowButton" 
           class="btn px-4 text-light fw-semibold" style="background-color:var(--accent-color)">
           Order Now
        </a>
      </div>

    </div>
  </div>
</div>




<?php get_footer(); ?>

