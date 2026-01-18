<?php
$stats_heading = get_field('stats_heading');
?>

<?php if ($stats_heading): ?>
<section class="company-stats py-16 bg-gray-100">
    <div class="max-w-7xl mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-12"><?php echo esc_html($stats_heading); ?></h2>
        <div class="grid md:grid-cols-4 gap-8 text-center">
            <?php for ($i = 1; $i <= 4; $i++):
                $number = get_field("stat_{$i}_number");
                $label  = get_field("stat_{$i}_label");
            ?>
                <?php if ($number || $label): ?>
                <div class="p-6 border rounded-lg bg-white hover:shadow-lg transition">
                    <?php if ($number): ?><h3 class="text-3xl font-bold mb-2"><?php echo esc_html($number); ?></h3><?php endif; ?>
                    <?php if ($label): ?><p class="text-gray-600"><?php echo esc_html($label); ?></p><?php endif; ?>
                </div>
                <?php endif; ?>
            <?php endfor; ?>
        </div>
    </div>
</section>
<?php endif; ?>
