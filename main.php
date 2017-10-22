<?php
/**
 * Symnel Homepage
 *
 * @package Osclass
 * @subpackage Symnel
 * @since Symnel 1.0
 */
// meta tag robots
osc_add_hook( 'header', 'dtf_follow_construct' );

// add home class on body tag
dtf_add_body_class( 'home' );

// call header
osc_current_web_theme_path( 'header.php' );

osc_add_filter( 'meta_title_filter', 'custom_meta_title' );
function custom_meta_title( $data ) {
  return __( osc_page_title() . ' / ' . osc_page_description(), 'symnel' );
}

// some class variables
$listClass   = '';
dtf_show_flash_message( 'pubMessages', 'alert alert-dismissable alert-success' ); ?>

<div class="container">
  <div class="row">

    <?php osc_current_web_theme_path( 'side-widgets-homepage.php' ); ?>

    <div class="listings-block col-md-7">

      <nav class="navbar navbar-default navbar-static" role="navigation">
        <div class="container">
          <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
              <li class="active"><a href="#all-listing"><?php _e( "Recent", 'symnel' ) ; ?></a></li>
            </ul>
          </div>
        </div>
      </nav>
      <?php if ( osc_count_latest_items() == 0 ) { ?>
          <p class="alert alert-warning"><?php _e( "There aren't listings available at this moment", 'symnel' ); ?></p>
      <?php } else {
        View::newInstance()->_exportVariableToView( "listType", 'latestItems' );
        View::newInstance()->_exportVariableToView( "listClass", $listClass );
        osc_current_web_theme_path( 'loop-front.php' );
      } ?>
      <?php if ( osc_count_latest_items() == osc_max_latest_items() ) { ?>
      <div class="search-all-block">
            <a href="<?php echo osc_search_show_all_url() ; ?>" class="btn btn-default btn-block">
              <strong><?php _e( 'See all listings', 'symnel' ) ; ?> &raquo;</strong>
            </a>
      </div>
      <?php } ?>
    </div><!-- .listings-block -->

    <?php osc_current_web_theme_path( 'side-widgets.php' ); ?>

  </div>
</div>

<?php osc_current_web_theme_path( 'footer-item.php' ); ?>
<?php osc_current_web_theme_path( 'footer.php' ); ?>
