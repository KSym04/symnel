<?php
/**
 * Symnel Change Password Page
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
  return __( sprintf( 'Change Password / %s', osc_page_title() ), 'symnel' );
}

$osc_user = osc_user();

osc_current_web_theme_path('framework/backend/header-backend.php'); ?>

    <div id="wrapper">

      <?php osc_current_web_theme_path('framework/backend/sidebar-backend.php'); ?>

      <div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h1><?php printf( '%s' , __('Change Password', 'symnel') ); ?></h1>
            <?php dtf_show_flash_message( 'pubMessages', 'alert alert-dismissable alert-danger', 'dope-backend-alert' ); ?>
          </div>
        </div><!-- /.row -->

        <div class="row">
          <form role="form" action="<?php echo osc_base_url(true); ?>" method="post" id="dtf-form-backend">
            <div class="col-lg-4">
              <input type="hidden" name="page" value="user" />
              <input type="hidden" name="action" value="change_password_post" />
              <div class="form-group">
                  <label for="password"><?php _e('Current Password', 'symnel'); ?> *</label>
                  <input type="password" name="password" id="password" value="" placeholder="<?php _e('Old Password', 'symnel'); ?>" />
              </div>
              <div class="form-group">
                  <label for="new_password"><?php _e('New Password', 'symnel'); ?> *</label>
                  <input type="password" name="new_password" id="new_password" value="" placeholder="<?php _e('Desired Password', 'symnel'); ?>" />
              </div>
              <div class="form-group">
                  <label for="new_password2"><?php _e('Repeat New Password', 'symnel'); ?> *</label>
                  <input type="password" name="new_password2" id="new_password2" value="" placeholder="<?php _e('Verify Desired Password', 'symnel'); ?>" />
              </div>
              <div class="form-group">
                  <button type="submit" class="btn btn-danger"><?php _e("Update", 'symnel');?></button>
              </div>
            </div>
          </form>
        </div><!-- /.row -->

        <?php osc_current_web_theme_path('framework/backend/footer-inner-backend.php'); ?>

      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

<?php osc_current_web_theme_path('framework/backend/footer-backend.php'); ?>
