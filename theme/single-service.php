<?php get_header(); ?>

<main class="single-service-page bg-tt-light-bg">

<?php
if (have_posts()):
    while (have_posts()): the_post();

    /* -----------------------
     * Hero Section
     * ----------------------- */
    $hero_heading    = get_field('hero_heading');
    $hero_subheading = get_field('hero_subheading');
    $hero_image      = get_field('hero_image');

    /* -----------------------
     * Short Description
     * ----------------------- */
    $short_desc = get_field('short_description');

    /* -----------------------
     * Text Sections (3)
     * ----------------------- */
    $text_sections = [];
    for ($i = 1; $i <= 3; $i++) {
        $text_sections[] = [
            'heading' => get_field("text_section_{$i}_heading"),
            'content' => get_field("text_section_{$i}_content")
        ];
    }

    /* -----------------------
     * Pricing Blocks (3)
     * ----------------------- */
    $pricing_blocks = [];
    for ($i = 1; $i <= 3; $i++) {
        $name    = get_field("price_{$i}_name");
        $amount  = get_field("price_{$i}_amount");
        $details = get_field("price_{$i}_details");
        if ($name || $amount || $details) {
            $pricing_blocks[] = compact('name', 'amount', 'details');
        }
    }

    /* -----------------------
     * Image Sections (2)
     * ----------------------- */
    $image_sections = [];
    for ($i = 1; $i <= 2; $i++) {
        $image_sections[] = [
            'image'   => get_field("image_section_{$i}_image"),
            'caption' => get_field("image_section_{$i}_caption")
        ];
    }

    /* -----------------------
     * Gallery (4 images)
     * ----------------------- */
    $gallery_images = [];
    for ($i = 1; $i <= 4; $i++) {
        $img = get_field("gallery_image_{$i}");
        if ($img) $gallery_images[] = $img;
    }

    /* -----------------------
     * CTA Section
     * ----------------------- */
    $cta_heading     = get_field('cta_heading');
    $cta_text        = get_field('cta_text');
    $cta_button_text = get_field('cta_button_text');
    $cta_button_link = get_field('cta_button_link');

    $cta_url = '';
    if ($cta_button_link && is_array($cta_button_link)) {
        $cta_url = $cta_button_link['url'] ?? '';
        $cta_button_text = $cta_button_text ?: ($cta_button_link['title'] ?? 'Click Here');
    }
?>

<!-- Hero Section -->
<section class="hero-section py-16 lg:py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-16 text-center">
        <?php if ($hero_image): ?>
            <div class="hero-image-wrapper mb-8 lg:mb-12">
                <img src="<?php echo is_array($hero_image) ? esc_url($hero_image['url']) : esc_url($hero_image); ?>" 
                     alt="<?php echo is_array($hero_image) ? esc_attr($hero_image['alt']) : get_the_title(); ?>" 
                     class="hero-image mx-auto">
            </div>
        <?php endif; ?>

        <?php if ($hero_heading): ?>
            <h1 class="hero-heading text-4xl lg:text-5xl font-bold mb-4"><?php echo esc_html($hero_heading); ?></h1>
        <?php endif; ?>

        <?php if ($hero_subheading): ?>
            <p class="hero-subheading text-lg lg:text-xl text-gray-700"><?php echo esc_html($hero_subheading); ?></p>
        <?php endif; ?>
    </div>
</section>

<!-- Short Description -->
<?php if ($short_desc): ?>
<section class="short-description-section py-8 lg:py-12">
    <div class="max-w-4xl mx-auto px-4 sm:px-8 lg:px-16">
        <p class="short-description text-gray-600"><?php echo esc_html($short_desc); ?></p>
    </div>
</section>
<?php endif; ?>

<!-- Text Sections -->
<?php if ($text_sections): ?>
<section class="text-sections-wrapper py-8 lg:py-12">
    <div class="max-w-4xl mx-auto px-4 sm:px-8 lg:px-16">
        <?php foreach ($text_sections as $section): ?>
            <?php if ($section['heading'] || $section['content']): ?>
            <div class="text-section mb-8">
                <?php if ($section['heading']): ?>
                    <h2 class="section-heading text-2xl font-semibold mb-2"><?php echo esc_html($section['heading']); ?></h2>
                <?php endif; ?>
                <?php if ($section['content']): ?>
                    <div class="section-content text-gray-700"><?php echo wpautop(esc_html($section['content'])); ?></div>
                <?php endif; ?>
            </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</section>
