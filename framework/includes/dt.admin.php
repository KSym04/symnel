<?php
/**
 * DopeFramework Administrator Panel
 *
 * @package    Osclass
 * @author     DopeThemes <hello@dopethemes.com>
 * @copyright  Copyright (c) DopeThemes 2014
 * @license    http://www.dopethemes.com/license/osclass
 * @link       http://www.dopethemes.com/
 */

/**
 * Get theme logo url
 */
function dtf_logo_url() {
  $logo = osc_get_preference( 'logo', 'symnel_theme' );
  if ( $logo ) {
    return osc_uploads_url( $logo );
  }
  return false;
}
