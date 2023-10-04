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

<article class="latest-blog-post-home">
  <a href="<?php echo $link; ?>" class="latest-blog-post-inner">
    <div class="blog-article d-flex flex-column flex-lg-row align-items-start">
        <div class="post-title" >
            <p class="title"><?php echo $title;?></p>
        </div>
      <div class="post-info">
        <p class="date"><?php echo get_the_date('j F');?></p>
      </div>
    </div>
  </a>
</article>