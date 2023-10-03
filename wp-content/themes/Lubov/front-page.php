<?php
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */


get_header(); ?>

<div id="primary" class="content-area front-page" role="main">
  <?php get_template_part('components/home/home-hero'); ?>
  <?php get_template_part('components/home/biography'); ?>
  <?php get_template_part('components/home/double_column_home'); ?>
  <?php get_template_part('components/home/blog_home'); ?>
</div>




<?php
get_footer();