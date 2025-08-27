<?php wp_head(); ?>

     <!-- Back Arrow -->
        <div class="mt-4 mx-3">
         
                <a href="<?php echo home_url( '/blog' ); ?>" class="btn btn-light">
                   <i class="fa-solid fa-arrow-left"></i> Back to Blog
                </a>
         
        </div>
        <div id="main-content" class="blog-page" style="margin-top: 80px; margin-bottom: 80px;">
            <div class="container">
        
        <div class="row clearfix">
            
            <!-- Left Blog Content -->
            <div class="col-lg-8 col-md-12 left-box">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <div class="card single_post">
                        <div class="body">
                            <!-- Featured Image -->
                            <div class="img-post">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('large', ['class' => 'd-block img-fluid']); ?>
                                <?php else : ?>
                                    <img class="d-block img-fluid" src="<?php echo get_template_directory_uri(); ?>/assets/images/blog/default.png" alt="<?php the_title(); ?>">
                                <?php endif; ?>
                            </div>

                            <!-- Title -->
                            <h3><?php the_title(); ?></h3>

                            <!-- Content -->
                            <p class="content" style="font-size:14px"><?php the_content(); ?></p>
                        </div>
                    </div>

                    <!-- Comments -->
                    <div class="card">
                        <div class="header">
                            <h2><?php comments_number('No Comments', '1 Comment', '% Comments'); ?></h2>
                        </div>
                        <div class="body">
                            <?php comments_template(); ?>
                        </div>
                    </div>
                <?php endwhile; endif; ?>
            </div>

            <!-- Right Sidebar -->
            <div class="col-lg-4 col-md-12 right-box">
                
                <!-- Search -->
                <!-- <div class="card">
                    <div class="body search">
                        <?php get_search_form(); ?>
                    </div>
                </div> -->

                <!-- Categories -->
                <!-- <div class="card">
                    <div class="header">
                        <h2>Categories</h2>
                    </div>
                    <div class="body widget">
                        <ul class="list-unstyled categories-clouds m-b-0">
                            <?php wp_list_categories(array(
                                'title_li' => '',
                                'style'    => 'list',
                            )); ?>
                        </ul>
                    </div>
                </div> -->

                <!-- Recent Posts -->
                <div class="card">
                    <div class="header">
                        <h2>Recent Posts</h2>
                    </div>
                    <div class="body widget popular-post">
                        <?php
                        $recent = new WP_Query(array('posts_per_page' => 3));
                        while ($recent->have_posts()) : $recent->the_post(); ?>
                            <div class="single_post">
                                <p class="m-b-0"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
                                <span><?php echo get_the_date(); ?></span>
                                <div class="img-post">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <?php the_post_thumbnail('thumbnail'); ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endwhile; wp_reset_postdata(); ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
