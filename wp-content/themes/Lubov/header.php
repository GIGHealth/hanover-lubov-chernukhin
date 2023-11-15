<!doctype html>
<html <?php language_attributes(); ?> class="no-js">

<head>
  	<!-- Start cookieyes banner -->
	<script id="cookieyes" type="text/javascript" src="https://cdn-cookieyes.com/client_data/c2c5ada4f5d3533d8b053bb8/script.js"></script>
	<!-- End cookieyes banner -->
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <title><?php wp_title( '' ); ?><?php if ( wp_title( '', false ) ) { echo ' : '; } ?><?php bloginfo( 'name' ); ?>
  </title>

  <link href="//www.google-analytics.com" rel="dns-prefetch">
  <link rel="dns-prefetch" href="//www.google-analytics.com">
  <link rel="dns-prefetch" href="//diffuser-cdn.app-us1.com">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

  <link rel="apple-touch-icon" sizes="180x180"
    href="<?php echo get_template_directory_uri(); ?>/img/icons/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32"
    href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16"
    href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon-16x16.png">
  <link rel="mask-icon" href="<?php echo get_template_directory_uri(); ?>/img/icons/safari-pinned-tab.svg"
  content="#163216">
  <meta name="msapplication-TileColor" content="#163216">
  <meta name="theme-color" content="#163216">

  <link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?>"
    href="<?php bloginfo( 'rss2_url' ); ?>" />

  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="<?php bloginfo( 'description' ); ?>">

  <link rel="stylesheet" href="https://use.typekit.net/jom6plh.css">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <?php wp_head(); ?>

  <!-- Bootstrap Style -->
  <link rel='stylesheet' id='bootstrapStyle'
    href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' media="print"
    onload="this.media='all'" />

  <!-- <link rel="stylesheet" id="mmenuStyle" href="https://cdnjs.cloudflare.com/ajax/libs/jQuery.mmenu/9.3.0/mmenu.min.css"
    integrity="sha512-nNatP1G6CEh43irXY/GN4cDcLRX/R0jAYAV/ulFZcotSXcuIQE5Do4TuDOYNAD2SCIpmIbaYSllyjTysSCkpEw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" media="print" onload="this.media='all'" /> -->

  <link rel='stylesheet' id='simpleLightbox'
    href='<?php echo get_template_directory_uri();?>/js/lib/simpleLightbox.min.css' media="print"
    onload="this.media='all'" />

  <link rel='stylesheet' id='owlStyle' href='<?php echo get_template_directory_uri();?>/js/lib/owl.carousel.min.css'
    media="print" onload="this.media='all'" />

  <link rel='stylesheet' id='owlTheme'
    href='<?php echo get_template_directory_uri();?>/js/lib/owl.theme.default.min.css' media="print"
    onload="this.media='all'" />

  <!-- Custom Style -->
  <link rel='stylesheet' id='customStyle' href='<?php echo get_template_directory_uri(); ?>/style.css' media=" print"
    onload="this.media='all'" />

  <?php include (TEMPLATEPATH . '/criticalCSS.php'); ?>


  <!-- PRELOADS -->
  <body <?php body_class(); ?>>
  <!-- wrapper -->
  <div class="wrapper">

    <!-- header -->
    <header role="banner" class="header show-me">
        <div class="header-inner site-bounds">
          <a class="nav-logo" href="<?php echo get_home_url(); ?>"><span class="sr-only">Go Home</span>
            <?php echo logo();?></a>
          <nav class="nav" id="mmenuMain"><?php main_nav(); ?></nav>
          <div class="burger-container">
						<ul class="burger">
							<li class="one"></li>
							<li class="two"></li>
							<li class="three"></li>
							<li class="four"></li>
						</ul>
					</div>
        </div>
      </header>
    <!-- /header -->