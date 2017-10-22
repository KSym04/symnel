<?php
/**
 * Symnel All Item List Page
 *
 * @package Osclass
 * @subpackage Symnel
 * @since Symnel 1.0
 */

// meta tag robots
osc_add_hook( 'header', 'dtf_nofollow_construct' );

osc_add_filter( 'meta_title_filter', 'custom_meta_title' );
function custom_meta_title( $data ) {
  return __( sprintf( 'All Listings / %s', osc_page_title() ), 'symnel' );
}

osc_current_web_theme_path( 'framework/backend/header-backend.php' ); ?>

    <div id="wrapper">

      <?php osc_current_web_theme_path( 'framework/backend/sidebar-backend.php' ); ?>

      <div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h1><?php printf( '%s <a href="%s" class="btn btn-info btn-xs">%s</a>' , __( 'All Listings', 'symnel' ), osc_item_post_url_in_category(), __( 'Add New Ads', 'symnel' ) ); ?></h1>
            <?php dtf_show_flash_message( 'pubMessages', 'alert alert-dismissable alert-warning', 'dope-backend-alert' ); ?>
          </div>
        </div><!-- /.row -->

        <div class="row">
          <div class="col-lg-12">
            <div class="all-listings-tab">

              <ul class="nav nav-tabs">
                <li class="active"><a href="#all-ads" data-toggle="tab"><?php _e( 'All', 'symnel' ); ?></a></li>
              </ul>
              <div id="allListingTabContent" class="tab-content">
                <div class="tab-pane fade active in" id="all-ads">
                  <div class="table-responsive">
                    <table class="all-listings-table table table-bordered table-hover table-striped tablesorter">
                      <thead>
                        <tr>
                          <th><?php _e( 'Ad Title', 'symnel' ); ?> <i class="fa fa-sort"></i></th>
                          <th><?php _e( 'Item Price', 'symnel' ); ?> <i class="fa fa-sort"></i></th>
                          <th><?php _e( 'Views', 'symnel' ); ?> <i class="fa fa-sort"></i></th>
                          <th><?php _e( 'Published Date', 'symnel' ); ?> <i class="fa fa-sort"></i></th>
                          <th><?php _e( 'Expiration Date', 'symnel' ); ?> <i class="fa fa-sort"></i></th>
                        </tr>
                      </thead>
                      <?php osc_current_web_theme_path( 'loop.php' ); ?>
                      <tfoot>
                        <tr>
                          <th><?php _e( 'Ad Title', 'symnel' ); ?></i></th>
                          <th><?php _e( 'Item Price', 'symnel' ); ?></i></th>
                          <th><?php _e( 'Views', 'symnel' ); ?></i></th>
                          <th><?php _e( 'Published Date', 'symnel' ); ?></i></th>
                          <th><?php _e( 'Expiration Date', 'symnel' ); ?></i></th>
                        </tr>
                      </thead>
                    </table>
                  </div>
                  <div class="pull-right paginate-block">
                      <?php echo dtf_pagination_items( array( 'parent_class' => 'pagination pagination-sm' ) ); ?>
                  </div>
                </div><!-- 1st tab end -->
              </div><!-- #allListingTabContent -->

            </div>
          </div>
        </div><!-- /.row -->

        <?php osc_current_web_theme_path( 'framework/backend/footer-inner-backend.php' ); ?>

      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

<?php osc_current_web_theme_path( 'framework/backend/footer-backend.php' ); ?>
