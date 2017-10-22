<?php
/**
 * Symnel Public Profile Page
 *
 * @package Osclass
 * @subpackage Symnel
 * @since Symnel 1.0
 */

// meta tag robots
osc_add_hook( 'header', 'dtf_follow_construct' );

$address = '';
if ( osc_user_address()!='' ) {
  if ( osc_user_city_area()!='' ) {
    $address = osc_user_address().", ".osc_user_city_area();
  } else {
    $address = osc_user_address();
  }
} else {
  $address = osc_user_city_area();
}
$location_array = array();
if ( trim( osc_user_city()." ".osc_user_zip() )!='' ) {
  $location_array[] = trim( osc_user_city()." ".osc_user_zip() );
}
if ( osc_user_region()!='' ) {
  $location_array[] = osc_user_region();
}
$location = implode( ", ", $location_array );
unset( $location_array );

dtf_add_body_class( 'user-public-profile' );

osc_add_filter( 'meta_title_filter', 'custom_meta_title' );
function custom_meta_title( $data ) {
  return __( sprintf('Public Profile / %s', osc_user_name()), 'symnel' );
}

osc_current_web_theme_path( 'header.php' ); ?>

<div class="container">
  <div class="row">

    <?php dtf_show_flash_message( 'pubMessages', 'alert alert-dismissable alert-warning' ); ?>

    <div class="user-pp-block clearfix col-md-2">
      <div class="seller-photo">
        <img class="thumbnail" src="http://www.gravatar.com/avatar/<?php echo md5( strtolower( trim( osc_user_email() ) ) ); ?>?s=190&d=identicon" />
        <?php if ( osc_is_web_user_logged_in() ) { ?>
        <span class="seller-status label label-success"><?php _e( 'online', 'symnel' ); ?></span>
        <?php } else { ?>
        <span class="seller-status label label-danger"><?php _e( 'offline', 'symnel' ); ?></span>
        <?php } ?>
      </div>
      <?php
        $seller_username = dtf_get_username( osc_user_id() );
        if ( !is_numeric( $seller_username ) ) { ?>
          <div class="seller-username"><?php echo $seller_username; ?></div>
      <?php } ?>
      <div class="seller-regdate"><?php _e( 'Member Since:', 'symnel' ); ?> <?php echo date( "M Y", strtotime( osc_user_regdate() ) ); ?></div>
      <?php if ( $location !== '' ) { ?>
        <div class="seller-location">
            <?php printf( __( '%1$s' ), $location ); ?>
        </div>
      <?php } ?>
      <?php if ( osc_user_phone() !== '' ) { ?>
      <div class="seller-mobile visible-portrait">
          <span class="btn btn-warning"><i class="glyphicon glyphicon-phone"></i> <?php echo osc_user_phone(); ?></span>
      </div>
      <?php } ?>
    </div>

    <div class="listings-block col-md-7">

      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title"><?php echo osc_user_name(); ?></h3>
        </div>
        <div class="panel-body">

              <div class="col-md-8 seller-info">
                <?php if ( osc_user_info() == '' ) { ?>
                  <?php _e( "Hi there! thanks for viewing my profile if you're interested with my item you may contact me.", 'symnel' ); ?>
                <?php } else { ?>
                  <?php echo osc_user_info(); ?>
                <?php } ?>
              </div>

              <div class="col-md-4 seller-extra-info">
                  <?php if ( osc_user_phone() !== '' ) { ?>
                  <div class="contact-number">
                      <span class="btn btn-warning btn-block"><i class="glyphicon glyphicon-phone"></i> <?php echo osc_user_phone(); ?></span>
                  </div>
                  <?php } ?>
              </div>

          <?php if ( osc_user_website() !== '' && osc_user_website() !== 'http://' ) { ?>
            <span class="user-website">
              <a href="<?php echo osc_user_website(); ?>" rel="nofollow">
                <?php echo str_replace( array('http://','https://','www.'), '', osc_user_website() ); ?>
              </a>
            </span>
          <?php } ?>
        </div>
      </div>

      <nav class="navbar navbar-default navbar-static" role="navigation">
        <div class="container">
          <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
              <li class="active"><a href="#all-listing"><?php _e( 'Seller Item List', 'symnel' ); ?></a></li>
            </ul>
          </div>
        </div>
      </nav>
      <?php if ( osc_count_latest_items() == 0 ) { ?>
          <p class="alert alert-warning"><?php _e( "There aren't listings available at this moment", 'symnel' ); ?></p>
      <?php } else {
          osc_current_web_theme_path( 'loop-front.php' );
      } ?>
      <div class="search-all-block">
          <?php echo osc_pagination_items(); ?>
      </div>
    </div><!-- .listings-block -->

    <?php osc_current_web_theme_path( 'side-widgets-public-profile.php' ); ?>

  </div>
</div>

<?php osc_current_web_theme_path( 'footer-item.php' ); ?>
<?php osc_current_web_theme_path( 'footer.php' ); ?>
