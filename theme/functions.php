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
}
add_action('wp_enqueue_scripts', 'ev_enqueue_styles');


