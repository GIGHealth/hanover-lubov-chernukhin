<?php
$doubleColTitle = get_field('double_column_block_title');
$doubleColCopy = get_field('double_col_copy');
$doubleColImg = get_field('double_column_image');
$doubleColLink = get_field('double_column_link');
$doubleColTitle2 = get_field('double_column_block_title_2');
$doubleColCopy2 = get_field('double_col_copy_2');
$doubleColImg2 = get_field('double_column_image_2');
$doubleColLink2 = get_field('double_column_link_2');

if($doubleColLink){
    $link_url = $doubleColLink['url'];
    $link_target = $doubleColLink['target'] ? $doubleColLink['target'] : '_self';
    $link_text = $doubleColLink['title'];
}
if($doubleColLink2){
    $link_url = $doubleColLink2['url'];
    $link_target = $doubleColLink2['target'] ? $doubleColLink2['target'] : '_self';
    $link_text = $doubleColLink2['title'];
}
?>

<section class="double-column-top">
    <div class="content-row double-column pt-5 pb-5">
      <div
        class="pt-5 double-column-inner d-flex flex-column flex-lg-row justify-content-center align-items-center content-bounds">
        <div class="double-col-img-container" data-aos="fade-up"  data-aos-delay="100">
          <img class="double-col-img" src="<?php echo $doubleColImg['url']; ?>"
            alt="<?php echo $doubleColImg['alt']; ?>" width="<?php echo $img['width']; ?>"
            height="<?php echo $img['height']; ?>">
        </div>
        <div class="double-col-copy text-center justify-content-center align-items-center d-flex flex-column">
          <div class="double-col-copy-inner" data-aos="fade-up">
            <div class="double-col-title mb-3">
              <h4><?php echo $doubleColTitle; ?></h4>
            </div>
            <?php echo $doubleColCopy; ?>
            <?php if($doubleColLink):?>
            <div class="link-container">
              <?php echo buttonLink($link_url, $link_target, $link_text); ?>
            </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="double-column-bottom">
    <div class="content-row double-column pt-5 pb-5">
      <div class="pt-3 double-column-inner d-flex flex-column flex-lg-row-reverse justify-content-center align-items-center
         content-bounds">
        <div class="double-col-img-container" data-aos="fade-up" data-aos-delay="100">
          <img class="double-col-img" src="<?php echo $doubleColImg2['url']; ?>"
            alt="<?php echo $doubleColImg2['alt']; ?>" width="<?php echo $img['width']; ?>"
            height="<?php echo $img['height']; ?>">
        </div>
        <div class="double-col-copy text-center justify-content-center align-items-center d-flex flex-column">
          <div class="double-col-copy-inner" data-aos="fade-up">
            <div class="double-col-title mb-3">
              <h4><?php echo $doubleColTitle2; ?></h4>
            </div>
            <?php echo $doubleColCopy2;?>
            <?php if($doubleColLink2):?>
            <div class="link-container">
              <?php echo buttonLink($link_url, $link_target, $link_text); ?>
            </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </section>