<?php
/**
 * Template Name: Main Page
 *
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); 
?>

<div id="primary" class="content-area main-page">
    <!-- HERO -->
    <?php get_template_part('components/hero');
    
    ?>
    
    <?php get_template_part('components/content-rows'); ?>
    <?php get_template_part('components/content-rows/next_page_link'); ?>

</div><!-- #primary -->

<?php
get_footer();