<?php
/**
 * Template Name: Blog Page
 *
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

//  TODO: Full page, just use the_content() instead of ACF, pull in next page block from news page - give me a shout to discuss.

get_header(); 

?>
<?php get_template_part('components/hero');?>

<?php
// WP_Query arguments
$args = array(
	'post_type'       => array( 'post' ),
	'post_status'     => array( 'publish' ),
	'order'           => 'DESC',
  'posts_per_page'  => 9,
  'facetwp'         => true,
);

$blogCategories = get_field('blog_categories', 'option');

// The Query
$query = new WP_Query( $args );

if($query->have_posts()):?>

<section class="blog-view content-row">
  <div
    class="blog-filters content-bounds d-flex flex-column flex-lg-row align-items-center align-items-lg-start justify-content-center justify-content-lg-start pt-5 pb-5">
    <div class="category-container d-flex flex-column flex-lg-row align-items-center" data-aos="fade-up">
      <span><?php echo $blogCategories;?></span>
      <?php echo do_shortcode('[facetwp facet="categories"]');?>
    </div>
  </div>

  <div class="blog-view-grid content-bounds">
    <div class="facetwp-container">
      <?php while ( $query->have_posts() ) : $query->the_post();
    set_query_var( 'concat', false );
    get_template_part('components/latest_blog_post') ;?>
      <?php endwhile; ?>
    </div>
  </div>
  <div class="blog-pagination content-bounds">
    <?php echo do_shortcode('[facetwp facet="load_more"]');?>
  </div>
</section>
<?php endif; 
wp_reset_postdata();
?>
<?php get_template_part('components/content-rows/next_page_link'); ?>
<?php get_footer(); ?>