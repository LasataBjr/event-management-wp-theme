<?php
/**
 * Featured Services Section for Homepage
 */

$featured_services = new WP_Query([
    'post_type'      => 'service',
    'posts_per_page' => 4, // show 4 services
    'post_status'    => 'publish',
]);

if ($featured_services->have_posts()): ?>
<section class="featured-services max-w-7xl mx-auto px-4 sm:px-8 lg:px-16 py-16">
    <h2 class="text-4xl font-bold mb-12 text-center">Our Featured Services</h2>
    <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-8">
        <?php while ($featured_services->have_posts()): $featured_services->the_post(); 
            $hero_image = get_field('hero_image');
            $short_desc = get_field('short_description');
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
        ?>
        <div class="service-card border rounded-lg overflow-hidden shadow hover:shadow-lg transition">
            <?php if ($img_url): ?>
                <a href="<?php the_permalink(); ?>">
                    <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($img_alt); ?>" class="w-full h-48 object-cover">
                </a>
            <?php endif; ?>
            <div class="p-4">
                <h3 class="text-xl font-semibold mb-2"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <?php if ($short_desc): ?>
                    <p class="text-gray-700"><?php echo esc_html($short_desc); ?></p>
                <?php endif; ?>
                <a href="<?php the_permalink(); ?>" class="inline-block mt-4 text-tt-dark-navy hover:underline">Read More</a>
            </div>
        </div>
        <?php endwhile; wp_reset_postdata(); ?>
    </div>

    <!-- Button to Services Page -->
    <div class="text-center mt-12">
        <a href="<?php echo esc_url(site_url('/services')); ?>" 
           class="btn-primary">
           View All Services
        </a>
    </div>
</section>
<?php endif; ?>
