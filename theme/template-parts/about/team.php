<?php
$team_heading = get_field('team_heading');
?>

<?php if ($team_heading): ?>
<section class="team py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-12"><?php echo esc_html($team_heading); ?></h2>
        <div class="grid md:grid-cols-3 gap-8">

            <?php for ($i = 1; $i <= 3; $i++):
                $name  = get_field("team_{$i}_name");
                $role  = get_field("team_{$i}_role");
                $bio   = get_field("team_{$i}_bio");
                $photo = get_field("team_{$i}_photo");

                $photo_url = '';
                if ($photo && is_array($photo)) {
                    $photo_url = $photo['url'] ?? '';
                }
            ?>
                <?php if ($name || $role || $bio): ?>
                <div class="text-center p-6 border rounded-lg bg-gray-50 hover:shadow-lg transition">
                    <?php if ($photo_url): ?>
                        <img src="<?php echo esc_url($photo_url); ?>" class="mx-auto mb-4 w-32 h-32 object-cover rounded-full" alt="<?php echo esc_attr($name); ?>">
                    <?php endif; ?>
                    <?php if ($name): ?><h3 class="text-xl font-semibold mb-1"><?php echo esc_html($name); ?></h3><?php endif; ?>
                    <?php if ($role): ?><p class="text-gray-500 mb-2"><?php echo esc_html($role); ?></p><?php endif; ?>
                    <?php if ($bio): ?><p class="text-gray-600"><?php echo esc_html($bio); ?></p><?php endif; ?>
                </div>
                <?php endif; ?>
            <?php endfor; ?>

        </div>
    </div>
</section>
<?php endif; ?>
