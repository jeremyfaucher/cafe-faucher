<?php
/**
* Header file for the Cafe Faucher WordPress theme.
*
* @package Cafe_Faucher
* @since Cafe Faucher 1.1
*/
?><!DOCTYPE html>
<html <?php language_attributes();?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <header role="banner">
    <section class="container-full grid-1x2">
     <div class="logo">
      <a href="http://localhost/blog/" class="desktop" rel="home" itemprop="url"><img src="<?php echo get_home_url(); ?>/wp-content/uploads/design-2-seo-logo.png" class="logo" alt="Brand" /></a></div>
      <?php wp_nav_menu(array(
        'theme_location' => 'main', 
        'container' => false, 
        'menu_class' => 'header-menu', 
      )); 
      ?>
      <nav class="mobile-menu">
        <input id="hamburger" type="checkbox" name="hamb" value="hamb">
        <label class="hamb" for="hamb">☰</label>
        <?php wp_nav_menu(array(
          'theme_location' => 'main', 
          'container-bg' => false, 
          'menu_class' => 'mobile', 
        )); 
        ?>
      </nav>
    </section>
  </header>
  <?php if (is_page('home')) { ?>
  <style>
        .carousel {
         height: 416px;
         border-radius: 3px;
         overflow: hidden;
         position: relative;
         box-shadow: 0 3px 6px rgba(0, 0, 0, 0.2);
     }
     .carousel:hover .controls {
         opacity: 1;
     }
     .carousel .controls {
         opacity: 0;
         display: flex;
         position: absolute;
         top: 50%;
         left: 0;
         justify-content: space-between;
         width: 100%;
         z-index: 99999;
         transition: all ease 0.5s;
     }
     .carousel .controls .control {
         margin: 0 5px;
         display: flex;
         align-items: center;
         justify-content: center;
         height: 40px;
         width: 40px;
         border-radius: 50%;
         background-color: rgba(255, 255, 255, 0.7);
         opacity: 0.5;
         transition: ease 0.3s;
         cursor: pointer;
     }
     .carousel .controls .control:hover {
         opacity: 1;
     }
     .carousel .slides {
         position: absolute;
         top: 50%;
         left: 0;
         transform: translateY(-50%);
         display: flex;
         width: 100%;
         transition: 1s ease-in-out all;
     }
     .carousel .slides .slide {
         min-width: 100%;
         min-height: 416px;
         height: auto;
     }
 </style>
  <div class="container-nb home-banner">
    <div class="home-banner">
       <?php do_action('cf_carousel'); ?>
      <div class="grid">
        <h1>Slider/Banner Here</h1>
        <h5>This is all about the here!</h5>
      </div>
    </div>
    <div class="spacer-sm"></div>
  </div>
    <?php } else { ?>
    <?php } ?>
