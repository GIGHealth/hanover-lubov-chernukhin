<?php
$customID = get_sub_field('custom_id');
$customClasses = get_sub_field('custom_classes');
$img = get_sub_field('image_item');
$image_placement = get_sub_field('image_placement');
$copy = get_sub_field('copy');
$title = get_sub_field('title');

$link = get_sub_field('link');
if($link){
  $link_url = $link['url'];
  $link_target = $link['target'] ? $link['target'] : '_self';
  $link_text = $link['title'];
}

?>
<div class="content-row double-column">
  <div
    class="pt-3 pb-3 double-column-inner  <?php if($image_placement):?>flex-md-row-reverse flex-column<?php else: ?>flex-md-row flex-column<?php endif; ?> content-bounds">
    <div class="column-text flex-column justify-content-center align-items-center w-100" data-aos="fade-up"
      <?php if(!$image_placement):?><?php endif; ?> <?php if(!$image_placement):?>data-aos-delay="250" <?php endif; ?>>
      <div class="content pt-3">
        <h2 class="mb-4"><?php echo $title; ?></h2>
        <?php echo $copy; ?>
        <?php if($link):?>
        <div class="link-container">
          <?php echo buttonLink($link_url, $link_target, $link_text); ?>
        </div><?php endif; ?>
      </div>
    </div>
    <?php
    
    if( have_rows('image') ):
        if(is_array($img)) {
        $count = count($img);
        }
        else {
        $count = 1;
        }
    ?>
    <div class=" align-items-start justify-content-center">
        <div class="column-image double-coulumn-image image-carousel w-100" data-aos="fade-up">
                <div class="image-carousel-outer">
                    <div class="image-container image-carousel-inner double-column- w-100 owl-carousel"
                    <?php if($count):?>data-count="<?php echo $count; ?><?php endif;?>">
                    <?php while( have_rows('image') ): the_row(); 
                        $img = get_sub_field('image_item');
                        ?>
                    <img class="image-one" src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>"
                        width="<?php echo $img['width']; ?>" height="<?php echo $img['height']; ?>" />
                    <?php endwhile; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
  </div>
</div>
       