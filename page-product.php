<?php get_header(); ?>

  <section id="products" class="products-section">

  <div class="section-title mt-5" data-aos="fade-up">
      <h2 class="display-5 fw-bold mb-4">Our Products</h2>
        <p class="sub-title">Tradition you love, innovation you’ll crave</p>

    </div>  
  <div class="container">
    
    <?php

    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

    $categories = get_terms([
        'taxonomy'   => 'product_cat',
        'hide_empty' => true,
        'exclude'    => [ get_option('default_product_cat') ], 
    ]);

    // Get all products
    $args = [
        'post_type'      => 'product',
        'posts_per_page' => -1,
        'orderby'        => 'date',
        'order'          => 'DESC',
    ];
    $loop = new WP_Query($args);

    $products = [];
    if ($loop->have_posts()) {
        while ($loop->have_posts()) {
            $loop->the_post();
            $products[] = wc_get_product(get_the_ID());
        }
    }
    wp_reset_postdata();
    ?>

    <!-- Tabs Navigation -->
    <ul class="nav nav-tabs justify-content-center mb-5" id="productTabs" role="tablist" style="border-bottom:none">
      <!-- All Products Tab -->
      <li class="nav-item" role="presentation">
        <button class="nav-link active" 
                id="tab-all" 
                data-bs-toggle="tab" 
                data-bs-target="#tab-pane-all" 
                type="button" role="tab">
          All Products
        </button>
      </li>

      <?php foreach ($categories as $cat): ?>
        <li class="nav-item" role="presentation">
          <button class="nav-link" 
                  id="tab-<?php echo $cat->slug; ?>" 
                  data-bs-toggle="tab" 
                  data-bs-target="#tab-pane-<?php echo $cat->slug; ?>" 
                  type="button" role="tab">
            <?php echo $cat->name; ?>
          </button>
        </li>
      <?php endforeach; ?>
    </ul>

    <!-- Tabs Content -->
    <div class="tab-content">

      <!-- All Products Tab -->
      <div class="tab-pane fade show active" id="tab-pane-all" role="tabpanel">
        <div class="row">
          <?php foreach ($products as $product) :
              $product_id = $product->get_id();
              $image_url = has_post_thumbnail($product_id)
                  ? get_the_post_thumbnail_url($product_id, 'medium')
                  : get_template_directory_uri() . '/assets/images/default-product.png';
              $categories_list = wc_get_product_category_list($product_id, ', ');
          ?>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12 mb-4">
            <div class="product-card">
              <div class="product-image">
                <div class="product-bag">
                  <img src="<?php echo esc_url($image_url); ?>" class="img-fluid" />
                </div>
              </div>
              <div class="product-info">

             
                <h5 class="product-name"><?php echo $product->get_name(); ?></h5>
                <p class="text-muted"><?php echo wp_trim_words($product->get_short_description(), 12); ?></p>
                <button class="btn-view-details"
                        data-bs-toggle="modal"
                        data-bs-target="#productModal"
                        data-title='<?php echo esc_attr($product->get_name()); ?>'
                        data-description='<?php echo esc_attr($product->get_description()); ?>'
                        data-image='<?php echo esc_url(get_the_post_thumbnail_url($product_id, 'large')); ?>'
                        data-price='<?php echo $product->get_price(); ?>'>
                  View Details
                </button>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- Category Tabs -->
      <?php foreach ($categories as $cat): ?>
        <div class="tab-pane fade" id="tab-pane-<?php echo $cat->slug; ?>" role="tabpanel">
          <div class="row">
            <?php
            $cat_products = wc_get_products([
                'status'   => 'publish',
                'limit'    => -1,
                'category' => [ $cat->slug ],
                'orderby'  => 'date',
                'order'    => 'DESC',
            ]);

            foreach ($cat_products as $product) :
                $product_id = $product->get_id();
                $image_url = has_post_thumbnail($product_id)
                    ? get_the_post_thumbnail_url($product_id, 'medium')
                    : get_template_directory_uri() . '/assets/images/default-product.png';
                $categories_list = wc_get_product_category_list($product_id, ', ');
            ?>
                 <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12 mb-4">
            <div class="product-card">
              <div class="product-image">
                <div class="product-bag">
                  <img src="<?php echo esc_url($image_url); ?>" class="img-fluid" />
                </div>
              </div>
              <div class="product-info">
                <h5 class="product-name"><?php echo $product->get_name(); ?></h5>
                <p class="text-muted"><?php echo wp_trim_words($product->get_short_description(), 12); ?></p>
                <button class="btn-view-details"
                        data-bs-toggle="modal"
                        data-bs-target="#productModal"
                        data-title='<?php echo esc_attr($product->get_name()); ?>'
                        data-description='<?php echo esc_attr($product->get_description()); ?>'
                        data-image='<?php echo esc_url(get_the_post_thumbnail_url($product_id, 'large')); ?>'
                        data-price='<?php echo $product->get_price(); ?>'>
                  View Details
                </button>
              </div>
            </div>
          </div>
            <?php endforeach; ?>
          </div>
        </div>
      <?php endforeach; ?>

    </div>
  </div>
