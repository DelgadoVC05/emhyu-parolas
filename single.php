<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <?php wp_head(); ?>
</head>
<body>

<!-- Navigation Bar -->
<div class="blog-navigation">
    <div class="container">
        <div class="nav-content">
            <a href="<?php echo home_url('/blog'); ?>" class="back-btn">
                <i class="fas fa-arrow-left"></i>
                <span>Back to Blog</span>
            </a>
            <div class="reading-time">
                <i class="fas fa-clock"></i>
               <?php $time = reading_time(); ?>
             <span>
                <?php 
                    echo $time > 0 
                        ? $time . ' ' . ($time > 1 ? 'mins' : 'min') . ' read' 
                        : 'Less than 1 min read';
                ?>
            </span>

            </div>
        </div>
    </div>
</div>

<main id="main-content" class="single-blog-page">
    <div class="container">
        <div class="row">
            
            <!-- Main Article Content -->
            <div class="col-lg-8">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <article class="blog-article">
                        
                        <!-- Article Header -->
                        <header class="article-header">
                   
                            <!-- Title -->
                            <h1 class="article-title"><?php the_title(); ?></h1>
                            
                            <!-- Meta Information -->
                            <div class="article-meta">
                                <div class="meta-left">
                                    <div class="author-info">
                                        <?php echo get_avatar(get_the_author_meta('ID'), 40, '', '', ['class' => 'author-avatar']); ?>
                                        <div class="author-details">
                                            <span class="author-name">By <?php the_author(); ?></span>
                                            <time class="publish-date" datetime="<?php echo get_the_date('c'); ?>">
                                                <?php echo get_the_date('F j, Y'); ?>
                                            </time>
                                        </div>
                                    </div>
                                </div>
                             
                            </div>
                        </header>
                        
                        <!-- Featured Image -->
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="featured-image">
                                <?php the_post_thumbnail('large', [
                                    'class' => 'img-fluid article-image',
                                    'loading' => 'eager'
                                ]); ?>
                            </div>
                        <?php endif; ?>
                        
                        <!-- Article Content -->
                        <div class="article-content">
                            <?php the_content(); ?>
                        </div>
                        
                 
                    </article>
                    
                    <!-- Navigation Between Posts -->
                    <nav class="post-navigation">
                        <div class="nav-links">
                            <?php
                            $prev_post = get_previous_post();
                            $next_post = get_next_post();
                            ?>
                            
                            <?php if ($prev_post) : ?>
                                <div class="nav-previous">
                                    <span class="nav-subtitle">Previous Article</span>
                                    <a href="<?php echo get_permalink($prev_post); ?>" class="nav-link">
                                        <i class="fas fa-arrow-left"></i>
                                        <?php echo wp_trim_words($prev_post->post_title, 8); ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                            
                            <?php if ($next_post) : ?>
                                <div class="nav-next">
                                    <span class="nav-subtitle">Next Article</span>
                                    <a href="<?php echo get_permalink($next_post); ?>" class="nav-link">
                                        <?php echo wp_trim_words($next_post->post_title, 8); ?>
                                        <i class="fas fa-arrow-right"></i>
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </nav>
                    
                    <!-- Comments Section -->
                    <section class="comments-section">
                        <div class="comments-header">
                            <h3>
                                <i class="fas fa-comments"></i>
                                <?php comments_number('Start the Discussion', 'One Comment', '% Comments'); ?>
                            </h3>
                        </div>
                        <div class="comments-content">
                            <?php comments_template(); ?>
                        </div>
                    </section>
                    
                <?php endwhile; endif; ?>
            </div>
            
            <!-- Sidebar -->
            <aside class="col-lg-4">
                <div class="sidebar-sticky">
                    
                
                    <!-- <div class="sidebar-widget toc-widget">
                        <h4 class="widget-title">
                            <i class="fas fa-list"></i>
                            Table of Contents
                        </h4>
                        <nav class="table-of-contents" id="tableOfContents">
                    
                        </nav>
                    </div> -->
                    
                    <!-- Recent Posts -->
                    <div class="sidebar-widget">
                        <h4 class="widget-title">
                            <i class="fas fa-newspaper"></i>
                            Recent Posts
                        </h4>
                        <div class="recent-posts">
                            <?php
                            $recent = new WP_Query(array(
                                'posts_per_page' => 4,
                                'post__not_in' => array(get_the_ID())
                            ));
                            while ($recent->have_posts()) : $recent->the_post(); ?>
                                <article class="recent-post-item">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <div class="recent-post-thumb">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php the_post_thumbnail('thumbnail'); ?>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                    <div class="recent-post-content">
                                        <h5 class="recent-post-title">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php echo wp_trim_words(get_the_title(), 8); ?>
                                            </a>
                                        </h5>
                                        <time class="recent-post-date">
                                            <?php echo get_the_date('M j, Y'); ?>
                                        </time>
                                    </div>
                                </article>
                            <?php endwhile; wp_reset_postdata(); ?>
                        </div>
                    </div>
                    
                    <!-- Categories -->
                    <!-- <div class="sidebar-widget">
                        <h4 class="widget-title">
                            <i class="fas fa-folder-open"></i>
                            Categories
                        </h4>
                        <div class="categories-list">
                            <?php wp_list_categories(array(
                                'title_li' => '',
                                'show_count' => true,
                                'style' => 'list',
                            )); ?>
                        </div>
                    </div> -->
                    
                </div>
            </aside>
        </div>
    </div>
</main>




    <?php get_template_part('includes/footer');?>
    <!-- Reading Time Function -->
    <?php
    function reading_time() {
        $content = get_post_field('post_content', get_the_ID());
        $word_count = str_word_count(strip_tags($content));
        $reading_time = ceil($word_count / 200);
        return max(1, $reading_time);
    }
    ?>

   <script>


// Social Share Functionality
document.addEventListener('DOMContentLoaded', function() {
    const shareButtons = document.querySelectorAll('.share-buttons a');
    const currentUrl = window.location.href;
    const title = document.title;
    
    shareButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const platform = this.dataset.platform;
            
            let shareUrl = '';
            
            switch(platform) {
                case 'facebook':
                    shareUrl = `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(currentUrl)}`;
                    break;
                case 'twitter':
                    shareUrl = `https://twitter.com/intent/tweet?url=${encodeURIComponent(currentUrl)}&text=${encodeURIComponent(title)}`;
                    break;
                case 'linkedin':
                    shareUrl = `https://www.linkedin.com/sharing/share-offsite/?url=${encodeURIComponent(currentUrl)}`;
                    break;
                case 'copy':
                    navigator.clipboard.writeText(currentUrl).then(() => {
                        alert('Link copied to clipboard!');
                    });
                    return;
            }
            
            if (shareUrl) {
                window.open(shareUrl, '_blank', 'width=600,height=400');
            }
        });
    });
});


</script>
    
</body>
</html>

