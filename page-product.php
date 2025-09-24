<?php get_header(); ?>
  

<section id="products" class="products-section">
    <div class="section-title mt-5 fade-title">
        <h2 class="display-5 fw-bold mb-4">Our Products</h2>
        <p class="sub-title">Tradition you love, innovation you'll crave</p>
    </div>  
    <div class="container">
        <?php
        $products_per_page = 8;
        $current_page = isset($_GET['product_page']) ? max(1, intval($_GET['product_page'])) : 1;
        $offset = ($current_page - 1) * $products_per_page;

        $active_tab = isset($_GET['tab']) ? sanitize_text_field($_GET['tab']) : 'all';


        // Get categories
        $categories = get_terms([
            'taxonomy'   => 'product_cat',
            'hide_empty' => true,
            'exclude'    => [ get_option('default_product_cat') ], 
        ]);

        // Total products for "All Products"
        $total_products_query = new WP_Query([
            'post_type'      => 'product',
            'post_status'    => 'publish',
            'posts_per_page' => -1,
            'fields'         => 'ids',
        ]);
        $total_products = $total_products_query->found_posts;
        $total_pages = ceil($total_products / $products_per_page);
        wp_reset_postdata();

        // Products query for "All Products"
        $products_query = new WP_Query([
            'post_type'      => 'product',
            'post_status'    => 'publish',
            'posts_per_page' => $products_per_page,
            'offset'         => $offset,
            'orderby'        => 'date',
            'order'          => 'DESC',
        ]);

        // Custom pagination function
        function render_custom_pagination($current_page, $total_pages, $base_url, $query_key = 'product_page') {
            if ($total_pages <= 1) return;

            $pagination_html = '<nav aria-label="Custom Products Pagination" class="custom-pagination">';
            $pagination_html .= '<ul class="pagination justify-content-center">';

            // Previous button
            if ($current_page > 1) {
                $prev_page = $current_page - 1;
                $prev_url = $prev_page == 1 ? $base_url : add_query_arg($query_key, $prev_page, $base_url);
                $pagination_html .= '<li class="page-item"><a class="page-link" href="' . esc_url($prev_url) . '"><i class="fas fa-chevron-left"></i> Previous</a></li>';
            }

            // Page numbers
            $start = max(1, $current_page - 2);
            $end = min($total_pages, $current_page + 2);

            for ($i = $start; $i <= $end; $i++) {
                $page_url = $i == 1 ? $base_url : add_query_arg($query_key, $i, $base_url);
                $active_class = $i == $current_page ? ' active' : '';
                $pagination_html .= '<li class="page-item' . $active_class . '">';
                if ($i == $current_page) {
                    $pagination_html .= '<span class="page-link">' . $i . '</span>';
                } else {
                    $pagination_html .= '<a class="page-link" href="' . esc_url($page_url) . '">' . $i . '</a>';
                }
                $pagination_html .= '</li>';
            }

            // Next button
            if ($current_page < $total_pages) {
                $next_page = $current_page + 1;
                $next_url = add_query_arg($query_key, $next_page, $base_url);
                $pagination_html .= '<li class="page-item"><a class="page-link" href="' . esc_url($next_url) . '">Next <i class="fas fa-chevron-right"></i></a></li>';
            }

            $pagination_html .= '</ul></nav>';
            return $pagination_html;
        }
        ?>

        <!-- Tabs Navigation -->
        <ul class="nav nav-tabs justify-content-center mb-5" id="productTabs" role="tablist" style="border-bottom:none">
            <li class="nav-item" role="presentation">
              <a class="nav-link <?php echo $active_tab === 'all' ? 'active' : ''; ?>" 
                id="tab-all" 
                href="<?php echo esc_url(remove_query_arg(array_merge(array_map(function($c){return 'cat_page_'.$c->slug;}, $categories), ['tab']))); ?>" 
                role="tab">
                    All Products (<?php echo $total_products; ?>)
                </a>

                                
            </li>
            <?php foreach ($categories as $cat): ?>
                <li class="nav-item" role="presentation">
                 <a class="nav-link <?php echo $active_tab === $cat->slug ? 'active' : ''; ?>" 
                    id="tab-<?php echo $cat->slug; ?>" 
                    href="<?php echo esc_url(add_query_arg('tab', $cat->slug)); ?>" 
                    role="tab">
                        <?php echo $cat->name; ?> (<?php echo $cat->count; ?>)
                    </a>
            </li>
            <?php endforeach; ?>
        </ul>

        <!-- Tabs Content -->
        <div class="tab-content">
            <!-- All Products Tab -->
  
                <div class="tab-pane fade <?php echo $active_tab === 'all' ? 'show active' : ''; ?>" id="tab-pane-all" role="tabpanel">

                <div class="row">
                    <?php if ($products_query->have_posts()): ?>
                        <?php while ($products_query->have_posts()): $products_query->the_post(); ?>
                            <?php $product = wc_get_product(get_the_ID()); ?>
                            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12 mb-4">
                                <div class="product-card">
                                    <div class="product-image">
                                        <?php
                                        $attributes = $product->get_attributes();
                                        if (isset($attributes['award'])) {
                                            $award_attr = $attributes['award'];
                                            foreach ($award_attr->get_options() as $award) {
                                                echo '<div class="award-badge-product"><i class="fas fa-trophy"></i> ' . esc_html($award) . '</div>';
                                            }
                                        }
                                        $image_url = has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'medium') : get_template_directory_uri() . '/assets/images/default-product.png';
                                        ?>
                                        <div class="product-bag">
                                            <img src="<?php echo esc_url($image_url); ?>" class="img-fluid" loading="lazy"/>
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
                                                data-weight='<?php echo esc_attr($product->get_weight()); ?>'
                                                data-image='<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'large')); ?>'
                                                data-price='<?php echo $product->get_price(); ?>'>
                                            View Details
                                        </button>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; wp_reset_postdata(); ?>
                    <?php else: ?>
                        <div class="col-12">
                            <div class="alert text-center" style="background: linear-gradient(135deg, #ffd700 0%, #7bc142 100%); color: var(--accent-color)">
                                <h4>No Products Found</h4>
                                <p>There are no products to display on this page.</p>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- All Products Pagination -->
                <div class="pagination-wrapper mt-4">
                    <?php 
                    $current_url = remove_query_arg('product_page');
                    echo render_custom_pagination($current_page, $total_pages, $current_url, 'product_page');
                    ?>
                </div>
            </div>

            <!-- Category Tabs -->
            <?php foreach ($categories as $cat): ?>
                <?php 
                    $cat_page_key     = 'cat_page_' . $cat->slug;
                    $current_cat_page = isset($_GET[$cat_page_key]) ? max(1, intval($_GET[$cat_page_key])) : 1;
                    $offset           = ($current_cat_page - 1) * $products_per_page;

                    $cat_products_query = new WP_Query([
                        'post_type'      => 'product',
                        'post_status'    => 'publish',
                        'posts_per_page' => $products_per_page,
                        'offset'         => $offset,
                        'tax_query'      => [[
                            'taxonomy' => 'product_cat',
                            'field'    => 'slug',
                            'terms'    => $cat->slug,
                        ]],
                        'orderby'        => 'date',
                        'order'          => 'DESC',
                    ]);

                    $total_cat_products = $cat_products_query->found_posts;
                    $total_cat_pages    = ceil($total_cat_products / $products_per_page);
                ?>

                    <div class="tab-pane fade <?php echo $active_tab === $cat->slug ? 'show active' : ''; ?>" id="tab-pane-<?php echo $cat->slug; ?>" role="tabpanel">

                    <div class="row">
                        <?php if ($cat_products_query->have_posts()): ?>
                            <?php while ($cat_products_query->have_posts()): $cat_products_query->the_post(); ?>
                                <?php 
                                    $product    = wc_get_product(get_the_ID());
                                    $product_id = $product->get_id();
                                    $image_url  = has_post_thumbnail($product_id) ? get_the_post_thumbnail_url($product_id, 'medium') : get_template_directory_uri() . '/assets/images/default-product.png';
                                ?>
                                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12 mb-4">
                                    <div class="product-card">
                                        <div class="product-image">
                                            <?php
                                            $attributes = $product->get_attributes();
                                            if (isset($attributes['award'])) {
                                                foreach ($attributes['award']->get_options() as $award) {
                                                    echo '<div class="award-badge-product"><i class="fas fa-trophy"></i> ' . esc_html($award) . '</div>';
                                                }
                                            }
                                            ?>
                                            <div class="product-bag">
                                                <img src="<?php echo esc_url($image_url); ?>" class="img-fluid" loading="lazy" />
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
                                                    data-weight='<?php echo esc_attr($product->get_weight()); ?>'
                                                    data-image='<?php echo esc_url(get_the_post_thumbnail_url($product_id, 'large')); ?>'
                                                    data-price='<?php echo $product->get_price(); ?>'>
                                                View Details
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; wp_reset_postdata(); ?>
                        <?php else: ?>
                            <div class="col-12">
                                <div class="alert text-center" style="background: linear-gradient(135deg, #ffd700 0%, #7bc142 100%);">
                                    <p class="mt-2" style="color: var(--accent-color)">No products found in this category.</p>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>

         

                    <?php if ($total_cat_pages > 1): ?>
                    <div class="pagination-wrapper mt-4">
                        <?php 
                            // Keep tab in the URL
                            $current_url = add_query_arg('tab', $cat->slug, remove_query_arg($cat_page_key));

                            echo render_custom_pagination(
                                $current_cat_page, 
                                $total_cat_pages, 
                                $current_url,
                                $cat_page_key
                            );
                        ?>
                    </div>
                <?php endif; ?>

                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>


