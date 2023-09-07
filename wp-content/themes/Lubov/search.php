<?php

//TODO: Use main page template as base, take hero from a page you like.
//TODO: Style search results similar to Compass and the News items on this sites' news page. Remove images as there's no real need. 
//TODO: If its a page just put Page above.
//TODO: If its a post put 'News Post' and then the categories.
?>




<?php get_header(); ?>
<div id="primary">

  <div class="search-content d-flex flex-column align-items-start m-auto">
    <h1>
      <?php echo sprintf( __( '%s Search Result(s) for \'', 'html5blank' ), $wp_query->found_posts ); echo get_search_query() . '\''; ?>
    </h1>
    <div class="search-results">
      <div class="search-inner">
        <?php get_template_part( 'loop' ); ?>
        <?php if($wp_query->max_num_pages > 1): ?>
        <?php get_template_part( 'pagination' ); ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>
<?php get_template_part('components/next-page-link'); ?>

<?php get_footer(); ?>