<?php
$videoMp4 = get_field('video_mp4');
$videoWebm = get_field('video_webm');
$title = get_field('hero_title');
$heroImg = get_field('home_hero_image');
$subTitle = get_field('sub_title');

$videoEmbedLink = get_field('video_embed_link');
?>

<section class="hero">
    <div class="hero-inner">
      <div class="hero-content ">
        <?php if($videoMp4 || $videoWebm): ?>
        <div class="hero-video">
          <video muted preload="metadata">
            <?php if($videoMp4): ?>
            <source src="<?php echo $videoMp4['url']; ?>" type="video/mp4">
            <?php endif; ?>
            <?php if($videoWebm): ?>
            <source src="<?php echo $videoWebm['url']; ?>" type="video/webm">
            <?php endif; ?>
            Your browser does not support the video tag.
          </video>
          <a href="<?php echo $videoEmbedLink; ?>"
          class="play-btn-container video-modal-button" aria-label="Video play button - opens modal"><?php echo playBtn(); ?></a>
        </div>
        <?php else: ?>
          <div class="hero-img" style="background-image:url(<?php echo $heroImg['url'] ?>)">
          </div>
        <?php endif; ?>
        <div class="hero-title content-bounds">
          <h1 class="mb-5"><?php echo $title; ?></h1>
          <?php echo $subTitle; ?>
        </div>
      </div>
    </div>
  </section>