<!-- Product Modal -->

<div class="modal fade" id="productModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content shadow-lg rounded-3 border-0">
        
      <!-- Header -->
      <div class="modal-header border-0 pb-2 sticky-top bg-white" style="z-index: 1056;">
        <h4 class="modal-title fw-bold flex-grow-1" 
            id="productModalLabel" 
            style="color: var(--accent-color, #007bff);"></h4>
        <button type="button" class="btn-close" 
                data-bs-dismiss="modal" 
                aria-label="Close"></button>
      </div>
      
      <!-- Body -->
      <div class="modal-body row g-4 align-items-start">
        <!-- Image Section -->
        <div class="col-md-6">
          <div class="position-relative">
            <!-- Award Badge -->
            <div id="productModalAward" 
                 class="position-absolute top-0 start-0 m-2 badge bg-warning text-dark px-2 py-1 rounded-pill" 
                 style="display: none; z-index: 10;">
              <i class="fas fa-trophy me-1"></i>
              <span></span>
            </div>
            
            <!-- Product Image -->
            <div class="text-center bg-light rounded p-3">
              <img id="productModalImage" src="" 
                   class="img-fluid rounded shadow-sm" 
                   style="max-height: 300px;" loading="lazy"/>
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
                  <h4 class="card-title small text-muted mb-1">Price</h4>
                  <h5 id="productModalPrice" class="text-dark fw-bold mb-0"></h5>
                </div>
              </div>
            </div>
            
            <!-- Weight Card -->
            <div class="col-6">
              <div class="card border-0 bg-light h-100">
                <div class="card-body p-3 text-center">
                  <i class="fas fa-weight text-primary mb-2"></i>
                  <h4 class="card-title small text-muted mb-1">Net Weight</h4>
                  <h5 id="productModalWeight" class="text-dark fw-bold mb-0"></h5>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
      
      <!-- Footer -->
      <div class="modal-footer border-0 pt-0 sticky-bottom bg-white" style="z-index: 1056;">
        <div class="w-100">
          <div class="d-flex gap-3 justify-content-end">
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

