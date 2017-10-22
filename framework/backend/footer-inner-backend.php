<?php
/**
 * @package    Osclass
 * @author     DopeThemes <hello@dopethemes.com>
 * @copyright  Copyright (c) DopeThemes 2014
 * @license    http://www.dopethemes.com/license/osclass
 * @link       http://www.dopethemes.com/
 */
?>
    <div class="row">
      <div class="col-lg-12 footer-inner-backend clearfix">
        <div class="footer-copyright"><?php printf( '&copy; %s %s', date( "Y" ), osc_page_title() ); ?></div>
        <div class="footer-inner-menu">
          <ul>
                <?php osc_reset_static_pages(); while ( osc_has_static_pages() ) { ?>
                    <li>
                        <a href="<?php echo osc_static_page_url(); ?>"><?php echo osc_static_page_title(); ?></a>
                    </li>
                <?php } ?>
                <li>
                    <a href="<?php echo osc_contact_url(); ?>"><?php _e( 'Contact', 'symnel' ); ?></a>
                </li>
            </ul>
        </div>
      </div>
    </div>
