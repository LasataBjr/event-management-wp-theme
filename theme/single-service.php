<?php get_header(); ?>

<main class="single-service max-w-7xl mx-auto px-4 sm:px-8 lg:px-16 py-16">

<?php
if (have_posts()):
    while (have_posts()): the_post();

    // Hero Section
    $hero_heading    = get_field('hero_heading');
    $hero_subheading = get_field('hero_subheading');
    $hero_image      = get_field('hero_image');

    // Short Description
    $short_desc = get_field('short_description');

    // Text Sections (fixed 3 sections)
    $text_sections = [];
    for ($i = 1; $i <= 3; $i++) {
        $text_sections[] = [
            'heading' => get_field("text_section_{$i}_heading"),
            'content' => get_field("text_section_{$i}_content")
        ];
    }

    // Pricing Blocks (fixed 3)
    $pricing_blocks = [];
    for ($i = 1; $i <= 3; $i++) {
        $name    = get_field("price_{$i}_name");
        $amount  = get_field("price_{$i}_amount");
        $details = get_field("price_{$i}_details");
        if ($name || $amount || $details) {
            $pricing_blocks[] = compact('name', 'amount', 'details');
        }
    }

    // Image Sections (fixed 2)
    $image_sections = [];
    for ($i = 1; $i <= 2; $i++) {
        $image_sections[] = [
            'image'   => get_field("image_section_{$i}_image"),
            'caption' => get_field("image_section_{$i}_caption")
        ];
    }

    // Gallery Section (fixed 4 images)
    $gallery_images = [];
    for ($i = 1; $i <= 4; $i++) {
        $img = get_field("gallery_image_{$i}");
        if ($img) $gallery_images[] = $img;
    }

    // CTA Section
    $cta_heading     = get_field('cta_heading');
    $cta_button_text = get_field('cta_button_text');
    $cta_button_link = get_field('cta_button_link');
?>

<!-- Hero Section -->
<section class="mb-12 text-center">
    <?php if ($hero_image): ?>
        <img src="<?php echo is_array($hero_image) ? esc_url($hero_image['url']) : esc_url($hero_image); ?>" 
             alt="<?php echo is_array($hero_image) ? esc_attr($hero_image['alt']) : get_the_title(); ?>" 
             class="w-full h-96 object-cover rounded-lg mb-6">
    <?php endif; ?>
    <?php if ($hero_heading): ?>
        <h1 class="text-4xl font-bold mb-2"><?php echo esc_html($hero_heading); ?></h1>
    <?php endif; ?>
    <?php if ($hero_subheading): ?>
        <p class="text-gray-700"><?php echo esc_html($hero_subheading); ?></p>
    <?php endif; ?>
</section>

<!-- Short Description -->
<?php if ($short_desc): ?>
<section class="mb-12">
    <p class="text-gray-700 text-lg"><?php echo esc_html($short_desc); ?></p>
</section>
<?php endif; ?>

<!-- Text Sections -->
<?php foreach ($text_sections as $section): ?>
    <?php if ($section['heading'] || $section['content']): ?>
    <section class="mb-8">
        <?php if ($section['heading']): ?>
            <h2 class="text-2xl font-semibold mb-2"><?php echo esc_html($section['heading']); ?></h2>
        <?php endif; ?>
        <?php if ($section['content']): ?>
            <p class="text-gray-700"><?php echo esc_html($section['content']); ?></p>
        <?php endif; ?>
    </section>
    <?php endif; ?>
<?php endforeach; ?>

<!-- Pricing Section -->
<?php if ($pricing_blocks): ?>
<section class="mb-12">
    <h2 class="text-3xl font-bold mb-6 text-center">Pricing</h2>
    <div class="grid sm:grid-cols-1 md:grid-cols-3 gap-6">
        <?php foreach ($pricing_blocks as $price): ?>
        <div class="border p-6 rounded-lg shadow hover:shadow-lg transition text-center">
            <?php if ($price['name']): ?>
                <h3 class="text-xl font-semibold mb-2"><?php echo esc_html($price['name']); ?></h3>
            <?php endif; ?>
            <?php if ($price['amount']): ?>
                <p class="text-2xl font-bold mb-2"><?php echo esc_html($price['amount']); ?></p>
            <?php endif; ?>
            <?php if ($price['details']): ?>
                <p class="text-gray-700"><?php echo esc_html($price['details']); ?></p>
            <?php endif; ?>
        </div>
        <?php endforeach; ?>
    </div>
</section>
<?php endif; ?>

<!-- Image Sections -->
<?php foreach ($image_sections as $img_sec): ?>
    <?php if ($img_sec['image']): ?>
    <section class="mb-8">
        <img src="<?php echo is_array($img_sec['image']) ? esc_url($img_sec['image']['url']) : esc_url($img_sec['image']); ?>" 
             alt="<?php echo is_array($img_sec['image']) ? esc_attr($img_sec['image']['alt']) : ''; ?>" 
             class="w-full h-64 object-cover rounded-lg mb-2">
        <?php if ($img_sec['caption']): ?>
            <p class="text-gray-600 text-sm"><?php echo esc_html($img_sec['caption']); ?></p>
        <?php endif; ?>
    </section>
    <?php endif; ?>
<?php endforeach; ?>

<!-- Gallery Section -->
<?php if ($gallery_images): ?>
<section class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-12">
    <?php foreach ($gallery_images as $img): ?>
        <img src="<?php echo is_array($img) ? esc_url($img['url']) : esc_url($img); ?>" 
             alt="<?php echo is_array($img) ? esc_attr($img['alt']) : ''; ?>" 
             class="w-full h-48 object-cover rounded-lg">
    <?php endforeach; ?>
</section>
<?php endif; ?>

<!-- CTA Section -->
<?php if ($cta_heading || $cta_button_text): ?>
<section class="text-center mt-12">
    <?php if ($cta_heading): ?>
        <h2 class="text-3xl font-bold mb-4"><?php echo esc_html($cta_heading); ?></h2>
    <?php endif; ?>
    <?php if ($cta_button_text && $cta_button_link): ?>
        <a href="<?php echo esc_url($cta_button_link); ?>" class="inline-block bg-tt-dark-navy text-white px-6 py-3 rounded hover:bg-tt-dark hover:shadow-lg transition">
            <?php echo esc_html($cta_button_text); ?>
        </a>
    <?php endif; ?>
</section>
<?php endif; ?>

<?php
    endwhile;
endif;
?>

</main>

<?php get_footer(); ?>
