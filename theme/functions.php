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

include_once get_template_directory() . '/inc/ties/ties.php';





