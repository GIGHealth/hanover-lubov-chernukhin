<div class="content-row timeline-rows">
  <div class="content-bounds d-flex justify-content-center flex-column timeline-rows-inner">
    <?php
    //TODO: Experiment with fade in left fade in right etc to make it a little more special
    if( have_rows('timeline_rows') ):
      $n = 0;
      //increment per row
    // Loop through rows.
    while( have_rows('timeline_rows') ) : the_row();
        $companyName= get_sub_field('company_name');
        $job= get_sub_field('job_description');
        $index = get_row_index();
        //see if the number is odd or even
    ?>
    <div class="pt-3 pb-3 timeline-row d-flex" <?php if($index % 2 == 0):?>data-aos="fade-left"<?php else: ?>data-aos="fade-right"<?php endif; ?>>
      <div class="column-text d-flex flex-column justify-content-center w-100">
        <div class="content d-flex flex-column">
          <h3 class="company-name"><?php echo $companyName; ?></h3>
          <span class="job-position"><?php echo $job; ?></span>
        </div>
      </div>
    </div>
    <?php
    endwhile;
endif;
?>
  </div>
</div>