<?php
$customID = get_sub_field('custom_id');
$customClasses = get_sub_field('custom_classes');
$img = get_sub_field('image_item');
$imgRepeater = get_sub_field('image');
$image_placement = get_sub_field('image_placement');
$copy = get_sub_field('copy');
$copy2 = get_sub_field('copy_2');
$title = get_sub_field('title');
$slideCopy = get_sub_field('slide_down_copy_content');
$slideLink = get_sub_field('slide_down_link');

$link = get_sub_field('link');
if($link){
  $link_url = $link['url'];
  $link_target = $link['target'] ? $link['target'] : '_self';
  $link_text = $link['title'];
}
?>
<div class="content-row double-column">
  <div
    class="pt-3 pb-3 double-column-inner d-flex  <?php if($image_placement):?>flex-lg-row-reverse <?php else: ?>flex-lg-row <?php endif; ?> flex-column content-bounds"
    data-aos="fade-up">
    <div class="d-flex double-column-inner-copy flex-column justify-content-center align-items-center w-100"
      <?php if(!$image_placement):?><?php endif; ?> <?php if(!$image_placement):?> <?php endif; ?>>
      <div class="content<?php if($title): ?> pt-3<?php endif;?>">
        <?php if($title): ?>
        <!-- //TODO: Make these H3 -->
        <h2 class="mb-4"><?php echo $title; ?></h2>
        <?php endif; ?>
        <!-- //TODO: global comment, wrap WYSIWYG fields in something, spans or divs with a class so you can access if -->
        <!-- //TODO: needed. -->
        <?php echo $copy; ?>
        <?php if ($slideCopy): ?>
        <!-- //TODO: Nudge the 2 arrows up slightly -->
        <div class="slide-down-content mb-3">
          <span class="slide-link"><?php echo $slideLink; ?><?php arrowRight()?></span>
          <div class="slide-copy mt-3"> <?php echo $slideCopy; ?> <span
              class="slide-link-close">Close<?php arrowRight()?></span>
          </div>
        </div>
        <?php echo $copy2; ?>
        <?php endif;?>
        <?php if($link):?>
        <div class="link-container">
          <?php echo buttonLink($link_url, $link_target, $link_text); ?>
        </div>
        <?php endif; ?>
      </div>
    </div>
    <?php
    
    if( have_rows('image') ):
        if(is_array($imgRepeater)) {
        $count = count($imgRepeater);
        }
        else {
        $count = 1;
        }
    ?>
    <div class="carousel-wrap">
      <div
        class="image-container image-carousel-inner double-column w-100 <?php if($count > 1): ?>owl-carousel owl-theme<?php endif; ?>"
        <?php if($count):?>data-count="<?php echo $count; ?><?php endif;?>">
        <?php while( have_rows('image') ): the_row(); 
                $img = get_sub_field('image_item');
                ?>
        <img class="image" src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>"
          width="<?php echo $img['width']; ?>" height="<?php echo $img['height']; ?>" />
        <?php endwhile; ?>
      </div>
    </div>
    <?php endif; ?>
  </div>
</div>