<?php
  if( have_rows('content_blocks') ):
?>

<div id="content-rows" class="content-rows">
  <?php while( have_rows('content_blocks') ): the_row(); 
    $block_id = get_sub_field('block_id');
    $bg = get_sub_field('background_color');
  ?>
  <div class="content-block<?php if($bg):?> bg-<?php echo $bg; endif; ?> pt-3 pb-3 pt-lg-5 pb-lg-5"
    <?php if($block_id):?>id="<?php echo $block_id; ?>" <?php endif; ?>>
    <?php if( have_rows('content_rows') ): 
        // loop through all the rows of flexible content
        while ( have_rows('content_rows') ) : the_row();

        if( get_row_layout() == 'double_column' )
          get_template_part('components/content-rows/double_column');
          wp_enqueue_script('owl');
          wp_enqueue_style('owl-style');
          wp_enqueue_style('owl-theme');

        if( get_row_layout() == 'timeline' )
        get_template_part('components/content-rows/timeline');

        if( get_row_layout() == 'case_study' )
        get_template_part('components/content-rows/case_study');

        if( get_row_layout() == 'links' )
        get_template_part('components/content-rows/links');

        endwhile; // close the loop of flexible content
        endif; // close flexible content conditional ?>
  </div>
  <?php endwhile; ?>
</div>
<?php endif; ?>
