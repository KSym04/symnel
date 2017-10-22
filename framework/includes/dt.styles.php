<?php
/**
 * DopeFramework Styles
 *
 * @package    Osclass
 * @author     DopeThemes <hello@dopethemes.com>
 * @copyright  Copyright (c) DopeThemes 2014
 * @license    http://www.dopethemes.com/license/osclass
 * @link       http://www.dopethemes.com/
 */

/**
 * Load styles
 */
function dtf_load_styles() {

  // external stylesheet resources
  osc_enqueue_style( 'google-font-css', '//fonts.googleapis.com/css?family=Open+Sans:300,400,700' );
  osc_enqueue_style( 'boostrap-css', '//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css' );
  osc_enqueue_style( 'fontawesome-css', '//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css' );

  if( THEME_ENV === true ) {
    osc_enqueue_style( 'symnel-css', osc_current_web_theme_url('combine.php?type=css&files=framework/library/css/sb-admin.css,framework/library/css/entypo.css,framework/library/css/entypo-codes.css,framework/library/css/entypo-embedded.css,framework/library/css/entypo-ie7-codes.css,framework/library/css/entypo-ie7.css,framework/library/css/ajax-uploader.css,framework/library/css/backend-dope-override.css,assets/css/galleriffic-2.css,assets/js/select2/select2.css,assets/css/main.css') );
  } else {
    osc_enqueue_style( 'symnel-css', osc_current_web_theme_url('assets/css/base.min.css') );
  }
  osc_enqueue_style( 'symnel-custom-css', osc_current_web_theme_url('assets/css/custom.css') );

  osc_load_styles();
}
osc_add_hook( 'before_header', 'dtf_load_styles' );

/**
 * Remove stylesheet
 */
function dtf_remove_styles() {
  osc_remove_style( 'google-font-css' );
  osc_remove_style( 'boostrap-css' );
  osc_remove_style( 'fontawesome-css' );
  osc_remove_style( 'symnel-css' );
  osc_remove_style( 'symnel-custom-css' );
}
osc_add_hook( 'header', 'dtf_remove_styles' );
