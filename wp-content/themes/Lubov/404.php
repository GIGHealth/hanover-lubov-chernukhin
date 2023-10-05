<?php get_header(); 
$id = get_the_ID();
$type = get_post_type();
$template = get_page_template_slug();
$useID = $id;
?>
  <div id="primary" class="content-area main-page d-flex justify-content-center align-items-center" role="main">
    <div class="error-page-inner d-flex flex-column align-items-start m-auto align-items-center content-bounds">
      <h1 class="text-center">Sorry no content is found at this location</h1>
      <h2 class="text-center">404 <br/><span>PAGE NOT FOUND</span></h2>
		<a class="link button return-home-button mt-3" href="<?php echo get_home_url(); ?>">
      <span class="return-home">Return home</span><?php arrowRight()?>
    </a>
    </div>
  </div><!-- #primary -->
<?php get_footer(); ?>
