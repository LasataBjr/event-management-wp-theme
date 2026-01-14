// Save ACF JSON to theme
add_filter('acf/settings/save_json', function ($path) {
    $path = get_stylesheet_directory() . '/acf-json';
    return $path;
});

// Load ACF JSON from theme
add_filter('acf/settings/load_json', function ($paths) {
    unset($paths[0]); // remove default path
    $paths[] = get_stylesheet_directory() . '/acf-json';
    return $paths;
});
