<?php
$bioCopy = get_field('biography_copy');
$bioTitle = get_field('biography_section_title');
$bioLink = get_field('biography_link');
if($bioLink){
    $link_url = $bioLink['url'];
    $link_target = $bioLink['target'] ? $bioLink['target'] : '_self';
    $link_text = $bioLink['title'];
}
?>

<section class="biography-section bg-creme pt-5 pb-5" aria-labelledby="biography section">
    <div class="biography-section-inner content-bounds">
    <div class="biography-inner small-bounds pt-5 pb-5" data-aos="fade-up">
      <div class="biography-title mb-3"><h3><?php echo $bioTitle; ?></h3></div>
      <?php echo $bioCopy; ?>
      <?php if($bioLink):?>
      <div class="link-container">
        <?php echo buttonLink($link_url, $link_target, $link_text); ?>
      </div>
      <?php endif; ?>
    </div>
    </div>
  </section>