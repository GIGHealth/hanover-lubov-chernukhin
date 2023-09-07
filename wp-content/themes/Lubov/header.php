<!doctype html>
<html <?php language_attributes(); ?> class="no-js">

<head>
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
    color="#5bbad5">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="theme-color" content="#ffffff">

  <link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?>"
    href="<?php bloginfo( 'rss2_url' ); ?>" />

  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="<?php bloginfo( 'description' ); ?>">

  <link
    href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700&display=swap"
    rel="stylesheet">

  <?php wp_head(); ?>

  <!-- Bootstrap Style -->
  <link rel='stylesheet' id='bootstrapStyle'
    href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' media="print"
    onload="this.media='all'" />

  <!-- <link rel="stylesheet" id="mmenuStyle" href="https://cdnjs.cloudflare.com/ajax/libs/jQuery.mmenu/9.3.0/mmenu.min.css"
    integrity="sha512-nNatP1G6CEh43irXY/GN4cDcLRX/R0jAYAV/ulFZcotSXcuIQE5Do4TuDOYNAD2SCIpmIbaYSllyjTysSCkpEw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" media="print" onload="this.media='all'" /> -->

  <!-- <link rel='stylesheet' id='simpleLightbox'
    href='<?php echo get_template_directory_uri();?>/js/lib/simpleLightbox.min.css' media="print"
    onload="this.media='all'" /> -->

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
  
  <!-- wrapper -->
  <div class="wrapper">

    <!-- header -->
    Header
    <!-- /header -->