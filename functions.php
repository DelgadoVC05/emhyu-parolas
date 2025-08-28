<?php
/**
 * Theme Setup
 */
function emhyuparolas_theme_support() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('automatic-feed-links');
}
add_action('after_setup_theme', 'emhyuparolas_theme_support');


function disable_wc_jquery_tabs() {
    wp_dequeue_script('jquery-ui-tabs');
}
add_action('wp_enqueue_scripts', 'disable_wc_jquery_tabs', 20);



/**
 * Register Menus
 */
function emhyuparolas_menus() {
    $locations = array(
        'primary' => "Navigation Menu Items",
        'footer'  => "Footer Menu Items",
    );
    register_nav_menus($locations);
}
add_action('init', 'emhyuparolas_menus');



/**
 * Enqueue Styles
 */
function emhyuparolas_theme_styles() {
    $version = wp_get_theme()->get('Version');

    // CSS
    wp_enqueue_style('emhyuparolas-bootstrap-css', 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.8/css/bootstrap.min.css', array(), '5.3.8', 'all');

    wp_enqueue_style('aos-css', 'https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css', array(), '2.3.4', 'all');
    wp_enqueue_style('font-awesome-css', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css', array(), '7.0.0', 'all');
    wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', array(), '11.0.0', 'all');
    wp_enqueue_style('glightbox-css', 'https://cdnjs.cloudflare.com/ajax/libs/glightbox/3.3.1/css/glightbox.min.css', array(), '3.3.1', 'all');

    wp_enqueue_style('emhyuparolas-style', get_template_directory_uri() . '/style.css', array(), $version, 'all');
}
add_action('wp_enqueue_scripts', 'emhyuparolas_theme_styles');


// Force HTTPS for assets
// add_filter('template_directory_uri', function($uri) {
//     return str_replace('http://', 'https://', $uri);
// });
// add_filter('stylesheet_directory_uri', function($uri) {
//     return str_replace('http://', 'https://', $uri);
// });


/**
 * Enqueue Scripts
 */
function emhyuparolas_register_scripts() {
    $version = wp_get_theme()->get('Version');

    // JS
    wp_enqueue_script('emhyuparolas-bootstrap-js', 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.8/js/bootstrap.bundle.min.js', array(), '5.3.8', true);

    wp_enqueue_script('aos-js', 'https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js', array(), '2.3.4', true);
    wp_enqueue_script('font-awesome-js', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/js/all.min.js', array(), '7.0.0', true);
    wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), '11.0.0', true);
    wp_enqueue_script('glightbox-js', 'https://cdnjs.cloudflare.com/ajax/libs/glightbox/3.3.1/js/glightbox.min.js', array(), '3.3.1', true);

    wp_enqueue_script('emhyuparolas-script', get_template_directory_uri() . '/assets/js/script.js', array('swiper-js', 'aos-js'), $version, true);
}
add_action('wp_enqueue_scripts', 'emhyuparolas_register_scripts');






// add_action('template_redirect', function() {
//     if (is_cart() || is_checkout() || is_account_page()) {
//         wp_redirect(home_url()); 
//         exit;
//     }
// });


remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);


// add_filter('woocommerce_get_price_html', '__return_empty_string');


add_action('wp_enqueue_scripts', function() {
    wp_dequeue_script('wc-cart-fragments');
}, 11);


add_action('wp_enqueue_scripts', function() {
    if (!is_woocommerce() && !is_cart() && !is_checkout()) {
        wp_dequeue_style('woocommerce-layout');
        wp_dequeue_style('woocommerce-general');
        wp_dequeue_style('woocommerce-smallscreen');
        wp_dequeue_script('wc-cart-fragments');
    }
}, 99);
