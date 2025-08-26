
<?php get_header(); ?>
<section id="blog" class="blog py-5">
    <div class="container">
        <div class="row mt-n5">
            <?php
            // Query latest blog posts
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 6, 
            );
            $query = new WP_Query($args);

            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();
            ?>
                <div class="col-md-6 col-lg-4 mt-5 wow fadeInUp" data-wow-delay=".2s">
                    <div class="blog-grid">
                        <div class="blog-grid-img position-relative">
                            <?php if (has_post_thumbnail()) : ?>
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('medium', ['class' => 'img-fluid']); ?>
                                </a>
                            <?php else : ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/blog/default.png" alt="<?php the_title(); ?>">
                            <?php endif; ?>
                        </div>
                        <div class="blog-grid-text p-4">
                            <h3 class="h5 mb-3">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>
                           <p class="display-30">
                                        <?php 
                                            echo wp_trim_words( get_the_excerpt(), 20, '... <a href="'. get_permalink() .'">Read more</a>' ); ?>
                            </p>

                            <div class="meta meta-style2">
                                <ul>
                                    <li><i class="fas fa-calendar-alt"></i> <?php echo get_the_date('d M, Y'); ?></li>
                                    <li><i class="fas fa-user"></i> <?php the_author(); ?></li>
                                    <li><i class="fas fa-comments"></i> <?php comments_number('0', '1', '%'); ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
                echo '<p class="text-center">No blog posts found.</p>';
            endif;
            ?>
        </div>

        <!-- Pagination -->
        <div class="row mt-6 wow fadeInUp" data-wow-delay=".6s">
            <div class="col-12">
                <div class="pagination text-small text-uppercase text-extra-dark-gray">
                    <?php
                    the_posts_pagination(array(
                        'mid_size'  => 2,
                        'prev_text' => __('<i class="fas fa-long-arrow-alt-left me-1"></i> Prev'),
                        'next_text' => __('Next <i class="fas fa-long-arrow-alt-right ms-1"></i>'),
                    ));
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
