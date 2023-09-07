<?php
function prettyPostType($postType){
  switch ($postType) {
    case 'page':
        return "Page";
        break;
    case 'post':
        return "News";
        break;
    case 'investors-content':
        return "Investors Events & Presentations";
        break;
    }
  }
?>

<?php if (have_posts()): while (have_posts()) : the_post();
 $postType = get_post_type(); 

?>

<!-- article -->
<article class="pb-5 pt-5" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <!-- post title -->
  <span><?php echo prettyPostType($postType); ?></span>
  <h2 class="mb-3 mt-2">
    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
  </h2>
  <!-- /post title -->

  <?php echo the_excerpt(); ?>

</article>
<!-- /article -->

<?php endwhile; ?>

<?php else : ?>

<!-- article -->
<article>
  <h2><?php esc_html_e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>
</article>
<!-- /article -->

<?php endif; ?>