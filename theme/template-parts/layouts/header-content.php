<div class="container mx-auto px-6 py-4 flex items-center justify-between bg-tt-light-bg">

    <!-- Logo -->
    <div class="text-2xl font-heading text-tt-dark-navy">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="hover:text-tt-pink-accent">
            <?php bloginfo('name'); ?>
        </a>
    </div>

    <!-- Navigation + Contact Button -->
    <nav class="flex items-center gap-6">
        <?php
        wp_nav_menu([
            'theme_location' => 'primary_menu',
            'container' => false,
            'menu_class' => 'flex gap-6 items-center list-none m-0 p-0 text-tt-dark-navy',
            'fallback_cb' => false,
            'depth' => 1,
            'link_before' => '<span class="hover:text-tt-pink-accent">',
            'link_after'  => '</span>',
        ]);
        ?>

        <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact-us'))); ?>"
           class="ml-4 inline-block rounded-full bg-tt-dark-navy px-5 py-2 text-tt-white hover:bg-tt-pink-accent">
            Contact Us
        </a>
    </nav>
</div>
