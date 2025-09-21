<?php get_header(); ?>
<section id="blog" class="blog py-5">

  <div class="section-title mt-5 fade-title">
        <h2 class="display-5 fw-bold mb-4">Blog</h2>
        <p class="sub-title">Behind the Brand – Awards, Innovations & Local Stories</p>
    </div>
     
    <div class="container">
    <div class="row mt-n5">
        <?php
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => 6, 
        );
        $query = new WP_Query($args);
        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post();
        ?>
            <div class="col-md-6 col-lg-4 mt-5">
                <article class="blog-card fade-card">
                
                  <?php if (has_post_thumbnail()) : ?>
                        <?php $img_url = get_the_post_thumbnail_url(null, 'square-thumb'); ?>
                    <?php else : ?>
                        <?php $img_url = get_template_directory_uri() . '/assets/images/blog/default.png'; ?>
                    <?php endif; ?>

                   <div class="blog-card-image lazy-bg" data-bg="<?php echo $img_url; ?>">
                        <a href="<?php the_permalink(); ?>" class="image-link">
                            <div class="blog-image-overlay">
                                <span class="read-more-btn">Read Article</span>
                            </div>
                        </a>
                    </div>

                    <div class="blog-card-content">
                        <h3 class="blog-title">
                            <a href="<?php the_permalink(); ?>" class="title-link">
                                <?php echo wp_trim_words(get_the_title(), 10, '...'); ?>
                            </a>
                        </h3>
                        <p class="blog-excerpt">
                           <?php echo wp_trim_words( get_the_excerpt(), 20, '... <a href="'. get_permalink() .'">Read more</a>' ); ?>
                        </p>
                        <div class="blog-footer">
                            <div class="author-info">
                                <?php echo get_avatar(get_the_author_meta('ID'), 32, '', '', ['class' => 'author-avatar']); ?>
                                <span class="author-name"><?php the_author(); ?></span>
                            </div>
                             <span class="meta-item text-muted text-small" style="font-size: 12px;">
                                <i class="fas fa-calendar-alt"></i>
                                <time datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date('M d, Y'); ?></time>
                            </span>
                        </div>
                    </div>
                </article>
            </div>
        <?php
            endwhile;
            wp_reset_postdata();
        else :
            echo '<div class="col-12"><p class="no-posts-message">No blog posts found.</p></div>';
        endif;
        ?>
    </div>
    
    <!-- Enhanced Pagination -->
    <div class="row mt-6 fade-pagination">
        <div class="col-12">
            <div class="blog-pagination">
                <?php
                the_posts_pagination(array(
                    'mid_size'  => 2,
                    'prev_text' => __('<i class="fas fa-chevron-left"></i> Previous'),
                    'next_text' => __('Next <i class="fas fa-chevron-right"></i>'),
                    'before_page_number' => '<span class="screen-reader-text">Page </span>',
                ));
                ?>
            </div>
        </div>
    </div>
</div>

</section>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const lazyBackgrounds = document.querySelectorAll(".lazy-bg");

    if ("IntersectionObserver" in window) {
        let lazyBgObserver = new IntersectionObserver(function(entries, observer) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    let lazyBg = entry.target;
                    lazyBg.style.backgroundImage = "url('" + lazyBg.dataset.bg + "')";
                    lazyBg.classList.remove("lazy-bg");
                    lazyBgObserver.unobserve(lazyBg);
                }
            });
        });

        lazyBackgrounds.forEach(function(lazyBg) {
            lazyBgObserver.observe(lazyBg);
        });

   
    } else {
   
        lazyBackgrounds.forEach(function(lazyBg) {
            lazyBg.style.backgroundImage = "url('" + lazyBg.dataset.bg + "')";
        });
    }
});
</script>

<?php get_footer(); ?>
