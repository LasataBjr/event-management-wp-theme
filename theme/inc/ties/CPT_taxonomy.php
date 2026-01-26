<?php
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

?>