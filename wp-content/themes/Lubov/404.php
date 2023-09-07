<?php get_header(); 

$id = get_the_ID();
$type = get_post_type();
$template = get_page_template_slug();
$useID = $id;

?>

<div class="hero-error">
    <div class="hero-error-inner d-flex flex-column justify-content-end w-100 h-100 position-relative">
      <div class="breadcrumb-container">
        <?php echo do_shortcode('[wpseo_breadcrumb]');?>
      </div>
      <h1>Sorry no content is found at this location</h1>
    </div>
  </div>

  <div id="primary" class="content-area main-page">
    <div class="error-page-inner d-flex flex-column align-items-start m-auto align-items-center">
		<h2>404</h2>
		<p>PAGE NOT FOUND</p>
		<a class="link button" href="<?php echo get_home_url(); ?>"><?php echo arrowIcon();?>Return home</a>
    </div>
  </div><!-- #primary -->

  <?php get_template_part('/components/next-page-link');?>

<?php get_footer(); ?>