<?php endif; ?>

<!-- Pricing Section -->
<?php if ($pricing_blocks): ?>
<section class="pricing-section py-12 lg:py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-16">
        <h2 class="pricing-section-title text-3xl font-bold mb-8 text-center">Pricing Options</h2>
        <div class="grid sm:grid-cols-1 md:grid-cols-3 gap-8">
            <?php foreach ($pricing_blocks as $index => $price): ?>
            <div class="pricing-card border rounded-lg p-6 bg-white shadow hover:shadow-lg transition">
                <?php if ($price['name']): ?>
                    <h3 class="pricing-name text-xl font-semibold mb-2"><?php echo esc_html($price['name']); ?></h3>
                <?php endif; ?>
                <?php if ($price['amount']): ?>
                    <div class="pricing-amount text-2xl font-bold mb-2"><?php echo esc_html($price['amount']); ?></div>
                <?php endif; ?>
                <?php if ($price['details']): ?>
                    <p class="pricing-details text-gray-600"><?php echo esc_html($price['details']); ?></p>
                <?php endif; ?>
                <a href="<?php echo esc_url($cta_url ?: '#contact'); ?>" class="mt-4 inline-block bg-tt-dark-navy text-white px-6 py-3 rounded hover:bg-tt-dark transition">
                    Get Started
                </a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Image Sections -->
<?php if (array_filter($image_sections, fn($sec) => !empty($sec['image']))): ?>
<section class="image-sections-wrapper py-8 lg:py-12">
    <div class="max-w-6xl mx-auto px-4 sm:px-8 lg:px-16 grid md:grid-cols-2 gap-8">
        <?php foreach ($image_sections as $img_sec): ?>
            <?php if ($img_sec['image']): ?>
            <div class="image-section-item text-center">
                <img src="<?php echo is_array($img_sec['image']) ? esc_url($img_sec['image']['url']) : esc_url($img_sec['image']); ?>" 
                     alt="<?php echo is_array($img_sec['image']) ? esc_attr($img_sec['image']['alt']) : ''; ?>" 
                     class="section-image mx-auto rounded-lg shadow">
                <?php if ($img_sec['caption']): ?>
                    <p class="image-caption mt-2 text-gray-600"><?php echo esc_html($img_sec['caption']); ?></p>
                <?php endif; ?>
            </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</section>
<?php endif; ?>

<!-- Gallery Section -->
<?php if ($gallery_images): ?>
<section class="gallery-section py-12 lg:py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-16">
        <h2 class="gallery-title text-3xl font-bold mb-8 text-center">Gallery</h2>
        <div class="grid sm:grid-cols-2 md:grid-cols-4 gap-4">
            <?php foreach ($gallery_images as $img): ?>
            <div class="gallery-item overflow-hidden rounded-lg shadow">
                <img src="<?php echo is_array($img) ? esc_url($img['url']) : esc_url($img); ?>" 
                     alt="<?php echo is_array($img) ? esc_attr($img['alt']) : ''; ?>" 
                     class="gallery-image w-full h-48 object-cover">
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- CTA Section -->
<?php if ($cta_heading || $cta_text || $cta_button_text): ?>
<section class="cta-section py-16 lg:py-20 text-center bg-tt-dark-navy text-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-8 lg:px-16">
        <?php if ($cta_heading): ?>
            <h2 class="text-3xl font-bold mb-4"><?php echo esc_html($cta_heading); ?></h2>
        <?php endif; ?>
        <?php if ($cta_text): ?>
            <p class="mb-6 text-lg"><?php echo esc_html($cta_text); ?></p>
        <?php endif; ?>
        <?php if ($cta_button_text && $cta_url): ?>
            <a href="<?php echo esc_url($cta_url); ?>" class="inline-block bg-white text-tt-dark-navy px-6 py-3 rounded hover:bg-gray-100 transition">
                <?php echo esc_html($cta_button_text); ?>
            </a>
        <?php endif; ?>
    </div>
</section>
<?php endif; ?>

<?php
    endwhile;
endif;
?>

</main>

<?php get_footer(); ?>
