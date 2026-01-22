<?php get_header(); ?>

<main class="services-page max-w-7xl mx-auto px-4 sm:px-8 lg:px-16 py-16">

    <h1 class="text-4xl font-bold mb-12 text-center">Our Services</h1>

    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
        <?php
        $services = new WP_Query([
            'post_type'      => 'service',
            'posts_per_page' => -1,
            'post_status'    => 'publish',
        ]);

        if ($services->have_posts()):
            while ($services->have_posts()): $services->the_post();

                // Short description
                $short_desc = get_field('short_description');

                // Hero image
                $hero_image = get_field('hero_image');
                $img_url = '';
                $img_alt = '';
                if ($hero_image) {
                    if (is_array($hero_image)) {
                        $img_url = $hero_image['url'];
                        $img_alt = $hero_image['alt'] ?: get_the_title();
                    } else {
                        $img_url = $hero_image;
                        $img_alt = get_the_title();
                    }
                }

                // Service categories
                $terms = get_the_terms(get_the_ID(), 'service_category');
                $categories = [];
                if ($terms && !is_wp_error($terms)) {
                    $categories = wp_list_pluck($terms, 'name');
                }
        ?>
                <div class="card border rounded-lg overflow-hidden shadow hover:shadow-lg transition">
                    <?php if ($img_url): ?>
                        <a href="<?php the_permalink(); ?>">
                            <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($img_alt); ?>" class="w-full h-48 object-cover">
                        </a>
                    <?php endif; ?>

                    <div class="p-4">
                        <?php if ($categories): ?>
                            <p class="text-sm text-gray-500 mb-2"><?php echo esc_html(implode(', ', $categories)); ?></p>
                        <?php endif; ?>

                        <h2 class="text-xl font-semibold mb-2"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

                        <?php if ($short_desc): ?>
                            <p class="text-gray-700"><?php echo esc_html($short_desc); ?></p>
                        <?php endif; ?>

                        <a href="<?php the_permalink(); ?>" class="inline-block mt-4 text-tt-dark-navy hover:underline">Read More</a>
                    </div>
                </div>
        <?php
            endwhile;
            wp_reset_postdata();
        else:
            echo '<p>No services found.</p>';
        endif;
        ?>
    </div>

</main>

<?php get_footer(); ?>
