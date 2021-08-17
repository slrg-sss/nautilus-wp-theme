<?php

$actLang = substr(get_bloginfo('language'), 0, 2);
if ($actLang != "de" && $actLang != "fr" && $actLang != "it") {
  $actLang = "de";
}
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>"/>
  <meta name="viewport" content="width=device-width"/>
  <link rel="profile" href="http://gmpg.org/xfn/11"/>
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/>
  <?php wp_head(); ?>
</head>

<body
  <?php body_class(); ?>
>

<header id="masthead" class="site-header">
  <div id="metaNav">
    <div class="wrapper">
      <?php wp_nav_menu(array('theme_location' => 'meta')); ?>
    </div>
  </div>
  <div class="wrapper">
    <div id="brand">
      <?php
      if (function_exists('the_custom_logo')) {
        the_custom_logo();
        if (get_theme_mod('custom_logo')) {

        } else {
          echo("<a href=\"" . esc_url(home_url('/')) . "\" title=\"" . esc_attr(get_bloginfo('name', 'display')) . "\" rel=\"home\"><img width=\"600\" height=\"180\" src=\"" . get_template_directory_uri() . "/assets/images/SLRG-Logo_" . $actLang . ".png\" class=\"custom-logo\" alt=\"" . __('SLRG SSS Ihre Rettungsschwimmer', 'slrg-sss-nautilus') . "\"></a>");
        }
      }
      ?>
    </div>

    <div class="header-right-wrapper">
      <a href="#" id="nav-toggle"><?php esc_html_e('Menu', 'slrg-sss-nautilus'); ?><span></span></a>
      <nav id="site-navigation" class="main-navigation" role="navigation">
        <ul class="nav-menu">
          <?php wp_nav_menu(array('theme_location' => 'primary', 'container' => '', 'items_wrap' => '%3$s')); ?>
        </ul>
      </nav>
    </div>

  </div>
</header>

<main class="main-fluid">
