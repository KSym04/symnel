<?php
/**
 * Symnel Custom Page
 *
 * @package Osclass
 * @subpackage Symnel
 * @since Symnel 1.0
 */

// meta tag robots
dtf_add_body_class( 'custom-page' );
osc_current_web_theme_path( 'header.php' );?>

<div class="container">
  <div class="row">

      <div class="static-page-block col-md-12">
        <?php echo dtf_get_breadcrumb(); ?>
        <div class="static-page-content">
          <?php osc_render_file(); ?>
        </div>
      </div>

  </div>
</div>

<?php osc_current_web_theme_path( 'footer-item.php' ); ?>
<?php osc_current_web_theme_path( 'footer.php' ); ?>
