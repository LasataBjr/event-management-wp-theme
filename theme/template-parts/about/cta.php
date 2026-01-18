<?php
$cta_heading     = get_field('cta_heading');
$cta_text        = get_field('cta_text');
$cta_button_text = get_field('cta_button_text');
$cta_button_link = get_field('cta_button_link');

// Fix for ACF Link field returning array
if (is_array($cta_button_link)) {
    $cta_button_link = $cta_button_link['url'] ?? '';
}
?>

<?php if ($cta_heading || $cta_text || $cta_button_text): ?>
<section class="cta py-16 text-center bg-tt-dark-navy text-white">
    <div class="max-w-3xl mx-auto px-4">
        <?php if ($cta_heading): ?><h2 class="text-3xl font-bold mb-4"><?php echo esc_html($cta_heading); ?></h2><?php endif; ?>
        <?php if ($cta_text): ?><p class="mb-6"><?php echo esc_html($cta_text); ?></p><?php endif; ?>
        <?php if ($cta_button_text && $cta_button_link): ?>
            <a href="<?php echo esc_url($cta_button_link); ?>" class="inline-block bg-white text-tt-dark-navy px-6 py-3 rounded hover:bg-gray-100 transition">
                <?php echo esc_html($cta_button_text); ?>
            </a>
        <?php endif; ?>
    </div>
</section>
<?php endif; ?>
