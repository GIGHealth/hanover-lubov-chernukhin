

<div class="content-row case-studies pt-5">
    <div class="small-bounds case-studies-inner d-flex align-items-start justify-content-center">
    <?php
    if( have_rows('case_study_rows') ):
    // Loop through rows.
    while( have_rows('case_study_rows') ) : the_row();
        $title= get_sub_field('title');
        $copy= get_sub_field('copy');
    ?>
    <div
    class="p-5 case-study d-flex">
    <div class="pb-3 column-text d-flex flex-column justify-content-top w-100" data-aos="fade-up">
      <div class="content">
        <h2 class="mb-3"><?php echo $title; ?></h2>
        <?php echo $copy; ?>
      </div>
    </div>
  </div>
  <?php
    endwhile;
endif;
?>
</div>
</div> 

