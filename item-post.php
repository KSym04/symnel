<?php
/**
 * Symnel Item Post Page - File that renders adding new listing.
 *
 * @package Osclass
 * @subpackage Symnel
 * @since Symnel 1.0
 */

// meta tag robots
osc_add_hook( 'header', 'dtf_nofollow_construct' );

dtf_add_body_class( 'item item-post' );
$action = 'item_add_post';
$edit = false;
if ( Params::getParam( 'action' ) == 'item_edit' ) {
  $action = 'item_edit_post';
  $edit = true;
}

osc_add_filter( 'meta_title_filter', 'custom_meta_title' );
function custom_meta_title( $data ) {
  return __( sprintf( 'Post New Ads / %s', osc_page_title() ), 'symnel' );
}

osc_current_web_theme_path( 'framework/backend/header-backend.php' ); ?>

    <div id="wrapper">
      <?php osc_current_web_theme_path( 'framework/backend/sidebar-backend.php' ); ?>
      <div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h1><?php _e( 'Post New Ads', 'symnel' ); ?></h1>
            <?php dtf_show_flash_message( 'pubMessages', 'alert alert-dismissable alert-danger', 'dope-backend-alert' ); ?>
          </div>
        </div><!-- /.row -->

        <div class="row">
          <form name="item" role="form" action="<?php echo osc_base_url( true );?>" method="post" enctype="multipart/form-data" id="dtf-form-backend">
            <div class="col-lg-9">
              <?php ItemForm::location_javascript_new(); ?>
              <input type="hidden" name="action" value="<?php echo $action; ?>" />
              <input type="hidden" name="page" value="item" />
              <?php if ( $edit ) { ?>
              <input type="hidden" name="id" value="<?php echo osc_item_id();?>" />
              <input type="hidden" name="secret" value="<?php echo osc_item_secret();?>" />
              <?php } ?>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class="panel-title"><?php _e( 'Category', 'symnel' ); ?></h3>
                </div>
                <div class="panel-body clearfix">
                  <div class="form-group">
                      <?php ItemForm::category_select( null, null, __( 'Select Category', 'symnel' ) ); ?>
                      <?php osc_run_hook( 'after-postedit-item-category' ); ?>
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class="panel-title"><?php _e( 'Ad Details', 'symnel' ); ?></h3>
                </div>
                <div class="panel-body clearfix">
                  <div class="form-group">
                      <label for="title[<?php echo osc_locale_code(); ?>]"><?php _e( 'Title', 'symnel' ); ?></label>
                      <?php ItemForm::title_input( 'title', osc_locale_code(), osc_esc_html( dtf_item_title() ) ); ?>
                      <?php osc_run_hook( 'after-postedit-item-title' ); ?>
                  </div>
                  <div class="form-group">
                      <label for="description[<?php echo osc_locale_code(); ?>]"><?php _e( 'Description', 'symnel' ); ?></label>
                      <?php ItemForm::description_textarea( 'description', osc_locale_code(), osc_esc_html( dtf_item_description() ) ); ?>
                      <?php osc_run_hook( 'after-postedit-item-description' ); ?>
                  </div>
                  <div class="form-group form-plugin form-horizontal">
                    <?php
                      if ( $edit ) {
                        ItemForm::plugin_edit_item();
                      } else {
                        ItemForm::plugin_post_item();
                      }
                    ?>
                  </div>
                  <?php if ( osc_price_enabled_at_items() ) { ?>
                      <div class="form-group form-horizontal col-lg-3 no-margin no-padding">
                        <label><?php _e( 'Price', 'symnel' ); ?></label>
                        <div class="input-group">
                          <?php ItemForm::price_input_text(); ?>
                          <div class="currency-btn">
                            <?php ItemForm::currency_select(); ?>
                          </div><!-- /btn-group -->
                        </div>
                        <?php osc_run_hook( 'after-postedit-item-price' ); ?>
                      </div>
                  <?php } ?>
                </div>
              </div>
              <?php if ( osc_images_enabled_at_items() ) { ?>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class="panel-title"><?php _e( 'Photos', 'symnel' ); ?></h3>
                </div>
                <div class="panel-body clearfix">
                  <?php osc_run_hook( 'before-postedit-item-photos' ); ?>
                  <?php ItemForm::ajax_photos(); ?>
                  <?php osc_run_hook( 'after-postedit-item-photos' ); ?>
                </div>
              </div>
              <?php } ?>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class="panel-title"><?php _e( 'Location', 'symnel' ); ?></h3>
                </div>
                <div class="panel-body clearfix">
                  <div class="form-horizontal">
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="address"><?php _e( 'Address', 'symnel' ); ?></label>
                        <div class="col-sm-6">
                          <?php ItemForm::address_text( osc_user() ); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="country"><?php _e( 'Country', 'symnel' ); ?></label>
                        <div class="col-sm-6">
                          <?php ItemForm::country_select( osc_get_countries(), osc_user() ); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="region"><?php _e( 'State / Region / Province', 'symnel' ); ?></label>
                        <div class="col-sm-6">
                          <?php ItemForm::region_select( osc_get_regions(), osc_user() ); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="city"><?php _e( 'City', 'symnel' ); ?></label>
                        <div class="col-sm-6">
                          <?php ItemForm::city_text( osc_user() ); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="cityArea"><?php _e( 'Zip Code', 'symnel' ); ?></label>
                        <div class="col-sm-6">
                          <?php ItemForm::city_area_text( osc_user() ); ?>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
              <?php osc_run_hook( 'after-postedit-user-location' ); ?>
              <?php if ( !osc_is_web_user_logged_in() ) { ?>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class="panel-title"><?php _e( "Seller's information", 'symnel' ); ?></h3>
                </div>
                <div class="panel-body clearfix">
                  <div class="form-horizontal">
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="contactName"><?php _e( 'Name', 'symnel' ); ?></label>
                        <div class="col-sm-6">
                          <?php ItemForm::contact_name_text(); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="contactEmail"><?php _e( 'Email', 'symnel' ); ?></label>
                        <div class="col-sm-6">
                          <?php ItemForm::contact_email_text(); ?>
                          <div class="checkbox">
                            <?php ItemForm::show_email_checkbox(); ?> <label for="showEmail"><?php _e( 'Show email on the listing page', 'symnel' ); ?></label>
                          </div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
              <?php } ?>
              <?php osc_run_hook( 'after-postedit-user-email' ); ?>
            </div>

            <div class="col-lg-3">
              <?php osc_run_hook( 'before-postedit-item-publish-button' ); ?>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class="panel-title"><?php _e( 'Publish', 'symnel' ); ?></h3>
                </div>
                <div class="panel-body clearfix">
                  Please review your item or ads before publishing, Thank you!
                </div>
                <div class="panel-footer">
                    <div class="form-group clearfix">
                        <div class="forms">
                        <?php if ( osc_recaptcha_items_enabled() ) { ?>
                          <?php if ( osc_recaptcha_public_key() ) { ?>
                          <script type="text/javascript">
                            var RecaptchaOptions = {
                                theme : 'custom',
                                custom_theme_widget: 'recaptcha_widget'
                            };
                          </script>
                          <style type="text/css">
                            div#recaptcha_widget { margin: 10px 0 20px; }
                            div#recaptcha_widget, div#recaptcha_image > img { width: 100%; }
                            div#recaptcha_image > img { border: 1px solid #e5e5e5;  border-radius: 4px; }
                            div#recaptcha_image { width: 100% !important; }
                            .recaptcha_only_if_image { display: block; margin: 10px 0 5px; font-size: 11px; color: #777777;}
                          </style>
                          <div id="recaptcha_widget">
                            <div id="recaptcha_image"><img /></div>
                            <span class="recaptcha_only_if_image"><?php _e( 'Enter the words above', 'symnel' ); ?>:</span>
                            <input type="text" class="form-control input-sm" id="recaptcha_response_field" name="recaptcha_response_field" />
                          </div>
                          <?php } ?>
                        <?php osc_show_recaptcha(); } ?>
                          <button type="submit" class="pull-right btn btn-danger"><?php if ( $edit ) { _e( "Update", 'symnel' ); } else { _e( "Publish", 'symnel' ); } ?></button>
                        </div>
                    </div>
                </div>
              </div>
            </div>
          </form>
        </div><!-- /.row -->

        <?php osc_current_web_theme_path( 'framework/backend/footer-inner-backend.php' ); ?>

      </div><!-- /#page-wrapper -->
    </div><!-- /#wrapper -->

<?php osc_current_web_theme_path( 'framework/backend/footer-backend.php' ); ?>
