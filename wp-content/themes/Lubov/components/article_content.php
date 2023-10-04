<?php
        if( have_rows('blog_content_blocks') ):
    ?>

<div id="content-rows" class="content-rows content-row-blog d-flex flex-column flex-md-row">
  <?php while( have_rows('blog_content_blocks') ): the_row(); 
      ?>
  <div class="content-block blog-bounds blog-content" data-aos="fade-up">
    <?php if( have_rows('blog_content_rows') ): 
            // loop through all the rows of flexible content
            while ( have_rows('blog_content_rows') ) : the_row();
            $copy = get_sub_field('copy');
            if($copy): ?>
    <p><?php echo $copy;?></p>
    <?php endif; ?>
    <?php 
            $image = get_sub_field('image');
            if( !empty( $image ) ): ?>
    <div class="image-container pt-3 pb-3">
      <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?> "
        width="<?php echo $image['width']; ?>" height="<?php echo $image['height']; ?>" />
    </div>
    <?php endif; ?>
    <?php
        endwhile; // close the loop of flexible content
        endif; // close flexible content conditional ?>
  </div>
  <?php get_template_part('components/share_post');?>

  <?php endwhile; ?>

</div>
<button class="back-to-blog mt-3" onclick="history.back()"><span class="back-button">Back to Blog</span>
    <?php echo arrowRight()?></button>

<?php endif; ?>