<?php
/**
 * Symnel Profile Setings Page
 *
 * @package Osclass
 * @subpackage Symnel
 * @since Symnel 1.0
 */

// meta tag robots
osc_add_hook( 'header', 'dtf_nofollow_construct' );
dtf_add_body_class( 'user user-profile' );

osc_add_filter( 'meta_title_filter', 'custom_meta_title' );
function custom_meta_title( $data ) {
  return __( sprintf( 'Account Settings / %s', osc_page_title() ), 'symnel' );
}

$osc_user = osc_user();

osc_current_web_theme_path( 'framework/backend/header-backend.php' ); ?>

    <div id="wrapper">

      <?php osc_current_web_theme_path( 'framework/backend/sidebar-backend.php' ); ?>

      <div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h1><?php printf( '%s' , __( 'Account Settings', 'symnel' ) ); ?></h1>
            <?php dtf_show_flash_message( 'pubMessages', 'alert alert-dismissable alert-warning', 'dope-backend-alert' ); ?>
            <?php dopeUserForm::location_javascript(); ?>
          </div>
        </div><!-- /.row -->

        <div class="row">
          <form role="form" action="<?php echo osc_base_url( true ); ?>" method="post" id="dtf-form-backend">
            <div class="col-lg-4">
              <input type="hidden" name="page" value="user" />
              <input type="hidden" name="action" value="profile_post" />
              <h3><?php _e( 'Basic Info', 'symnel' ); ?></h3>
              <?php osc_run_hook( 'dtf_user_form_basic_info_after' ); ?>
              <div class="form-group">
                  <label for="name"><?php _e( 'Name', 'symnel' ); ?></label>
                  <?php dopeUserForm::name_text( osc_user() ); ?>
              </div>
              <div class="form-group">
                  <label for="user_type"><?php _e( 'User Type', 'symnel' ); ?></label>
                  <?php dopeUserForm::is_company_select( osc_user() ); ?>
              </div>
              <?php osc_run_hook( 'dtf_user_form_basic_info_before' ); ?>

              <h3><?php _e( 'Location Info', 'symnel' ); ?></h3>
              <?php osc_run_hook( 'dtf_user_form_location_info_before' ); ?>
              <div class="form-group">
                  <label class="form-label"l for="address"><?php _e( 'Address', 'symnel' ); ?></label>
                  <?php dopeUserForm::address_text( osc_user() ); ?>
              </div>
              <div class="form-group">
                  <label for="country"><?php _e( 'Country', 'symnel' ); ?></label>
                  <?php dopeUserForm::country_select( osc_get_countries(), osc_user() ); ?>
              </div>
              <div class="form-group">
                  <label for="region"><?php _e( 'State / Region / Province', 'symnel' ); ?></label>
                  <?php dopeUserForm::region_select( osc_get_regions(), osc_user() ); ?>
              </div>
              <div class="form-group">
                  <label for="city"><?php _e( 'City', 'symnel' ); ?></label>
                  <?php dopeUserForm::city_select( osc_get_cities(), osc_user() ); ?>
              </div>
              <div class="form-group">
                  <label for="city_area"><?php _e( 'Zip Code', 'symnel' ); ?></label>
                  <?php dopeUserForm::city_area_text( osc_user() ); ?>
              </div>
              <?php osc_run_hook( 'dtf_user_form_location_info_after' ); ?>
            </div><!-- /.col-lg-3 -->

            <div class="col-lg-3">
                  <h3><?php _e( 'Contact Info', 'symnel' ); ?></h3>
                  <?php osc_run_hook( 'dtf_user_form_contact_info_before' ); ?>
                  <div class="form-group">
                      <label for="phoneMobile"><?php _e( 'Mobile No.', 'symnel' ); ?></label>
                      <?php dopeUserForm::mobile_text( osc_user() ); ?>
                  </div>
                  <div class="form-group">
                      <label for="phoneLand"><?php _e( 'Landline No.', 'symnel' ); ?></label>
                      <?php dopeUserForm::phone_land_text( osc_user() ); ?>
                  </div>
                  <?php osc_run_hook( 'dtf_user_form_contact_info_after' ); ?>

                  <h3><?php _e( 'Extra Info', 'symnel' ); ?></h3>
                  <?php osc_run_hook( 'dtf_user_form_extra_info_before' ); ?>
                  <div class="form-group">
                      <label for="webSite"><?php _e( 'Website', 'symnel' ); ?></label>
                      <?php dopeUserForm::website_text( osc_user() ); ?>
                  </div>
                  <div class="form-group">
                      <label for="s_info"><?php _e( 'Description', 'symnel' ); ?></label>
                      <?php dopeUserForm::info_textarea( 's_info', osc_locale_code(), @$osc_user['locale'][osc_locale_code()]['s_info'] ); ?>
                  </div>
                  <?php osc_run_hook( 'dtf_user_form_extra_info_after' ); ?>
            </div><!-- /.col-lg-3 -->

            <div class="col-lg-3">
                  <div class="form-group pull-right">
                      <p class="help-block"><?php _e( 'Everything looks good?', 'symnel' ); ?></p>
                      <button type="submit" class="btn btn-danger"><?php _e( "Apply Changes", 'symnel' );?></button>
                  </div>
                  <div class="form-group">
                      <?php osc_run_hook( 'user_form', osc_user() ); ?>
                  </div>
            </div><!-- /.col-lg-3 -->
          </form>
        </div><!-- /.row -->

        <?php osc_current_web_theme_path( 'framework/backend/footer-inner-backend.php' ); ?>

      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

<?php osc_current_web_theme_path( 'framework/backend/footer-backend.php' ); ?>
