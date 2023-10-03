<?php
$title = get_field('title');
$image = get_the_post_thumbnail_url();
$subtitle = get_field('subtitle');
$subtitle2 = get_field('subtitle_2');
$toggleGraph = get_field('toggle_graph');
?>
<section class="hero">
  <div class="hero-inner">
    <div class="hero-content">
      <div class="hero-content-top">
        <div class="hero-content-top-inner content-bounds">
          <div class="hero-title" data-aos="fade-up" data-aos-delay="300">
            <h1><?php echo $title; ?></h1>
          </div>
          <?php if ($image): ?>
          <div class="hero-image" data-aos="fade-up" data-aos-delay="100">
            <!-- //TODO: aos delay image -->
            <img src="<?php echo $image;?>" alt="<?php echo $title;?>" />
            <?php endif; ?>
          </div>
        </div>
      </div>
      <div class="hero-content-bottom">
        <div class="hero-content-bottom-inner content-bounds">
          <div class="hero-content-bottom-two-col d-flex flex-column flex-lg-row <?php if($toggleGraph):?>content-bounds<?php else: ?>small-bounds<?php endif;?>" data-aos="fade-up" data-aos-delay="500">
            <!-- //TODO: Play with aos-delay'ing this more too -->
            <div class="hero-subtitle"><?php echo $subtitle; ?></div>
            <?php if ($toggleGraph):
              //TODO: check if enqueue_script will work here for count up
            
            ?>


            <div class="hero-graph">
              <div class="hero-graph-inner">
                <?php
                    if( have_rows('graph') ):
                        // Loop through rows.
                        while( have_rows('graph') ) : the_row();
                            $prenumcopy= get_sub_field('pre_number_copy');
                            $number= get_sub_field('number');
                            $copy= get_sub_field('copy');
                        ?>
                <div class="graph-col" >
                  <?php if($prenumcopy):?>
                  <div class="prenumgraph-copy" data-aos="zoom-in" data-aos-delay="100">
                    <p><?php echo $prenumcopy; ?></p>
                  </div>
                  <?php endif; ?>
                  <div class="number counter" data-aos="zoom-in" data-aos-delay="100"><?php echo $number; ?></div>
                  <div class="graph-copy" data-aos="zoom-in" data-aos-delay="100">
                    <p><?php echo $copy; ?></p>
                  </div>
                </div>
                <?php
                        endwhile;
                    endif;
                    ?>
              </div>
            </div>
            <?php endif; ?>
          </div>
          <?php if($subtitle2) :?>
          <div class="hero-content-bottom-full-width" data-aos="fade-up">
            <div class="hero-subtitle-2"><?php echo $subtitle2; ?></div>
          </div>
          <?php endif;?>
        </div>
      </div>
    </div>
  </div>
</section>