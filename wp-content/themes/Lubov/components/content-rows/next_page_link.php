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

<?php if($link): ?>
<div class="content-row next-page-link bg-dark-creme pt-5 pb-5">
  <div
    class="next-page-link-inner content-bounds text-center d-flex flex-column justify-content-center align-items-center pt-3 pb-3"
    data-aos="fade-up">
    <?php if ($title): ?>
    <div class="next-page-link-title"  data-aos="fade-up" data-aos-delay="100"><h4><?php echo $title; ?></h4></div>
    <?php endif; ?>
    <?php if ($copy): ?>
    <div class="next-page-link-copy"  data-aos="fade-up" data-aos-delay="200"><?php echo $copy; ?></div>
    <?php endif; ?>
    <div class="next-page-link-container"  data-aos="fade-up" data-aos-delay="300">
      <?php echo buttonLink($link_url, $link_target, $link_text); ?>
    </div>
  </div>
</div>
<?php endif; ?>