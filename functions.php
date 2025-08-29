<?php
/**
 * Theme Setup
 */

define( 'RECAPTCHA_SITE_KEY', '6Lf48bYrAAAAAKYrdm3zGwqBmt2r_p2nDlaG4KUB' );
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

    // JS Libraries
    wp_enqueue_script('emhyuparolas-bootstrap-js', 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.8/js/bootstrap.bundle.min.js', array(), '5.3.8', true);
    wp_enqueue_script('aos-js', 'https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js', array(), '2.3.4', true);
    wp_enqueue_script('font-awesome-js', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/js/all.min.js', array(), '7.0.0', true);
    wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), '11.0.0', true);
    wp_enqueue_script('glightbox-js', 'https://cdnjs.cloudflare.com/ajax/libs/glightbox/3.3.1/js/glightbox.min.js', array(), '3.3.1', true);

    // Enqueue reCAPTCHA script with public Site Key
    wp_enqueue_script(
        'recaptcha-js',
        'https://www.google.com/recaptcha/api.js?render=' . RECAPTCHA_SITE_KEY,
        array(),
        null,
        true
    );

    // Main theme script
    wp_enqueue_script('emhyuparolas-script', get_template_directory_uri() . '/assets/js/script.js', array('swiper-js', 'aos-js'), $version, true);


    wp_enqueue_script(
        'contact-form-script',
        get_template_directory_uri() . '/assets/js/contact-form.js',
        array('recaptcha-js'), 
        '1.0',
        true
    );

    // Localize the contact form script
    wp_localize_script(
        'contact-form-script', 
        'my_form_ajax',
        array(
            'rest_url' => rest_url('my-theme/v1/send-email'),
            'nonce'    => wp_create_nonce('wp_rest'),
            'site_key' => RECAPTCHA_SITE_KEY, 
        )
    );
}

add_action('wp_enqueue_scripts', 'emhyuparolas_register_scripts');





add_action('template_redirect', function() {
    if (is_cart() || is_checkout() || is_account_page()) {
        wp_redirect(home_url()); 
        exit;
    }
});


remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);


add_filter('woocommerce_get_price_html', '__return_empty_string');


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




add_action( 'rest_api_init', function () {
    register_rest_route( 'my-theme/v1', '/send-email', [
        'methods'             => 'POST',
        'callback'            => 'my_theme_send_email',
        'permission_callback' => 'my_theme_permission_callback',
    ] );
} );



// --- Permission callback for the endpoint ---

function my_theme_permission_callback( WP_REST_Request $request ) {
    return wp_verify_nonce( $request->get_header( 'X-WP-Nonce' ), 'wp_rest' );
}

// --- Callback function to handle the Email.js API request ---
function my_theme_send_email( WP_REST_Request $request ) {
    // 1. Nonce and honeypot checks
    $nonce = $request->get_header('X-WP-Nonce');
    if ( ! wp_verify_nonce( $nonce, 'wp_rest' ) ) {
        return new WP_REST_Response( [ 'error' => 'Nonce verification failed' ], 403 );
    }

    $params = $request->get_json_params();
    $honeypot = isset( $params['website'] ) ? $params['website'] : '';
    if ( ! empty( $honeypot ) ) {
        return new WP_REST_Response( [ 'error' => 'Honeypot triggered.' ], 400 );
    }

    // 2. reCAPTCHA verification
    $recaptcha_token = isset( $params['recaptcha_token'] ) ? $params['recaptcha_token'] : '';
    if ( empty( $recaptcha_token ) ) {
         return new WP_REST_Response( [ 'error' => 'reCAPTCHA token missing.' ], 400 );
    }
    
    $recaptcha_response = wp_remote_post( 'https://www.google.com/recaptcha/api/siteverify', [
        'body' => [
            'secret'   => RECAPTCHA_SECRET_KEY,
            'response' => $recaptcha_token,
        ]
    ] );

    if ( is_wp_error( $recaptcha_response ) ) {
        return new WP_REST_Response( [ 'error' => 'reCAPTCHA API error: ' . $recaptcha_response->get_error_message() ], 500 );
    }

    $recaptcha_data = json_decode( wp_remote_retrieve_body( $recaptcha_response ) );
    if ( ! isset( $recaptcha_data->success ) || $recaptcha_data->success !== true || ! isset( $recaptcha_data->score ) || $recaptcha_data->score < 0.5 ) {
        return new WP_REST_Response( [ 'error' => 'reCAPTCHA verification failed.' ], 400 );
    }

    // 3. Sanitize and validate form data
    $name    = sanitize_text_field( $params['name'] );
    $email   = sanitize_email( $params['email'] );
    $subject = sanitize_text_field( $params['subject'] );
    $message = sanitize_textarea_field( $params['message'] );

    if ( empty( $name ) || ! is_email( $email ) || empty( $subject ) || empty( $message ) ) {
        return new WP_REST_Response( [ 'error' => 'Please fill all required fields correctly.' ], 400 );
    }

    // 4. Send email securely via Email.js API
    $data = [
        'service_id' => EMAILJS_SERVICE_ID,
        'template_id' => EMAILJS_TEMPLATE_ID,
        'user_id' => EMAILJS_PUBLIC_KEY,
        'accessToken' => EMAILJS_ACCESS_TOKEN, 
        'template_params' => [
            'from_name' => $name,
            'from_email' => $email,
            'subject' => $subject,
            'message' => $message,
        ]
    ];

    $response = wp_remote_post( 'https://api.emailjs.com/api/v1.0/email/send', [
        'body' => json_encode( $data ),
        'headers' => [
            'Content-Type' => 'application/json'
        ]
    ] );

    if ( is_wp_error( $response ) ) {
        return new WP_REST_Response( [ 'error' => 'Could not send email' ], 500 );
    }

    $body = wp_remote_retrieve_body( $response );
    return new WP_REST_Response( json_decode( $body ), wp_remote_retrieve_response_code( $response ) );
}

