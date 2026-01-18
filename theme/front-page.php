<?php
/**
 * Front Page Template
 *
 * Template for the homepage
 *
 * @package Event-Management-theme
 */

get_header(); // Loads header.php

    get_template_part('template-parts/home/banner');
    get_template_part('template-parts/home/intro');
    get_template_part('template-parts/about/why-us');
    get_template_part('template-parts/home/featured-services');


 get_footer(); 

 ?>