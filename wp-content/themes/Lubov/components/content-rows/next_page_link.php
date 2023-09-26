<?php
$title = get_field('block_title');
$copy = get_field('copy');

$link = get_field('link');
if($link){
  $link_url = $link['url'];
  $link_target = $link['target'] ? $link['target'] : '_self';
  $link_text = $link['title'];
}
?>

<div class="content-row next-page-link bg-dark-creme pt-5 pb-5">
  <div class="next-page-link-inner content-bounds text-center d-flex flex-column justify-content-center align-items-center pt-3 pb-3">
    <div class="next-page-link-title"><span><?php echo $title; ?></span></div>
    <div class="next-page-link-copy"><?php echo $copy; ?></div>
    <?php if($link):?>
      <div class="next-page-link-container">
        <?php echo buttonLink($link_url, $link_target, $link_text); ?>
      </div>
    <?php endif; ?>
  </div>
</div>