</section>


<!-- Product Modal -->

<div class="modal fade" id="productModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content shadow-lg rounded-3 border-0">
        
      <!-- Header with Close Button -->
      <div class="modal-header border-0 pb-2 position-relative">
        <h4 class="modal-title fw-bold flex-grow-1" id="productModalLabel" style="color: var(--accent-color, #007bff);"></h4>
        <button type="button" class="btn-close position-absolute top-0 end-0 mt-3 me-3" 
                data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <!-- Body -->
      <div class="modal-body row g-4 align-items-start">
        <!-- Image Section -->
        <div class="col-md-6">
          <div class="position-relative">
            <!-- Award Badge -->
            <div id="productModalAward" class="position-absolute top-0 start-0 m-2 badge bg-warning text-dark px-2 py-1 rounded-pill" style="display: none; z-index: 10;">
              <i class="fas fa-trophy me-1"></i>
              <span></span>
            </div>
            
            <!-- Product Image -->
            <div class="text-center bg-light rounded p-3">
              <img id="productModalImage" src="" class="img-fluid rounded shadow-sm" 
                   style="max-height: 300px; object-fit: contain;"/>
            </div>
          </div>
        </div>
        
        <!-- Details Section -->
        <div class="col-md-6">
          <!-- Description -->
          <div class="mb-4">
            <h6 class="fw-bold text-uppercase text-muted small mb-2">Description</h6>
            <p id="productModalDescription" class="text-dark lh-base"></p>
          </div>
          
          <!-- Product Info Cards -->
          <div class="row g-3">
            <!-- Price Card -->
            <div class="col-6">
              <div class="card border-0 bg-light h-100">
                <div class="card-body p-3 text-center">
                  <i class="fas fa-tag text-success mb-2"></i>
                  <h6 class="card-title small text-muted mb-1">Price</h6>
                  <h5 id="productModalPrice" class="text-success fw-bold mb-0"></h5>
                </div>
              </div>
            </div>
            
            <!-- Weight Card -->
            <div class="col-6">
              <div class="card border-0 bg-light h-100">
                <div class="card-body p-3 text-center">
                  <i class="fas fa-weight text-primary mb-2"></i>
                  <h6 class="card-title small text-muted mb-1">Net Weight</h6>
                  <p id="productModalWeight" class="fw-semibold mb-0 text-dark"></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Footer -->
      <div class="modal-footer border-0 pt-0">
        <div class="w-100">
          <div class="d-flex gap-3 justify-content-end">
            <!-- <button type="button" class="btn btn-outline-secondary px-4 py-2" data-bs-dismiss="modal">
              <i class="fas fa-times me-1"></i> Close
            </button> -->
            
            <a href="https://shopee.ph/emhyufoods" target="_blank" id="addOrderNowButton" 
               class="btn px-4 py-2 text-white fw-semibold shadow-sm" 
               style="background-color: var(--accent-color, #007bff);">
               <i class="fas fa-shopping-cart me-1"></i> Order Now
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>

