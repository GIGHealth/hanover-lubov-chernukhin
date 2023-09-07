<?php
/**
 * Template Name: Legal Page
 *
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

 //TODO: Full page, just use the_content() instead of ACF, pull in next page block from news page - give me a shout to discuss.

get_header(); 
?>

<div class="legal-page">

  <div class="hero-legal">
    <div class="hero-legal-inner d-flex flex-column justify-content-end w-100 h-100 position-relative">
      <div class="breadcrumb-container">
        <?php echo do_shortcode('[wpseo_breadcrumb]');?>
      </div>
      <h1><?php echo get_the_title(); ?></h1>
    </div>
   
  </div>

  <div id="primary" class="content-area main-page">
    <div class="legal-page-inner d-flex flex-column align-items-start m-auto">
    <?php the_content(); ?>
    </div>
  </div><!-- #primary -->

</div>
<?php get_template_part('/components/next-page-link');?>

<?php
get_footer();