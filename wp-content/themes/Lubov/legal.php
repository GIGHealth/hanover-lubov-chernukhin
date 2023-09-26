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

<section class="hero hero-legal bg-green ">
  <div class="hero-inner d-flex align-items-end content-bounds">
    <div class="hero-content ">
        <div class="hero-title">
          <h1><?php echo get_the_title(); ?></h1>
        </div>
    </div>
  </div>
</section>

  <div id="primary" class="content-area main-page content-bounds ">
    <div class="legal-page-inner d-flex flex-column align-items-start  pt-5 pb-5 legal-bounds">
    <?php the_content(); ?>
    </div>
  </div><!-- #primary -->

</div>
<?php get_template_part('/components/next-page-link');?>

<?php
get_footer();