<?php
/**
 * Symnel Change Email Page
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
  return __( sprintf( 'Change Email / %s', osc_page_title() ), 'symnel' );
}

$osc_user = osc_user();

osc_current_web_theme_path('framework/backend/header-backend.php'); ?>

    <div id="wrapper">

      <?php osc_current_web_theme_path('framework/backend/sidebar-backend.php'); ?>

      <div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h1><?php printf( '%s' , __('Change Email', 'symnel') ); ?></h1>
            <?php dtf_show_flash_message( 'pubMessages', 'alert alert-dismissable alert-danger', 'dope-backend-alert' ); ?>
          </div>
        </div><!-- /.row -->

        <div class="row">
          <form role="form" action="<?php echo osc_base_url(true); ?>" method="post" id="dtf-form-backend">
              <div class="col-lg-4">
                <input type="hidden" name="page" value="user" />
                <input type="hidden" name="action" value="change_email_post" />
                <div class="form-group">
                    <label for="email"><?php _e('Current Email', 'symnel'); ?></label>
                    <p><?php echo osc_logged_user_email(); ?></p>
                </div>
                <div class="form-group">
                    <label for="new_email"><?php _e('New Email', 'symnel'); ?> *</label>
                    <input type="text" name="new_email" id="new_email" value="" placeholder="<?php _e('Email', 'symnel'); ?>" />
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
