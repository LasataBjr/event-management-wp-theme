<?php
$hero_heading   = get_field('hero_heading');
$hero_subheading= get_field('hero_subheading');
$hero_image     = get_field('hero_image');

// If image is an array, get URL and alt
$hero_url = '';
$hero_alt = '';
if ($hero_image) {
    if (is_array($hero_image)) {
        $hero_url = $hero_image['url'] ?? '';
        $hero_alt = $hero_image['alt'] ?? get_the_title();
    } else {
        $hero_url = esc_url($hero_image);
        $hero_alt = get_the_title();
    }
}
?>

<section class="hero py-16 bg-gray-100 text-center">
    <div class="max-w-5xl mx-auto px-4">
        <?php if ($hero_url): ?>
            <img src="<?php echo esc_url($hero_url); ?>" alt="<?php echo esc_attr($hero_alt); ?>" class="mx-auto mb-6 w-full h-96 object-cover rounded-lg">
        <?php endif; ?>
        <?php if ($hero_heading): ?>
            <h1 class="text-5xl font-bold mb-4"><?php echo esc_html($hero_heading); ?></h1>
        <?php endif; ?>
        <?php if ($hero_subheading): ?>
            <p class="text-gray-700 text-lg"><?php echo esc_html($hero_subheading); ?></p>
        <?php endif; ?>
    </div>
</section>
