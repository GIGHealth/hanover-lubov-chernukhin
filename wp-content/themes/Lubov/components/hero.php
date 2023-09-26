<?php
$title = get_field('title');
$image = get_the_post_thumbnail_url();
$subtitle = get_field('subtitle');
$subtitle2 = get_field('subtitle_2');
$toggleGraph = get_field('toggle_graph');
?>

<section class="hero">
  <div class="hero-inner">
    <div class="hero-content ">
        <div class="hero-content-top">
            <div class="hero-content-top-inner content-bounds">
                <div class="hero-title">
                    <h1><?php echo $title; ?></h1>
                </div>
                <div class="hero-image">
                    <img src="<?php echo $image;?>" alt="<?php echo $title;?>" />
                </div>
            </div>
        </div>
        <div class="hero-content-bottom">
            <div class="hero-content-bottom-inner content-bounds">
                <div class="hero-content-bottom-two-col">
                    <div class="hero-subtitle"><?php echo $subtitle; ?></div>
                    <?php if ($toggleGraph): ?>
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
                            <div class="graph-col">
                                <?php if($prenumcopy):?>
                                <div class="prenumgraph-copy"><p><?php echo $prenumcopy; ?></p></div>
                                <?php endif; ?>
                                <div class="number"><p><?php echo $number; ?></p></div>
                                <div class="graph-copy"><p><?php echo $copy; ?></p></div>
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
                <div class="hero-content-bottom-full-width">
                    <div class="hero-subtitle-2"><?php echo $subtitle2; ?></div>
                </div>
                <?php endif;?>
            </div>
        </div>
    </div>
  </div>
</section>


