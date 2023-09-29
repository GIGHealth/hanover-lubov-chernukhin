<?php
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */


get_header(); ?>

<?php

// TODO: Separate sections out into their own .php template files in /components/home and get_template_part them into here 
$videoMp4 = get_field('video_mp4')['url'];
$videoWebm = get_field('video_webm')['url'];
$title = get_field('hero_title');
$subTitle = get_field('sub_title');
$bioCopy = get_field('biography_copy');
$bioTitle = get_field('biography_section_title');
$doubleColTitle = get_field('double_column_block_title');
$doubleColCopy = get_field('double_col_copy');
$doubleColImg = get_field('double_column_image');
$doubleColLink = get_field('double_column_link');
$doubleColTitle2 = get_field('double_column_block_title_2');
$doubleColCopy2 = get_field('double_col_copy_2');
$doubleColImg2 = get_field('double_column_image_2');
$doubleColLink2 = get_field('double_column_link_2');
$videoEmbedLink = get_field('video_embed_link');

$bioLink = get_field('biography_link');
if($bioLink){
    $link_url = $bioLink['url'];
    $link_target = $bioLink['target'] ? $bioLink['target'] : '_self';
    $link_text = $bioLink['title'];
}
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

<div id="primary" class="content-area front-page">

  <section class="hero">
    <div class="hero-inner">
      <div class="hero-content ">
        <div class="hero-video">
          <!-- //TODO: Wrap video in if mp4 || webm, else render image field -->
          <video muted>
            <!-- //TODO: Wrap each of these sources in ifs -->
            <source src="<?php echo $videoMp4; ?>" type="video/mp4">
            <source src="<?php echo $videoWebm; ?>" type="video/webm">
            Your browser does not support the video tag.
          </video>
        </div>
        <a href="<?php echo $videoEmbedLink; ?>"
          class="play-btn-container video-modal-button"><?php echo playBtn(); ?></a>
        <div class="hero-title content-bounds">
          <h1 class="mb-5"><?php echo $title; ?></h1>
          <!-- //TODO: wrap in span for class to force H2 fake styling -->
          <!-- //TODO: Set this text to 4/5ths of the width -->
          <?php echo $subTitle; ?>
        </div>
      </div>
    </div>
  </section>
  <section class="biography-section bg-creme pt-5 pb-5">
    <div class="biography-inner content-bounds pt-5 pb-5" data-aos="fade-up">
      <!-- //TODO: Span > h3 on homepage -->
      <div class="biography-title mb-3"><span><?php echo $bioTitle; ?></span></div>
      <?php echo $bioCopy; ?>
      <?php if($bioLink):?>
      <div class="link-container">
        <?php echo buttonLink($link_url, $link_target, $link_text); ?>
      </div>
      <?php endif; ?>
    </div>
  </section>
  <section class="double-column-top">
    <div class="content-row double-column pt-5 pb-5">
      <div
        class="pt-5 double-column-inner d-flex flex-column flex-lg-row justify-content-center align-items-center content-bounds">
        <!-- //TODO: data-aos-delay in relation to their text -->
        <div class="double-col-img-container" data-aos="fade-up">
          <img class="double-col-img" src="<?php echo $doubleColImg['url']; ?>"
            alt="<?php echo $doubleColImg['alt']; ?>" width="<?php echo $img['width']; ?>"
            height="<?php echo $img['height']; ?>">
        </div>
        <div class="double-col-copy text-center justify-content-center align-items-center d-flex flex-column">
          <div class="double-col-copy-inner" data-aos="fade-up">
            <div class="double-col-title mb-3">
              <span><?php echo $doubleColTitle; ?></span>
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
        <!-- //TODO: data-aos-delay in relation to their text -->
        <div class="double-col-img-container" data-aos="fade-up">
          <img class="double-col-img" src="<?php echo $doubleColImg2['url']; ?>"
            alt="<?php echo $doubleColImg2['alt']; ?>" width="<?php echo $img['width']; ?>"
            height="<?php echo $img['height']; ?>">
        </div>
        <div class="double-col-copy text-center justify-content-center align-items-center d-flex flex-column">
          <div class="double-col-copy-inner" data-aos="fade-up">
            <div class="double-col-title mb-3">
              <span><?php echo $doubleColTitle2; ?></span>
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

  <?php
$args = array(
    'post_type'       => array( 'post' ),
    'post_status'     => array( 'publish' ),
    'order'           => 'DESC',
    'posts_per_page'  => 3,
    'facetwp'         => true,
);
// The Query
$query = new WP_Query( $args );
if($query->have_posts()):?>
  <section class="latest-from-the-blog bg-green pt-5 pb-5">
    <!-- //TODO: see what on hover just changing the line color looks like, maybe screen record a few options to show james -->
    <div class="facetwp-container content-bounds d-flex flex-column pt-5 pb-5" data-aos="fade-up">
      <div class="latest-from-the-blog-title mb-3"><span>Latest from the blog</span></div>
      <?php while ( $query->have_posts() ) : $query->the_post();
    set_query_var( 'concat', false );
    get_template_part('components/latest_blog_post_home') ;?>
      <?php endwhile; ?>
    </div>
  </section>

  <?php endif; ?>

</div>


<?php
get_footer();