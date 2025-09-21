<?php
/**
 * Theme Setup
 */
function emhyuparolas_theme_support() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('automatic-feed-links');
    add_image_size('square-thumb', 300, 300, true);
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
    wp_enqueue_style('font-awesome-css', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css', array(), '7.0.0', 'all');
    wp_enqueue_style('glightbox-css', 'https://cdnjs.cloudflare.com/ajax/libs/glightbox/3.3.1/css/glightbox.min.css', array(), '3.3.1', 'all');
    wp_enqueue_style('emhyuparolas-style', get_template_directory_uri() . '/assets/css/style.css', array(), $version, 'all');
}
add_action('wp_enqueue_scripts', 'emhyuparolas_theme_styles');



function enqueue_contact_form_script() {

    if (is_page('contacts')) { 
        wp_enqueue_script(
            'contact-form-script',
            get_template_directory_uri() . '/assets/js/contact-form.js',
            array('recaptcha-js', 'emailjs-sdk'),
            '1.0',
            true
        );
  
    // Pass configuration to JavaScript
    wp_localize_script(
        'contact-form-script', 
        'my_form_ajax',
        array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('contact_form_nonce'),
            'site_key' => RECAPTCHA_SITE_KEY,
            'emailjs_service_id' => EMAILJS_SERVICE_ID,
            'emailjs_template_id' => EMAILJS_TEMPLATE_ID,
            'emailjs_public_key' => EMAILJS_PUBLIC_KEY,
        )
    );


        wp_enqueue_script('purify-js', 'https://cdn.jsdelivr.net/npm/dompurify@2.4.0/dist/purify.min.js', array(), '2.4.0', true);
    // EmailJS SDK
    wp_enqueue_script(
        'emailjs-sdk',
        'https://cdn.jsdelivr.net/npm/@emailjs/browser@4/dist/email.min.js',
        array(),
        '4.0.0',
        true
    );
    
    // reCAPTCHA
    wp_enqueue_script(
        'recaptcha-js',
        'https://www.google.com/recaptcha/api.js?render=' . RECAPTCHA_SITE_KEY,
        array(),
        null,
        true
    );


    }
}
add_action('wp_enqueue_scripts', 'enqueue_contact_form_script');




function emhyuparolas_register_scripts() {
    $version = wp_get_theme()->get('Version');
    
    // JS Libraries
    wp_enqueue_script('emhyuparolas-bootstrap-js', 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.8/js/bootstrap.bundle.min.js', array(), '5.3.8', true);
    wp_enqueue_script('gsap-js', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js', array(), '3.12.5', true);
    wp_enqueue_script('ScrollTrigger-js', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js', array('gsap-js'), '3.12.5', true);
    wp_enqueue_script('glightbox-js', 'https://cdnjs.cloudflare.com/ajax/libs/glightbox/3.3.1/js/glightbox.min.js', array(), '3.3.1', true);

    // ✅ Your main custom JS file
    wp_enqueue_script(
        'emhyuparolas-main-js',
        get_template_directory_uri() . '/assets/js/script.js',
        array('jquery', 'gsap-js', 'ScrollTrigger-js', 'glightbox-js', 'emhyuparolas-bootstrap-js'),
        $version,
        true
    );
}
add_action('wp_enqueue_scripts', 'emhyuparolas_register_scripts');


// AJAX handler for reCAPTCHA verification only
add_action('wp_ajax_verify_recaptcha', 'handle_recaptcha_verification');
add_action('wp_ajax_nopriv_verify_recaptcha', 'handle_recaptcha_verification');

function handle_recaptcha_verification() {
    error_log('=== reCAPTCHA VERIFICATION STARTED ===');
    
    // Verify nonce
    if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'contact_form_nonce')) {
        error_log('Nonce verification failed');
        wp_send_json_error('Security check failed');
        return;
    }
    
    // Check if reCAPTCHA secret key is defined
    if (!defined('RECAPTCHA_SECRET_KEY') || empty(RECAPTCHA_SECRET_KEY)) {
        error_log('RECAPTCHA_SECRET_KEY not defined or empty');
        wp_send_json_error('reCAPTCHA not configured');
        return;
    }
    
    // Get reCAPTCHA token
    $recaptcha_token = sanitize_text_field($_POST['recaptcha_token'] ?? '');
    
    if (empty($recaptcha_token)) {
        error_log('reCAPTCHA token missing');
        wp_send_json_error('reCAPTCHA token missing');
        return;
    }
    
    error_log('Verifying reCAPTCHA token: ' . substr($recaptcha_token, 0, 50) . '...');
    
    // Verify with Google
    $recaptcha_response = wp_remote_post('https://www.google.com/recaptcha/api/siteverify', [
        'body' => [
            'secret' => RECAPTCHA_SECRET_KEY,
            'response' => $recaptcha_token,
        ],
        'timeout' => 10
    ]);
    
    if (is_wp_error($recaptcha_response)) {
        error_log('reCAPTCHA API error: ' . $recaptcha_response->get_error_message());
        wp_send_json_error('reCAPTCHA verification failed');
        return;
    }
    
    $recaptcha_data = json_decode(wp_remote_retrieve_body($recaptcha_response));
    error_log('reCAPTCHA response: ' . print_r($recaptcha_data, true));
    
    if (!isset($recaptcha_data->success) || $recaptcha_data->success !== true) {
        error_log('reCAPTCHA verification failed');
        if (isset($recaptcha_data->{'error-codes'})) {
            error_log('reCAPTCHA error codes: ' . print_r($recaptcha_data->{'error-codes'}, true));
        }
        wp_send_json_error('reCAPTCHA verification failed');
        return;
    }
    
    // Check score (if available)
    if (isset($recaptcha_data->score)) {
        error_log('reCAPTCHA score: ' . $recaptcha_data->score);
        if ($recaptcha_data->score < 0.5) {
            error_log('reCAPTCHA score too low: ' . $recaptcha_data->score);
            wp_send_json_error('reCAPTCHA score too low');
            return;
        }
    }
    
    error_log('reCAPTCHA verification successful');
    error_log('=== reCAPTCHA VERIFICATION ENDED ===');
    
    wp_send_json_success('reCAPTCHA verified');
}
?>