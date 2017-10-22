<?php
/**
 * Symnel User Alert Page
 *
 * @package Osclass
 * @subpackage Symnel
 * @since Symnel 1.0
 */

// meta tag robots
osc_add_hook('header','dtf_nofollow_construct');
dtf_add_body_class('user user-profile');

osc_add_filter( 'meta_title_filter', 'custom_meta_title' );
function custom_meta_title( $data ) {
  return __( sprintf( 'Alerts / %s', osc_page_title() ), 'symnel' );
}

$osc_user = osc_user();

osc_current_web_theme_path('framework/backend/header-backend.php'); ?>

    <div id="wrapper">

      <?php osc_current_web_theme_path('framework/backend/sidebar-backend.php'); ?>

      <div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h1><?php printf( '%s' , __('Alerts', 'symnel') ); ?></h1>
            <?php dtf_show_flash_message( 'pubMessages', 'alert alert-dismissable alert-warning', 'dope-backend-alert' ); ?>
          </div>
        </div><!-- /.row -->

        <div class="row">
          <div class="col-lg-12">
            <div class="all-listings-tab">
                <?php if(osc_count_alerts() == 0) { ?>
                    <p><?php _e('You do not have any alerts yet', 'symnel'); ?>.</p>
                <?php } else { ?>
                        <?php
                        $i = 1;
                        while(osc_has_alerts()) { ?>
                            <div class="alert-action-box">
                                <h3><?php _e('Alert', 'symnel'); ?> <?php echo $i; ?></h3>
                            <div>
                            <?php if(osc_count_items() == 0) { ?>
                                  <p>0 <?php _e('Listings', 'symnel'); ?></p>
                                  <div class="table-responsive clearfix">
                                    <a class="pull-left clearfix" onclick="javascript:return confirm('<?php echo osc_esc_js(__('This action can\'t be undone. Are you sure you want to continue?', 'symnel')); ?>');" href="<?php echo osc_user_unsubscribe_alert_url(); ?>"><?php _e('Delete this alert', 'symnel'); ?></a>
                                  </div>
                            <?php } else { ?>
                                  <div class="table-responsive clearfix">
                                    <table class="all-listings-table table table-bordered table-hover table-striped tablesorter">
                                      <thead>
                                        <tr>
                                          <th><?php _e( 'Title', 'symnel' ); ?> <i class="fa fa-sort"></i></th>
                                          <th><?php _e( 'Price', 'symnel' ); ?> <i class="fa fa-sort"></i></th>
                                          <th><?php _e( 'Views', 'symnel' ); ?> <i class="fa fa-sort"></i></th>
                                          <th><?php _e( 'Published Date', 'symnel' ); ?> <i class="fa fa-sort"></i></th>
                                        </tr>
                                      </thead>
                                      <?php osc_current_web_theme_path('loop-alert.php') ; ?>
                                    </table>
                                    <a class="pull-right clearfix" onclick="javascript:return confirm('<?php echo osc_esc_js(__('This action can\'t be undone. Are you sure you want to continue?', 'symnel')); ?>');" href="<?php echo osc_user_unsubscribe_alert_url(); ?>"><?php _e('Delete this alert', 'symnel'); ?></a>
                                  </div>
                            <?php } ?>
                        <?php
                        $i++;
                        }
                        ?>
                <?php  } ?>
            </div>
          </div>
        </div>

        <?php osc_current_web_theme_path('framework/backend/footer-inner-backend.php'); ?>

      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->
