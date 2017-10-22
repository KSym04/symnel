<?php
/**
 * Symnel Side Footer
 *
 * @package Osclass
 * @subpackage Symnel
 * @since Symnel 1.0
 */
?>
<div class="footer-sidebar-section">
  <ul>
    <li><span class="footer-copyright-text"><?php printf( '&copy; %s %s', date("Y"), osc_page_title() ); ?></span></li>
  <?php
  osc_reset_static_pages();
  while ( osc_has_static_pages() ) { ?>
    <li>
      <a href="<?php echo osc_static_page_url(); ?>"><?php echo osc_static_page_title(); ?></a>
    </li>
  <?php } ?>
    <li>
      <a href="<?php echo osc_contact_url(); ?>"><?php _e( 'Contact', 'symnel' ); ?></a>
    </li>
  </ul>
</div>
