<?php

$link = get_the_permalink();
$cats = get_the_category();
$title = get_the_title();
$image = get_the_post_thumbnail();
$date = get_the_date(' d F Y');

// $truncate_title = truncate($title, 65);

$categories = null;
if($cats){
  $a = array_map(function($obj) {
    return $obj->cat_name;
  }, $cats);
  $a = implode(", ", $a);
  $categories = $a;
}

$concat = get_query_var( 'concat' );

?>

<article class="latest-blog-post" data-aos="fade-up">
  <a href="<?php echo $link; ?>" class="latest-blog-post-inner" aria-label="Blog post">
    <div class="blog-top">
      <div class="image-container">
      <?php the_post_thumbnail('single-post-thumbnail'); ?>
    </div>
    <div class="blog-bottom">
        <div class="blog-title mt-3">
            <h3 class="title"><?php echo $title;?></h3>
        </div>
        <?php if(has_excerpt()):?><div class="excerpt"><p><?php echo get_the_excerpt(); ?></p></div><?php endif; ?>
      <div class="post-info">
        <p class="date"><?php echo get_the_date('j F');?></p>
      </div>
    </div>
  </a>
</article>