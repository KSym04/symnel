<?php
/**
 *
 *
 * @package    Osclass
 * @author     DopeThemes <hello@dopethemes.com>
 * @copyright  Copyright (c) DopeThemes 2014
 * @license    http://www.dopethemes.com/license/osclass
 * @link       http://www.dopethemes.com/
 */
?>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />

    <title><?php echo meta_title() ; ?></title>
    <meta name="title" content="<?php echo osc_esc_html( meta_title() ); ?>" />
    <?php if ( meta_description() != '' ) { ?>
    <meta name="description" content="<?php echo osc_esc_html( meta_description() ); ?>" />
    <?php } ?>
    <?php if ( meta_keywords() != '' ) { ?>
    <meta name="keywords" content="<?php echo osc_esc_html( meta_keywords() ); ?>" />
    <?php } ?>
    <?php if ( osc_get_canonical() != '' ) { ?>
    <!-- canonical -->
    <link rel="canonical" href="<?php echo osc_get_canonical(); ?>"/>
    <!-- /canonical -->
    <?php } ?>
    <meta http-equiv="Cache-Control" content="no-cache" />
    <meta http-equiv="Expires" content="Fri, Jan 01 1970 00:00:00 GMT" />

    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

    <!-- favicon -->
    <link rel="shortcut icon" href="<?php echo osc_current_web_theme_url( 'assets/img/favicon/favicon-48.png' ); ?>">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo osc_current_web_theme_url( 'assets/img/favicon/favicon-144.png' ); ?>">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo osc_current_web_theme_url( 'assets/img/favicon/favicon-114.png' ); ?>">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo osc_current_web_theme_url( 'assets/img/favicon/favicon-72.png' ); ?>">
    <link rel="apple-touch-icon-precomposed" href="<?php echo osc_current_web_theme_url( 'assets/img/favicon/favicon-57.png' ); ?>">
    <!-- /favicon -->

    <?php osc_run_hook( 'before_header' ); ?>
    <?php osc_run_hook( 'header' ); ?>
