<?php
/*
Template Name: Services
*/
get_header();
?>

<main class="services-page max-w-7xl mx-auto px-4 sm:px-8 lg:px-16 py-16">

    <h1 class="text-4xl font-bold mb-12 text-center">Our Services</h1>

    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
        <?php
        $services = new WP_Query([
            'post_type' => 'services', 
            'posts_per_page' => -1
        ]);

        if ($services->have_posts()):
            while ($services->have_posts()): $services->the_post();
            
            $short_desc = get_field('short_description');
            $hero_image = get_field('hero_image');
        ?>
            <div class="service-card border rounded-lg overflow-hidden shadow hover:shadow-lg transition">
                <?php if ($hero_image): ?>
                    <a href="<?php the_permalink(); ?>">
                        <img src="<?php echo esc_url($hero_image['url']); ?>" alt="<?php echo esc_attr($hero_image['alt']); ?>" class="w-full h-48 object-cover">
                    </a>
                <?php endif; ?>
                <div class="p-4">
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
