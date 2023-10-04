<?php
$copy = get_sub_field('copy');
?>

<div class="content-row links-rows">
    <div class="content-bounds d-flex justify-content-center flex-column links-rows-inner" data-aos="fade-up">
      <div class="links-copy" data-aos="fade-up" data-aos-delay="100">
        <?php if ($copy): ?>
          <?php echo $copy; ?>
        <?php endif; ?>
      </div>
    <?php
    if( have_rows('links_rows') ):
    // Loop through rows.
    while( have_rows('links_rows') ) : the_row();
    ?>
    <div
    class="links-row d-flex" >
    <div class="links d-flex flex-column justify-content-center w-100" data-aos="fade" data-aos-delay="200">
        <?php
        if( have_rows('links') ):
            // Loop through rows.
            while( have_rows('links') ) : the_row();
            $link = get_sub_field('link');
            if($link){
            $link_url = $link['url'];
            $link_target = $link['target'] ? $link['target'] : '_self';
            $link_text = $link['title'];
            }
        ?>
    <?php if($link):?>
      <div class="link-container">
        <?php echo buttonLink($link_url, $link_target, $link_text); ?>
      </div>
    <?php endif; 
       endwhile;
    endif;
    ?>
    </div>
  </div>
  <?php

    endwhile;
endif;
?>
</div>
</div> 

