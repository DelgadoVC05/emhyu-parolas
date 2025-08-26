<?php get_header(); ?>
  

    <!-- Products Section -->
    <section id="products" class="products-section">
        <div class="container">
            <div class="text-center mb-5 mt-5" data-aos="fade-up">
            <h2 class="display-5 fw-bold mb-4">Our Products</h2>
            </div>    
            <div class="row">
                <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="product-card">
                        <div class="product-image">
                            <!-- <div class="award-badge-product">
                                <i class="fas fa-trophy"></i>Most Innovative
                            </div> -->
                            <div class="product-bag">
                                 <img src="<?php echo get_template_directory_uri(); ?>/assets/images/products/mangrind_candy_spicy.png" class="img-fluid"/>
                            </div>
                        </div>
                        <div class="product-info">
                            <h5 class="product-name">Mangorind Candy Spicy</h5>
                              <p class="text-muted">Sweet and tangy mango-flavored treats</p>
                            <button class="btn-view-details" onclick="showProductDetails('mangorind')">
                                View Details
                            </button>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="product-card">
                        <div class="product-image">
                            <div class="award-badge-product">
                                <i class="fas fa-star"></i>Best Seller
                            </div>
                            <div class="product-bag" style="background: linear-gradient(145deg, #228B22, #32CD32);">
                                <span style="color: white; font-weight: bold;">CALAMANSI</span>
                            </div>
                        </div>
                        <div class="product-info">
                            <h5 class="product-name">Calamansi Serafina</h5>
                            <p class="text-muted">Zesty citrus flavor in every bite</p>
                            <button class="btn-view-details" onclick="showProductDetails('calamansi')">
                                View Details
                            </button>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="product-card">
                        <div class="product-image">
                            <div class="award-badge-product">
                                <i class="fas fa-medal"></i>Customer's Choice
                            </div>
                            <div class="product-bag" style="background: linear-gradient(145deg, #FF8C00, #FFA500);">
                                <span style="color: white; font-weight: bold;">PRETZEL</span>
                            </div>
                        </div>
                        <div class="product-info">
                            <h5 class="product-name">Mango Glazed Pretzel Sticks</h5>
                            <p class="text-muted">Crunchy pretzel sticks with mango glaze</p>
                            <button class="btn-view-details" onclick="showProductDetails('pretzel-sticks')">
                                View Details
                            </button>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="product-card">
                        <div class="product-image">
                            <div class="product-bag" style="background: linear-gradient(145deg, #FF1493, #FF69B4);">
                                <span style="color: white; font-weight: bold;">DRAGON</span>
                            </div>
                        </div>
                        <div class="product-info">
                            <h5 class="product-name">Dragon Fruit Serafina</h5>
                            <p class="text-muted">Exotic dragon fruit flavor delight</p>
                            <button class="btn-view-details" onclick="showProductDetails('dragon-fruit')">
                                View Details
                            </button>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="product-card">
                        <div class="product-image">
                            <div class="product-bag" style="background: linear-gradient(145deg, #DAA520, #FFD700);">
                                <span style="color: white; font-weight: bold;">MANGO</span>
                            </div>
                        </div>
                        <div class="product-info">
                            <h5 class="product-name">Mango Serafina</h5>
                            <p class="text-muted">Classic mango flavor perfection</p>
                            <button class="btn-view-details" onclick="showProductDetails('mango-classic')">
                                View Details
                            </button>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="product-card">
                        <div class="product-image">
                            <div class="product-bag" style="background: linear-gradient(145deg, #F5F5DC, #FFFACD);">
                                <span style="color: #333; font-weight: bold;">GARLIC</span>
                            </div>
                        </div>
                        <div class="product-info">
                            <h5 class="product-name">Garlic Sticks</h5>
                            <p class="text-muted">Savory garlic-flavored snack sticks</p>
                            <button class="btn-view-details" onclick="showProductDetails('garlic-sticks')">
                                View Details
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


<?php get_footer(); ?>

