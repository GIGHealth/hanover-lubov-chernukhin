<div class="content-row timeline-rows">
    <div class="content-bounds d-flex justify-content-center flex-column timeline-rows-inner">
    <?php
    if( have_rows('timeline_rows') ):
    // Loop through rows.
    while( have_rows('timeline_rows') ) : the_row();
        $companyName= get_sub_field('company_name');
        $job= get_sub_field('job_description');
    ?>
    <div
    class="pt-3 pb-3 timeline-row d-flex">
    <div class="column-text d-flex flex-column justify-content-center w-100" data-aos="fade-up">
      <div class="content">
        <h2 class=""><?php echo $companyName; ?></h2>
        <?php echo $job; ?>
      </div>
    </div>
  </div>
  <?php
    endwhile;
endif;
?>
</div>
</div> 

