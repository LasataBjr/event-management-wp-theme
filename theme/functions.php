<?php
/**
 * Theme Functions
 * 
 * @package Event-Management-theme
 */

function ev_register_menus() {
    register_nav_menus([
        'primary_menu' => 'Primary Menu',
    ]);
}
add_action('after_setup_theme', 'ev_register_menus');

/* ----------------------------------
 * Enqueue Styles
 * ---------------------------------- */
function ev_enqueue_styles() {
    // Go up one level from theme directory to access dist folder
    $css_file = dirname(get_template_directory()) . '/dist/output.css';
    $css_url  = dirname(get_template_directory_uri()) . '/dist/output.css';

    if (file_exists($css_file)) {
        wp_enqueue_style('tailwind', $css_url, [], filemtime($css_file));
    } else {
        // Debug: Log if file doesn't exist
        error_log('Tailwind CSS file not found: ' . $css_file);
    }

    // Custom CSS for specific components/sections 
    $custom_css_file = get_template_directory() . '/css/custom.css'; 
    $custom_css_url = get_template_directory_uri() . '/css/custom.css'; 
    if (file_exists($custom_css_file)) {
         wp_enqueue_style( 'theme-custom', 
         $custom_css_url, ['tailwind'], // depends on Tailwind 
         filemtime($custom_css_file) ); 
    } else {
         error_log('Custom CSS not found: ' . $custom_css_file);
    }
}
add_action('wp_enqueue_scripts', 'ev_enqueue_styles');

/* ----------------------------------
 * Enqueue Scripts (ESBUILD OUTPUT)
 * ---------------------------------- */
function ev_enqueue_scripts() {

    $js_file = get_template_directory() . '/js/script.js';
    $js_url  = get_template_directory_uri() . '/js/script.js';

    if (file_exists($js_file)) {
        wp_enqueue_script(
            'theme-script',
            $js_url,
            ['jquery'],
            filemtime($js_file),
            true
        );

        wp_localize_script('theme-script', 'contactAjax', [
            'ajax_url' => admin_url('admin-ajax.php')
        ]);
    }
}
add_action('wp_enqueue_scripts', 'ev_enqueue_scripts');


/* ----------------------------------
 * AJAX Contact Handler (SAVE + EMAIL)
 * ---------------------------------- */
function ev_handle_ajax_contact_form() {

    // Allow only POST
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        wp_send_json_error('Invalid request.');
    }

    // Nonce check
    if (
        !isset($_POST['security']) ||
        !wp_verify_nonce($_POST['security'], 'ajax_contact_nonce')
    ) {
        wp_send_json_error('Security check failed.');
    }

    // Sanitize
    $name    = sanitize_text_field($_POST['name'] ?? '');
    $email   = sanitize_email($_POST['email'] ?? '');
    $message = sanitize_textarea_field($_POST['message'] ?? '');
    $address = sanitize_text_field($_POST['address'] ?? '');

    if (empty($name) || empty($email) || empty($address) || empty($message)) {
        wp_send_json_error('All fields are required.');
    }
    

    if (!is_email($email)) {
        wp_send_json_error('Invalid email address.');
    }

    /* -------------------------
     * Save to CPT
     * ------------------------- */
    $post_id = wp_insert_post([
        'post_type'   => 'contact_submission',
        'post_status' => 'publish',
        'post_title'  => $name,
    ]);

    if (!$post_id) {
        wp_send_json_error('Failed to save submission.');
    }

    update_post_meta($post_id, 'email', $email);
    update_post_meta($post_id, 'address', $address);
    update_post_meta($post_id, 'message', $message);
    update_post_meta($post_id, 'submitted_at', current_time('mysql'));

    /* -------------------------
     * Send Email
     * ------------------------- */
    $to = get_option('admin_email');
    $subject = 'New Contact Form Message';

    $headers = [
        'Content-Type: text/plain; charset=UTF-8',
        'From: Website Contact <no-reply@yourdomain.com>',
        "Reply-To: $email"
    ];

    $body = "Name: $name\nEmail: $email\n\nAddress: $address\n\nMessage:\n$message";

    if (!wp_mail($to, $subject, $body, $headers)) {
        wp_send_json_error('Email failed, but data saved.');
    }

    wp_send_json_success('Message sent successfully!');
}

add_action('wp_ajax_submit_contact_form', 'ev_handle_ajax_contact_form');
add_action('wp_ajax_nopriv_submit_contact_form', 'ev_handle_ajax_contact_form');



function register_contact_submission_cpt() {
    register_post_type('contact_submission', [
        'labels' => [
            'name' => 'Contact Submissions',
            'singular_name' => 'Contact Submission',
        ],
        'public' => false,
        'show_ui' => true,
        'supports' => ['title'],
        'menu_icon' => 'dashicons-email-alt'
    ]);
}
add_action('init', 'register_contact_submission_cpt');


// Register Services CPT
function register_services_cpt() {
    register_post_type('service', [
        'labels' => [
            'name' => 'Services',
            'singular_name' => 'Service',
            'add_new' => 'Add New Service',
            'edit_item' => 'Edit Service',
            'view_item' => 'View Service',
            'all_items' => 'All Services',
        ],
        'public' => true,
        'has_archive' => true,
        'rewrite' => ['slug' => 'services'],
        'supports' => ['title', 'editor', 'thumbnail', 'excerpt'],
        'show_in_rest' => true,
        'menu_icon' => 'dashicons-hammer',
    ]);
}
add_action('init', 'register_services_cpt');

// Register Service Categories taxonomy
function register_service_categories() {
    $labels = [
        'name'              => 'Service Categories',
        'singular_name'     => 'Service Category',
        'search_items'      => 'Search Categories',
        'all_items'         => 'All Categories',
        'edit_item'         => 'Edit Category',
        'update_item'       => 'Update Category',
        'add_new_item'      => 'Add New Category',
        'new_item_name'     => 'New Category Name',
        'menu_name'         => 'Service Categories',
    ];

    register_taxonomy('service_category', ['service'], [
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'rewrite'           => ['slug' => 'service-category'],
    ]);
}
add_action('init', 'register_service_categories');

// Flush rewrite rules on theme activation
function ev_flush_rewrites_services() {
    register_services_cpt();
    register_service_categories();
    flush_rewrite_rules();
}
add_action('after_switch_theme', 'ev_flush_rewrites_services');
