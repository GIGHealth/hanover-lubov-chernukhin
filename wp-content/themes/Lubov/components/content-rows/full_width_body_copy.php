<?php 
$copy = get_sub_field('full_width_body_copy');
$link = get_sub_field('link');
if($link){
  $link_url = $link['url'];
  $link_target = $link['target'] ? $link['target'] : '_self';
  $link_text = $link['title'];
}
?>
<div class="content-row body-copy-content">
  <div class="pt-3 pb-3 body-copy-content-inner d-flex flex-column content-bounds">
    <div class="d-flex body-copy-content-inner-copy flex-column justify-content-center w-100" data-aos="fade-up">
      <?php echo $copy; ?>
      <?php if($link):?>
      <div class="link-container">
        <?php echo buttonLink($link_url, $link_target, $link_text); ?>
      </div>
      <?php endif; ?>
    </div>

  </div>
</div>