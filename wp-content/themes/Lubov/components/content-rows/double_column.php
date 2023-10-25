<?php
$customID = get_sub_field('custom_id');
$customClasses = get_sub_field('custom_classes');
$img = get_sub_field('image_item');
$imgRepeater = get_sub_field('image');
$image_placement = get_sub_field('image_placement');
$parallax= get_sub_field('parallax');
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
    class="pt-3 pb-3 double-column-inner d-flex  <?php if($image_placement):?>flex-lg-row-reverse <?php else: ?>flex-lg-row <?php endif; ?> flex-column content-bounds">
    <div class="d-flex double-column-inner-copy flex-column justify-content-center align-items-center w-100"
      <?php if(!$image_placement):?><?php endif; ?> <?php if(!$image_placement):?> <?php endif; ?>  data-aos="fade-up">
      <div class="content<?php if($title): ?> pt-3<?php endif;?>">
        <?php if($title): ?>
        <h3 class="mb-4"><?php echo $title; ?></h3>
        <?php endif; ?>
        <?php if($copy):?>
          <?php echo $copy; ?>
        <?php endif; ?>
        <?php if ($slideCopy): ?>
        <div class="slide-down-content mb-3">
          <a class="slide-link-container" aria-label="Read more" href="javascript:void(0)">
            <span class="slide-link"><?php echo $slideLink; ?></span>
            <?php arrowRight()?>
            <div class="slide-copy mt-3"> <?php echo $slideCopy; ?>
          </a> 
          <a class="slide-link-close-container" aria-label="Close read more section" href="javascript:void(0)">
            <span class="slide-link-close">Close</span>
            <?php arrowRight()?>
          </a>
          </div>
        </div>
        <?php if($copy2): ?>
        <?php echo $copy2; ?>
        <?php endif; ?>
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
    <div class="carousel-wrap position-relative"  data-aos="fade-up" data-aos-delay="100">
      <div
        class="image-container image-carousel-inner double-column w-100 <?php if($count > 1): ?>owl-carousel owl-theme<?php endif; ?> <?php if($count === 1): ?><?php if($parallax):?>parallax<?php else: ?>parallax-reverse<?php endif; ?><?php endif; ?>"
        <?php if($count):?>data-count="<?php echo $count; ?><?php endif;?>">
        <?php while( have_rows('image') ): the_row(); 
          $img = get_sub_field('image_item');

          ?>
          <div class="image-wrapper position-relative">
            <img class="image image-position-carousel image-position-<?php echo esc_html ( get_sub_field('image_position') ); ?>" src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>"
            width="<?php echo $img['width']; ?>" height="<?php echo $img['height']; ?>" />
            </div>

          <?php endwhile; ?>
      
      </div>
    </div>
    <?php endif; ?>
  </div>
</div>