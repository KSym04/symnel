<?php
/**
 * Symnel Main Dashboard Page
 *
 * @package Osclass
 * @subpackage Symnel
 * @since Symnel 1.0
 */

// meta tag robots
osc_add_hook('header','dtf_nofollow_construct');

osc_add_filter( 'meta_title_filter', 'custom_meta_title' );
function custom_meta_title( $data ) {
  return __( sprintf( 'Ad Performance / %s', osc_page_title() ), 'symnel' );
}

osc_current_web_theme_path('framework/backend/header-backend.php'); ?>

    <div id="wrapper">

      <?php osc_current_web_theme_path('framework/backend/sidebar-backend.php'); ?>

      <div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h1><?php printf( '%s <small>%s</small>' , __('Ad Performance', 'symnel'), __('Statistics Overview', 'symnel') ); ?></h1>
          </div>
        </div><!-- /.row -->

        <div class="row">
          <div class="col-lg-12">
            <div class="jumbotron">
                <h1><?php _e('Welcome to ' . osc_page_title(), 'symnel'); ?></h1>
                <p>
                  <?php _e('Online buy and sell site where buyer meets seller.', 'symnel'); ?>
                  <br /><br />
                </p>
                <p><a href="<?php echo osc_item_post_url_in_category(); ?>" class="btn btn-info btn-lg" role="button"><span class="glyphicon glyphicon-plus"></span> <?php _e('Post a Free Ad', 'symnel'); ?></a></p>
            </div>
          </div>
          <!-- /.col-lg-12 -->

          <div class="col-lg-6">
            <div class="panel panel-success">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-6">
                    <i class="fa fa-thumbs-o-up fa-5x"></i>
                  </div>
                  <div class="col-xs-6 text-right">
                    <p class="announcement-heading">
                      <?php echo count(symnel_get_all_total_user_ads_status( osc_logged_user_id(), 'active' )); ?>
                    </p>
                    <p class="announcement-text"><?php _e('Total Active Ads', 'symnel'); ?></p>
                  </div>
                </div>
              </div>
              <a href="<?php echo osc_user_list_items_url() . '#active-ads'; ?>">
                <div class="panel-footer announcement-bottom">
                  <div class="row">
                    <div class="col-xs-6">
                      <?php _e('Check Active Ads', 'symnel'); ?>
                    </div>
                    <div class="col-xs-6 text-right">
                      <i class="fa fa-arrow-circle-right"></i>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="panel panel-info">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-6">
                    <i class="fa fa-users fa-5x"></i>
                  </div>
                  <div class="col-xs-6 text-right">
                    <p class="announcement-heading"><?php echo symnel_get_all_total_ad_view_status( osc_logged_user_id(), 'active' ); ?></p>
                    <p class="announcement-text"><?php _e('Total Ad Views', 'symnel'); ?></p>
                  </div>
                </div>
              </div>
              <a href="<?php echo osc_user_list_items_url(); ?>">
                <div class="panel-footer announcement-bottom">
                  <div class="row">
                    <div class="col-xs-6">
                      <?php _e('Learn More', 'symnel'); ?>
                    </div>
                    <div class="col-xs-6 text-right">
                      <i class="fa fa-arrow-circle-right"></i>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div><!-- /.row -->

        <?php osc_current_web_theme_path('framework/backend/footer-inner-backend.php'); ?>

      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

<?php osc_current_web_theme_path('framework/backend/footer-backend.php'); ?>
