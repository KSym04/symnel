<?php
/**
 * Symnel Static Page
 *
 * @package Osclass
 * @subpackage Symnel
 * @since Symnel 1.0
 */
// meta tag robots
osc_add_hook( 'header', 'dtf_nofollow_construct' );
dtf_add_body_class( 'static-page' );

osc_add_filter( 'meta_title_filter', 'custom_meta_title' );
function custom_meta_title( $data ) {
  return __(  osc_static_page_title() . ' / ' . osc_page_title(), 'symnel' );
}

osc_current_web_theme_path( 'header.php' );?>

<div class="container">
  <div class="row">

      <div class="static-page-block col-md-12">
        <?php echo dtf_get_breadcrumb(); ?>
        <div class="static-page-header">
          <h1><?php echo osc_static_page_title(); ?></h1>
        </div>
        <div class="static-page-content">
          <?php echo osc_static_page_text(); ?>
        </div>
      </div>

  </div>
</div>

<?php osc_current_web_theme_path( 'footer-item.php' ); ?>
<?php osc_current_web_theme_path( 'footer.php' ); ?>
