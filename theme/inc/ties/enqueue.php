<?php

/* ----------------------------------
 * Enqueue Styles
 * ---------------------------------- */
function ev_enqueue_styles() {
    // Path to the main style.css in the theme root
    $css_file = get_template_directory() . '/style.css';
    $css_url  = get_stylesheet_uri();

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

?>