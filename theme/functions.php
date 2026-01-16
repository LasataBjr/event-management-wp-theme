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
    // Get parent directory path and URL (one level up from theme folder where dist/ is located)
    $theme_path = get_template_directory();
    $theme_url = get_template_directory_uri();
    $parent_path = dirname($theme_path);
    $parent_url = dirname($theme_url);
    
    $css_path = $parent_path . '/dist/output.css';
    $css_url = $parent_url . '/dist/output.css';
    
    // Only enqueue if file exists
    if (file_exists($css_path)) {
        wp_enqueue_style('tailwind', $css_url, [], filemtime($css_path));
    }
}
add_action('wp_enqueue_scripts', 'ev_enqueue_styles');