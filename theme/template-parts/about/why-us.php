<?php
$why_heading = get_field('why_heading');
?>

<?php if ($why_heading): ?>
<section class="why-us py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-12"><?php echo esc_html($why_heading); ?></h2>
        <div class="grid md:grid-cols-3 gap-8">

            <?php for ($i = 1; $i <= 3; $i++):
                $title = get_field("why_{$i}_title");
                $desc  = get_field("why_{$i}_desc");
                $icon  = get_field("why_{$i}_icon");

                // Handle icon array
                $icon_url = '';
                if ($icon && is_array($icon)) {
                    $icon_url = $icon['url'] ?? '';
                }
            ?>
                <?php if ($title || $desc): ?>
                <div class="text-center p-6 border rounded-lg bg-white hover:shadow-lg transition">
                    <?php if ($icon_url): ?>
                        <img src="<?php echo esc_url($icon_url); ?>" class="mx-auto mb-4 h-14" alt="">
                    <?php endif; ?>
                    <?php if ($title): ?>
                        <h3 class="text-xl font-semibold mb-2"><?php echo esc_html($title); ?></h3>
                    <?php endif; ?>
                    <?php if ($desc): ?>
                        <p class="text-gray-600"><?php echo esc_html($desc); ?></p>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
            <?php endfor; ?>

        </div>
    </div>
</section>
<?php endif; ?>
