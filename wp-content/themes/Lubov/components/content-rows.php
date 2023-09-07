<div id="content-rows" class="content-rows">

  <?php
      // are there any rows within within our flexible content?
      if( have_rows('content_rows') ): 
        // loop through all the rows of flexible content
        while ( have_rows('content_rows') ) : the_row();

        // if( get_row_layout() == 'body_copy' )
        //   get_template_part('components/content-rows/body_copy');

        // if( get_row_layout() == 'image' )
        //   get_template_part('components/content-rows/image');

        
          // wp_enqueue_script('gsap');
          // wp_enqueue_script('scrollTrigger');
          // wp_enqueue_script('ScrollTo');


          // wp_enqueue_script('waypoints'); // Enqueue it!

        endwhile; // close the loop of flexible content
      endif; // close flexible content conditional

      ?>

</div>