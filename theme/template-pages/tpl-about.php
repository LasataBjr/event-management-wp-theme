<?php
/*
Template Name: About Us
*/
get_header();
?>

<main class="about-page max-w-7xl mx-auto px-4 sm:px-8 lg:px-16 py-16">

    <?php
        get_template_part('template-parts/about/hero');
        get_template_part('template-parts/about/why-us');
        get_template_part('template-parts/about/team');
        get_template_part('template-parts/about/stats');
        get_template_part('template-parts/about/cta');
    ?>

</main>

<?php get_footer(); ?>
