<?php
/**
 * DopeFramework Scripts
 *
 * @package    Osclass
 * @author     DopeThemes <hello@dopethemes.com>
 * @copyright  Copyright (c) DopeThemes 2014
 * @license    http://www.dopethemes.com/license/osclass
 * @link       http://www.dopethemes.com/
 */

/**
 * Load scripts on header
 */
function dtf_load_scripts() {

  // load to CDN
  osc_register_script( 'jquery', '//ajax.aspnetcdn.com/ajax/jQuery/jquery-1.10.2.min.js' );
  osc_register_script( 'jquery-migrate', '//ajax.aspnetcdn.com/ajax/jquery.migrate/jquery-migrate-1.2.1.min.js', array( 'jquery' ) );
  osc_register_script( 'jquery-ui', '//ajax.aspnetcdn.com/ajax/jquery.ui/1.10.2/jquery-ui.min.js', array( 'jquery' ) );
  osc_register_script( 'jquery-validate', '//ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js', array( 'jquery' ) );
  osc_register_script( 'jquery-fineuploader', osc_current_web_theme_url( 'framework/library/js/jquery-vendor/jquery.fineuploader.min.js' ), array( 'jquery' ) );
  osc_register_script( 'bootstrap-js', '//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js' );

  if( THEME_ENV === true ) {
    osc_register_script( 'symnel-js', osc_current_web_theme_url( 'combine.php?type=javascript&files=framework/library/js/jquery-vendor/jquery.lazyload.min.js,framework/library/js/jquery-vendor/jquery.tablesorter.js,framework/library/js/tablesorter/tables.js,framework/library/js/dopeframework-backend.js,assets/js/jquery.timeago.js,assets/js/superfish.js,assets/js/jquery.galleriffic.js,assets/js/jquery.opacityrollover.js,assets/js/jquery.validate.additional-method.js,assets/js/select2/select2.min.js,assets/js/enquire.min.js,assets/js/global.js' ) );
  } else {
    osc_register_script( 'symnel-js', osc_current_web_theme_url( 'assets/js/base.min.js' ) );
  }

  osc_register_script( 'symnel-custom-js', osc_current_web_theme_url( 'assets/js/custom.js' ) );

  // display script
  osc_enqueue_script( 'jquery' );
  osc_enqueue_script( 'jquery-migrate' );
  osc_enqueue_script( 'jquery-ui' );
  osc_enqueue_script( 'jquery-validate' );
  osc_enqueue_script( 'jquery-fineuploader' );
  osc_enqueue_script( 'bootstrap-js' );
  osc_enqueue_script( 'symnel-js' );
  osc_enqueue_script( 'symnel-custom-js' );
}
osc_add_hook( 'header', 'dtf_load_scripts' );
