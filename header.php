<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">

  <title><?php bloginfo('name'); ?><?php wp_title(); ?></title>

  <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset <?php bloginfo('charset'); ?>" />

  <meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats pease -->

  <link rel="stylesheet" href="libs/magnific-popup.css">
  <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
  <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
  <link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
  <link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

  <?php wp_get_archives( 'type=monthly&format=link' ); ?>
  <?php wp_head(); ?>


</head>
<body>

    <div class="main">
        <div class="head">
            <h2>Выбери своё<br /> Путишествие</h2>
            <a href="http://localhost/WP_WDLessons/"><span>C</span>hoose <span>T</span>ravel</a>
        </div>
        <div class="content_main">
            <ul class="menu">
                <?php wp_list_pages('title_li='); ?>
                <?php include(TEMPLATEPATH . './searchform.php'); ?>
            </ul>
        </div>
        <div id="slider">
            <ul id="cycle" style="list-style: none;">
                <li><img src="<?php bloginfo( 'template_url' )?>/images/emirats.jpg" height="336" width="936" alt="Slides"></li>
            </ul>
            <div id="cyclePager"></div>
        </div>

